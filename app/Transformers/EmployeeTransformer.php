<?php

namespace App\Transformers;

use Illuminate\Http\Request;

use App\Models\Employee;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class EmployeeTransformer extends TransformerAbstract {

    /**
     * List of resources possible to include
     *
     * @var  array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    // protected $defaultIncludes = [
    //     //
    // ];

    public static function transform(Employee $employee)
    {
        return [
            'first_name' => $employee->first_name, 
            'last_name' => $employee->last_name,
            'father_name' => $employee->father_name, 
            'gender' => $employee->gender, 
            'date_of_birth' => $employee->date_of_birth, 
            'blood_group' => $employee->blood_group,
            'cnic' => $employee->cnic,
            'marital_status' => $employee->marital_status, 
            'email' => $employee->email,
            'phone' => $employee->phone,
            'current_address' => $employee->current_address,
            'permanent_address'  => $employee->permanent_address,
            'medical_information' => $employee->medical_information,
            'additional_information' => $employee->additional_information,
            'employee_type' => $employee->employee_type,
            'joining_date' => $employee->joining_date,
            'basic_salary' => $employee->basic_salary,
            'bank_account' => $employee->bank_account,
            'job_status' => $employee->job_status
        ];
    }

    /**
     * Returns array form from request
     * @param request \Illuminate\Http\Request
     * @return array
     */
    public static function fromRequest(Request $request) {
        return [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'), 
            'father_name' => $request->input('father_name'),
            'gender' => $request->input('gender'), 
            'date_of_birth' => $request->input('dob'), 
            'blood_group' => $request->input('blood_group'),
            'cnic' => $request->input('cnic'),
            'marital_status' => $request->input('marital_status'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'current_address'  => $request->input('current_address') !== null ? $request->input('current_address') : "N/A",
            'permanent_address' => $request->input('permanent_address') !== null ? $request->input('permanent_address') : "N/A",
            'medical_information' => $request->input('medical_info'),
            'additional_information' => $request->input('additional_info'), 
            'employee_type' => $request->input('employee_type'),
            'joining_date' => $request->input('joining_date'),
            'basic_salary' => $request->input('basic_salary'),
            'bank_account' => $request->input('bank_account'),
            'job_status' => $request->input('job_status'),            
        
        ];
    }
}