<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminController extends Controller
{
    //
    public function index()
    {
        $admin = new Admin();   // admin model

        return "Hello, this is Admin Controller";
    }

    public function login(Request $request)
    {
        /*$users = DB::table('users')
                ->whereColumn([
                    ['first_name', '=', 'last_name'],
                    ['updated_at', '>', 'created_at'],
                ])->get();*/

        $admin_name = $request->admin_name;
        $admin_pass = $request->admin_pass;
        /*$admin = DB::table('admins')
                    ->whereColumn([
                        ['admin_name', '=', $admin_name],
                        ['admin_pass', '=', $admin_pass],
                    ])->get();*/
        $admin = Admin::where('admin_name', '=', $admin_name)->first();
        if ($admin === null) 
        {
            // user doesn't exist
            
            return view('/admin/login');
        }
        else
        {
            $pageData = [
                'session_name' => $admin_name,
            ];
            return view('/admin/dashboard', $pageData);
        }

        // return view('/admin/dashboard');
    }

    /**
     * Logout the Admin
     */
    public function logout()
    {
        return view('/admin/login');
    }

    /**
     * Insert new admin in Database
     */
    public function createAdmin()
    {
        /*DB::insert('insert into admins(admin_name, admin_pass, type) values(?,?,?)',
        ['admin', 'admin', 'super']);*/

        /*$admin->admin_name = 'haris';
        $admin->admin_pass = '12345';
        $admin->type = 'normal';
        $admin->save();*/

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
        return view('/admin/dashboard');
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
        return view('/admin/all_admins', $pageData);
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
        return view('/admin/add_admin', $pageData);
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
        return view('/admin/add_admin', $pageData);
    }
}
