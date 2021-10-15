<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Activity;
use App\Models\Donation;
use App\Models\DonationBox;
use App\Models\Expense;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Log;

class EmployeeController extends Controller
{
    
    public function login(Request $request) {
        
        if($request->isMethod('post')) {
            $email = $request->emp_email;
            $pass = $request->emp_pass;
            //log::debug('Returning login view');


            if( ! Employee::login($email, $pass) ) {
                // return view('employee.login');//->withErrors([ 'error' => 'invaild credentials' ]);
                return back()->withErrors([ 'error' => 'invaild credentials' ]);
            } else {
                
                // return Employee::getEmployeeSessionData();  
                return view('/employee/dashboard', Employee::getEmployeeSessionData());

            }
        } else {
            // log::debug("Hey");
            return "Not post";
        }
    }

    public function logout(Request $request)
    {
        // clear session
        $request->session()->flush();
        // log::debug('here');
        return redirect('/employee/login');
    }

    public function dashboard()
    {
        $emp_id = Employee::id();
        $added_by = session('session_employee_first_name').'_'.session('session_employee_last_name');
        $donation = DB::table('donations')->where('employee_id', '=', $emp_id)->sum('amount_collected');
        $expense = DB::table('expenses')->where('added_by', '=', $added_by)->sum('amount');
        $pageData = [
            'donation' => $donation,
            'expense' => $expense,
        ];
        $pageData = array_merge($pageData, Employee::getEmployeeSessionData());
        return view('/employee/dashboard', $pageData);
    }

    public function getAddActivityView()
    {
        return view('employee.add_activity', Employee::getEmployeeSessionData());
    }

    public function getAllActivityView()
    {

        return view('employee.all_activity', array_merge(Employee::getEmployeeSessionData(), 
                [ 'activities' => Activity::where('employee_id', Employee::id())->orderBy('created_at', 'desc')->get()] ));
    }

    public function addActivity(Request $request) {
        if( $request->isMethod('post') ) {
            // print_r($request->all());
            $activity = [
                'activity_name' => $request->activity_type,
                'activity_description' => $request->description,
                'from' => $request->begin_time, 
                'to' => $request->end_time,
                'employee_id' => Employee::id()
            ];
            // print_r($activity);
            Activity::create($activity);
            return back();
        }
    }

    public function addDonationView()
    {
        $pageData = [
            // 'donation_boxes' => DonationBox::all()
            'donation_boxes' => DonationBox::select('donation_boxes.id',
                                'donation_boxes.box_name',  
                                'donation_boxes.collector')->where('donation_boxes.collector', Employee::id())->get()
        ];
        $pageData = array_merge($pageData, Employee::getEmployeeSessionData());
        return view('employee.add_donation', $pageData);
    }

    public function allDonations()
    {
        $donations = Donation::where('employee_id', Employee::id())->orderBy('created_at', 'desc')->get();
        $sum = 0;
        foreach($donations as $donation) {
            $sum = $sum + $donation->amount_collected;
        }

        return view('employee.all_donations', 
            array_merge(Employee::getEmployeeSessionData(), [
                'donations' => $donations,
                'sum' => $sum,
            ]
        ));
    }

    public function addDonation(Request $request)
    {
        if($request->isMethod('post'))
        {
            $image_path = "";
            if($request->file('image') != null ) {
                $image = $request->file('image');
                $image_name = $request->file('image')->getClientOriginalName();

                $emp_id = Employee::id();   //  employee id

                Storage::putFileAs('donations/'.$emp_id, $image, $image_name);
                $image_path = 'donations/'.$emp_id.'/'.$image_name;
            }
            
            $donation = [
                'box_name' => $request->box_name,
                'amount_collected' => $request->amount_collected,
                'image_path' => $image_path,
                'employee_id' => Employee::id()
            ];
            Donation::create($donation);
            return back();
        }
    }

    // returns change_password view
    public function changePassword(Request $request)
    {
        $password = $request->input('new_password');
        $id = Employee::id();
       
        Employee::changePassword($password, $id);
        return back();
    }

    /*****************************************************************************
     *                                      Expenses Functions
    *********************************************************************************/
    public function addExpense(Request $request) {
        if($request->isMethod('get')) {
            $pageData = [];
            $pageData = array_merge($pageData, Employee::getEmployeeSessionData());
            return view('employee.expenses.add_expense', $pageData);
        }

        if($request->isMethod('post')) {
            
            $added_by = session('session_employee_first_name').'_'.session('session_employee_last_name');
            $user_designation = 'Employee';

            $image_path = '';
            if($request->file('image') != null) {
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $image_name = 'employee_'.$added_by.'_'.$image_name;
                // return $image_name;
                Storage::putFileAs('expenses/', $image, $image_name);
                $image_path = 'expenses/'.$image_name;
            }

            $expense = [
                'category' => $request->input('category'),
                'sub_category' => $request->input('sub_category'),
                'description' => $request->input('description'),
                'amount' => $request->input('amount'),
                'status' => $request->input('status'),
                'added_by' => $added_by,
                'user_designation' => $user_designation,
                'image_path' => $image_path
            ];
            Expense::create($expense);
            return back()->with('status', 'Expense added successfully');
        }
    }

    public function getExpenses(Request $request) {
        if($request->isMethod('get')) {
            $year_month = date('Y-m');
            // return $year_month;
            $added_by = session('session_employee_first_name').'_'.session('session_employee_last_name');
            
            $expenses = Expense::where([
                ['added_by', '=', $added_by],
                ['created_at', 'LIKE', $year_month.'%'],
            ])
            ->orderBy('created_at', 'desc')->get();

            $total = 0;
            foreach ($expenses as $expense) {
                $total = $total + $expense->amount;
            }
            $pageData = [
                'total' => $total,
                'expenses' => $expenses,
            ];
            $pageData = array_merge($pageData, Employee::getEmployeeSessionData());
            return view('employee.expenses.expenses', $pageData);
        }
    }

}
