<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use League\Fractal;
use Log;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Activity;


class APIController extends Controller
{
    //
    public function getAdmins(){
        return Admin::all();
        
    }

    public function checkEmployee(Request $request){
        $employee_name = $request->header('employee_name');
        $employee_password = $request->header('password');
        // return $employee_password;
        $employee = Employee::where('first_name','=', $employee_name)->where('password','=', $employee_password)->get(['id','first_name','password']);
    
        // return $employee;
        if($employee){
            return $employee;
        }
        return 'Credentials are not valid';
        // return response()->json(['error'=>'Credentials are not valid']);
    }

    public function addActivity(Request $request){
        //return $request->all();
        // $activity = new Activity;
        
        // $activity->activity_name = $request->header('activity_name');
        // $activity->activity_description = $request->header('activity_description');
        // $activity->from = $request->header('start_time');
        // $activity->to = $request->header('end_time');
        // $activity->employee_id = (int)$request->header('employee_id');
        // $activity->save();
        $employee_id = (int)$request->header('employee_id');
        $activity_name = $request->header('activity_name');
        $activity_description = $request->header('activity_description');
        $from = $request->header('start_time');
        $to = $request->header('end_time');
        
        // return $activity->activity_description;    
        $activity = [
            'activity_name' => $activity_name,
            'activity_description' => $activity_description,
            'from' => $from, 
            'to' => $to,
            'employee_id' => $employee_id 
        ];
        // return $request;
        Activity::create($activity);
        //$activity = new Activity;
        //$activity->employee_id =
        return True;

    }

    public function getActivity(Request $request){
        $employee_id = $request->header('employee_id');
        $activity = Activity::where('employee_id',$employee_id)->get();
        return $activity;
    }


}
