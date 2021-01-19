<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return "Hello, this is Admin Controller";
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
}
