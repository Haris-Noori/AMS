<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;

class AdminController extends Controller
{
    //
    public function index()
    {
        $admin = new Admin();   // admin model

        return "Hello, this is Admin Controller";
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

    public function login()
    {
        return view('/admin/dashboard');
    }

    public function loadDashboard()
    {
        return view('/admin/dashboard');
    }

    public function loadAllAdmins()
    {
        return view('/admin/all-admins');
    }

    public function loadAddAdmin()
    {
        return view('/admin/add-admin');
    }

    /**
     * Returns the Add New Admin View
     */
    public function addAdminView()
    {
        $pageData = [
            'viewTitle' => "Add New Admin",
        ];
        return view('/admin/add_admin', $pageData);
    }

    /**
     * Get Data from the Add New Admin Form
     * Insert into Database
     */
    public function addNewAdmin(Request $request)
    {
        // $admin_name = $request->input('admin_name');
        // echo $admin_name;

        error_log(request('admin_name'));
        error_log(request('admin_pass'));
        error_log(request('type'));

        // return redirect('/');
    }
}
