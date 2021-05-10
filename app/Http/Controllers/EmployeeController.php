<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
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
                //$session_data = Employee::getEmployeeSessionData();
                //print_r($session_data);
                return view('/employee/index',Employee::getEmployeeSessionData());
            }
        } else {
            log::debug("Hey");
            return "Not post";
        }
    }
}
