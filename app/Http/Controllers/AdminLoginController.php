<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //
    public function index()
    {
        return "Hello, this is Admin Login Controller";
    }

    public function openAdminDashoard()
    {
        return view('/admin/dashboard');
    }
}
