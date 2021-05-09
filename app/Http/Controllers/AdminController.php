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


class AdminController extends Controller
{

    public function index(Request $request)
    {
        if(Admin::isLoggedIn()) {
            // user is logged in, 
            // $pageData = $this->getAdminSessionData();
            return redirect('/admin/dashboard');
        } else {
            // user is not logged in
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
            print_r($admin);
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
     * Insert new admin in Database
     */
    public function createAdmin()
    {
        $data = [
            'admin_name' => 'Haris',
            'admin_pass' => '12345',
            'type' => 'normal',
        ];
        Admin::create($data);
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
            return view('admin.add-student', $this->getAdminSessionData() );
        }

        if($request->isMethod('post')) {
            // process submitted
            log::debug("hey2");

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
                echo "Student not unique";
            } else {
                Student::register($request);
            }
                       
            $total_std = Student::count();  //returns number of data in database
            $std_id = $total_std+1;          //generating next roll number
            
            $year = date('Y');
            $year = substr($year,-2);      //last two number

            $month = date('m');             //current month

            if($std_id < 10){
                $new_std_id = $year.$month.'-000'.$std_id;
            }
            elseif($std_id > 10 and $std_id < 99){
                $new_std_id = $year.$month.'-00'.$std_id;
            }
            elseif($std_id > 100 and $std_id < 999){
                $new_std_id = $year.$month.'-0'.$std_id;
            }
            else{
                $new_std_id = $year.$month.'-'.$std_id;
            }
            
            print_r($new_std_id);

            //return ;

        
        }
    }

    /**
     * Returns the All Students View
     */
    public function getAllStudentsView() {
        $pageData = [
            'students' => $this->getStudents(),
        ];
        $pageData = array_merge($pageData, $this->getAdminSessionData());
        return view('admin.all_students', $pageData);
    }

    /**
     * Get Students From Database
     */
    public function getStudents()
    {
        $students = DB::select('select * from students');
        return $students;
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
            'first_name' => 'required | alpha',
            'last_name' => 'required | alpha',
            'gender' => 'required | in:[N/A,male,female]',
            'blood_group' => 'required | in:N/A,A-,A+,B-,B+,O+,O-,AB+,AB-',
        ]);

        Employee::add($request);
    }
}
