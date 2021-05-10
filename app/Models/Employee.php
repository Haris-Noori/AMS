<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Log;

use App\Transformers\EmployeeTransformer;

class Employee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'employee_id';

    /**
     * Fields fillable by Employee
     * 
     * @var array
     */
    protected $fillable = [
        // general info
        'first_name', 
        'last_name',
        'father_name',
        'gender', 
        'date_of_birth', 
        'blood_group', 
        'cnic',
        'marital_status',
        'email',
        'phone', 
        'current_address',
        'permanent_address',
        'medical_information',
        'additional_information',
        'employee_type',
        'joining_date',
        'basic_salary',
        'bank_account',
        'job_status'
    ];


    public static function login(String $name, String $pass) {
        
        $employee = Employee::where('first_name', '=', $name)->where('password', '=', $pass)->first();
        //print_r($employee);
        if ($employee === null ) {
            //employee does not exist
            return FALSE;
        }
        else{
            // //employee exist
            session(['session_employee_id' => $employee->id]);
            session(['session_employee_name' => $employee->first_name]);
            session(['session_employee_password'=> $employee->password]);
            return TRUE;
            
        }
    }

    /**
     * id of current employee
     */
    public static function id() {
        return session('session_employee_id');
    }

    public static function getEmployeeSessionData(){
       
       return $data = [
        'session_employee_id' => session('session_employee_id'),
        'session_employee_name' => session('session_employee_name'),
        'session_employee_pass'=> session('session_employee_password')
       ];
    }



    /**
     * @param request Illuminate\Http\Request
     * Recieves form data and makes entry in
     * Employees Table
     * @return void
     */
    public static function add(Request $request) {
        
        try {
            // create employee
            $employee = EmployeeTransformer::fromRequest($request);
            Log::debug('Created Employee', $employee);
            Employee::create($employee);
        } catch(Exception $e) {
            return ["error" => "Failed creating employee."];
        }
        
    }


}
