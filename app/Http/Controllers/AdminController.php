<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use League\Fractal;
use Log;

use App\Models\Admin;
use App\Models\Student;
use App\Models\StudentGuardian;
use App\Models\Employee;
use App\Models\Activity;
use App\Models\DonationBox;
use App\Models\Donation;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        if(Admin::isLoggedIn()) {
            // user is logged in, 
            // $pageData = $this->getAdminSessionData();
            return redirect('/admin/dashboard');
        } else {
            // user is not logged ins
            return redirect('/admin/login');
        }
    }

    /**
     * Authenticate user
     */
    public function login(Request $request)
    {
        if($request->isMethod('get')) {
            return view('admin.login');
        }

        if($request->isMethod('post')) {   
            $admin_name = $request->admin_name;
            $admin_pass = $request->admin_pass;
            $admin = Admin::where('admin_name', '=', $admin_name)->where('admin_pass' , '=', $admin_pass)->first();
            // print_r($admin);
            if ($admin === null) {
                // user doesn't exist
                return view('admin.login', array('error' => 'Invalid Username or Password'));
            } else {
                session(['session_admin_id' => $admin->id]);
                session(['session_admin_name' => $admin_name]);
                session(['session_admin_pass' => $admin_pass]);
                session(['session_admin_type' => $admin->type]);

                return redirect('/admin');
            }   
        }
    }

    /**
     * Get session data for current user
     */
    private function getAdminSessionData() 
    {
        return $data = [
            'session_admin_id' => session('session_admin_id'),
            'session_admin_name' => session('session_admin_name'),
            'session_admin_pass' => session('session_admin_pass'),
            'session_admin_type' => session('session_admin_type'),
        ];
    }

    /**
     * Logout the Admin
     */
    public function logout(Request $request)
    {
        // clear session
        $request->session()->flush();
        // log::debug('here');
        return redirect('/admin');
    }

    /**
     * Get Admins From Database
     */
    public function getAdmins()
    {
        $admins = DB::select('select * from admins');
        return $admins;
    }

    public function loadDashboard()
    {
        return view('admin.dashboard', $this->getAdminSessionData());
    }

    /**
     * Returns the All Admins View
     */
    public function getAllAdminsView()
    {
        $pageData = [
            'viewTitle' => 'All Admins',
            'admins' => $this->getAdmins(),
        ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());
        return view('admin.all_admins', $pageData);
    }

    /**
     * Returns the Add New Admin View
     */
    public function getAddAdminView()
    {
        $pageData = [
            'viewTitle' => 'Add New Admin',
            'successMsg' => '',
        ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());
        return view('admin.add_admin', $pageData);
    }

    /**
     * Get Data from the Add New Admin Form
     * Insert into Database
     */
    public function addNewAdmin(Request $request)
    {
        
        $data = [
            'admin_name' => $request->admin_name,
            'admin_pass' => $request->admin_pass,
            'type' => $request->type,
        ];
        Admin::create($data);   // inserting new database
        $pageData = [
            'viewTitle' => 'Add New Admin',
            'successMsg' => 'Admin Created Successfully!',
        ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());  
        // log::debug('hey');
        return view('admin.add_admin', $pageData);
    }

    /**
     * Removes an Admin
     */
    public function removeAdmin($id)
    {
        // return $id;
        DB::table('admins')->where('id', '=', $id)->delete();
     
        return redirect('/admin/all_admins');
    }

    /**************************************************
     * Functions for students
    ************************************************** */

    public function addStudent(Request $request) {
        if($request->isMethod('get')) {
            // return view
            return view('admin.add_student', $this->getAdminSessionData() );
        }

        if($request->isMethod('post')) {
            // process submitted
            // log::debug("hey2");

            // validation request 
            $request->validate([
                // 'token' => 'required',
                'st_first_name' => 'required | alpha',
                'st_last_name' => 'required | alpha',
                'st_gender' => 'required',
                'st_dob' => 'required | date',
                'st_blood' => 'required | in:N/A,A-,A+,B-,B+,O+,O-,AB+,AB-',
                'st_status' => 'required | in:N/A,Genious,Addled,Very Poor,Normal,Genious & Beautiful Voice',
                'st_cur_st_add' => 'required'
            ]);

            // create guardian

            if(!Student::isUnique($request->input('st_first_name'), 
                                 $request->input('st_last_name'), 
                                 $request->input('st_father_name'))) {
                // echo "Student not unique";
                return back()->withErrors(['error' => "Student is not unique"]);
            } else {
                //$request->request->add(['rollnumber' => $new_std_id]);
                //print_r($request);
                Student::register($request);
                return back()->with('status', 'Student Registered!');
            }
        
        }
    }

    /**
     * Returns the All Students View
     */
    public function getAllStudentsView() {
        $pageData = [
            'students' => Student::all(),
        ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());
        return view('admin.all_students', $pageData);
    }


    /**
     * Removes a Student
     */
    public function removeStudent($id)
    {   
        $guardian = Student::select('guardian_id')->where('id', '=', $id)->get();

        DB::table('student_guardians')->where('id', '=', $guardian[0]->guardian_id)->delete();

        DB::table('students')->where('id', '=', $id)->delete();
        
        return redirect('admin/all_students');
    }

    /***************************************************************************************
     * Functions for Employees
    *************************************************************************************** */

    public function getAddEmployeeView()
    {
        return view('admin.add_employee', $this->getAdminSessionData());
    }

    public function addEmployee(Request $request)
    {
        // return $request->all();
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required | alpha',
            'gender' => 'required | in:[N/A,Male,Female]',
            'blood_group' => 'required | in:N/A,A-,A+,B-,B+,O+,O-,AB+,AB-',
        ]);

        Employee::add($request);

        return back()->with('status', 'Employee Registered!');
    }

    public function getEmployees()
    {
        $employees = DB::select('select * from employees');
        return $employees;
    }

    public function allEmployeesView()
    {
        $pageData = [
            'employees' => $this->getEmployees(),
        ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());
        return view('admin.all_employees', $pageData);
    }

    /**
     * Removes an Employee
     */
    public function removeEmployee($id)
    {
        DB::table('employees')->where('id', '=', $id)->delete();
        return redirect('admin/all-employees');
    }
    
    
    /***************************************************************************************
     * Functions for Donations
    *************************************************************************************** */
    public function addDonationBoxView()
    {
       $pageData = [
            'employees' => Employee::all(),
       ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());
        return view('admin.add_donation_box', $pageData);
    }

    public function getAllDonationBoxes()
    {
        $pageData = [
            // 'donation_boxes' => DonationBox::all()
            'donation_boxes' => DonationBox::select('donation_boxes.id',
                                'donation_boxes.box_name', 
                                'donation_boxes.reference', 
                                'donation_boxes.collector', 
                                'donation_boxes.frequency', 
                                'donation_boxes.location_name', 
                                'donation_boxes.address',
                                'donation_boxes.city',
                                'employees.first_name',
                                'employees.last_name')->join('employees', 'employees.id', '=', 'donation_boxes.collector')->get()
        ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());
        return view('admin.all_donation_boxes', $pageData);
    }

    public function addDonationBox(Request $request)
    {
        // return $request->all();
        $donation_box = [
            'box_name' => $request->box_name,
            'reference' => $request->reference,
            'collector' => $request->collector,
            'frequency' => $request->frequency,
            'location_name' => $request->location_name,
            'address' => $request->address,
            'city' => $request->city
        ];
        DonationBox::create($donation_box);
        return back();
    }

    public function allDonations()
    {
        $pageData = [
            'donations' => Donation::select('donations.id', 'donations.box_name', 'donations.amount_collected', 'donations.created_at', 'donations.image_path', 'employees.first_name', 'employees.last_name')->join('employees', 'employees.id', '=', 'donations.employee_id')->orderBy('donations.created_at', 'desc')->get()
        ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());
        return view('admin.all_donations', $pageData);
    }

    public function employeesActivities()
    {
        $pageData = [
            'activities' => Activity::select('activities.id', 'activities.activity_name', 'activities.activity_description', 'activities.from', 'activities.to', 'activities.created_at', 'employees.first_name')->join('employees', 'employees.id', '=', 'activities.employee_id')->orderBy('activities.created_at', 'desc')->get()
        ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());
        return view('admin.employees_activities', $pageData);
    }


}


