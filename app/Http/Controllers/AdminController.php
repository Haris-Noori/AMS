<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use log;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        if($request->session()->has('session_admin_id')) {
            // user is logged in, 
            $pageData = $this->getAdminSessionData();
            return view('admin.dashboard', $pageData);
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
        return view('admin.dashboard');
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
        log::debug('hey');
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
}
