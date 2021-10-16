<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentLoginController extends Controller
{
    //
    public function index()
    {
        return "Hello, this is Student Controller";
    }

    public function open_admin_View()
    {
        return view('/admin/login');
    }
}
