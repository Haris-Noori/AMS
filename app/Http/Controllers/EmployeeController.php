<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Activity;
use App\Models\Donation;
use Log;

class EmployeeController extends Controller
{
    
    public function login(Request $request) {
        
        if($request->isMethod('post')) {
            $name = $request->emp_name;
            $pass = $request->emp_pass;
            //log::debug('Returning login view');


            if( ! Employee::login($name, $pass) ) {
                // return view('employee.login');//->withErrors([ 'error' => 'invaild credentials' ]);
                return back()->withErrors([ 'error' => 'invaild credentials' ]);
            } else {
                
                // return Employee::getEmployeeSessionData();  
                return view('/employee/dashboard', Employee::getEmployeeSessionData());

            }
        } else {
            log::debug("Hey");
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
        return view('employee.add_donation', Employee::getEmployeeSessionData());
    }

    public function allDonations()
    {
        return view('employee.all_donations', 
            array_merge(Employee::getEmployeeSessionData(),
                ['donations' => Donation::where('employee_id', Employee::id())->orderBy('created_at', 'desc')->get()]
            )
        );
    }

    public function addDonation(Request $request)
    {
        if($request->isMethod('post'))
        {
            $donation = [
                'box_name' => $request->box_name,
                'amount_collected' => $request->amount_collected,
                'employee_id' => Employee::id()
            ];
            Donation::create($donation);
            return back();
        }
    }

}
