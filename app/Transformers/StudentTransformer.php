<?php

namespace App\Transformers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\StudentGuardian;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class StudentTransformer extends TransformerAbstract {

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
    protected $defaultIncludes = [
        'guardian'
    ];

    public static function transform(Student $student)
    {
        return [
            'first_name' => $student->first_name, 
            'last_name' => $student->last_name, 
            'gender' => $student->gender, 
            'date_of_birth' => $student->date_of_birth, 
            'blood_group' => $student->blood_group, 
            'student_status'  => $student->student_status, 
            'current_address' => $student->current_address,
            'permanent_address'  => $student->permanent_address,
            'email' => $student->email,
            'phone' => $student->phone,
            'medical_information' => $student->medical_information,
            'guardian_id' => $student->guardian_id
        ];
    }

    /**
     * Returns array form from request
     * @param request \Illuminate\Http\Request
     * @return array
     */
    public static function fromRequest(Request $request) {
        return [
            'first_name' => $request->input('st_first_name'),
            'last_name' => $request->input('st_last_name'), 
            'gender' => $request->input('st_gender'), 
            'date_of_birth' => $request->input('st_dob'), 
            'blood_group' => $request->input('st_blood'), 
            'student_status'  => $request->input('st_status'), 
            'current_address'  => $request->input('st_cur_st_add') !== null ? $request->input('st_cur_st_add') : "N/A",
            'permanent_address' => $request->input('st_perm_st_add') !== null ? $request->input('st_perm_st_add') : "N/A",
            'email' => $request->input('st_email'),
            'phone' => $request->input('st_phone'),
            'medical_information' => $request->input('st_medical_info'),
            'additional_information' => $request->input('st_add_info'),

            // aditional info
            'educational_institute' => $request->input('st_edu_inst'),
            'education_year' => $request->input('st_edu_year'),
            'education_info' => $request->input('st_edu_info'),

            // course info
            'course_title'  => $request->input('st_crs_title'),
            'course_time' => $request->input('st_crs_time'),
            
            // residence info
            'residence_status' => $request->input('st_resi_status'),
            'locker_no' => $request->input('st_locker_no'),
            'food' => $request->input('st_food'),
            'uniform' => $request->input('st_uniform') == "yes" ? true : false,
            'cap' => $request->input('st_cap') == "yes" ? true : false,
            'mattress' => $request->input('st_mattress') == "yes" ? true : false,
            'bedsheet' => $request->input('st_bedsheet') == "yes" ? true : false,
            'pillow' => $request->input('st_pillow') == "yes" ? true : false,
 
            // food and donation info
            'fee_status' => $request->input('st_fee_status'),
            'fee_amount' => $request->input('st_fee_amount'),
            'fee_plan' => $request->input('st_fee_plan'),           
            'donation' => $request->input('st_donation'),
            'ref_name' => $request->input('st_ref_name'),
            'ref_num' => $request->input('st_ref_num'),
            'image' => $request->input('st_image'),
            'document_path' => $request->input('st_docs')
        ];
    }
}