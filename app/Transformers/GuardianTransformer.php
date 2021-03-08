<?php

namespace App\Transformers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentGuardian;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class GuardianTransformer extends TransformerAbstract {

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
    protected $defaultIncludes = [];

    public static function transform(StudentGuardian $guardian)
    {
        return [
            'father_name' => $guardian->father_name, 
            'phone' => $guardian->phone, 
            'cnic' => $guardian->cnic, 
            'occupation' => $guardian->occupation, 
            'mother_name' => $guardian->mother_name, 
            'guardian_name' => $guardian->guardian_name, 
            'relation_with_student' => $guardian->relation_with_student,
            'guardian_phone' => $guardian->guardian_phone
        ];
    }

     /**
     * Returns array form from request
     * @param request \Illuminate\Http\Request
     * @return array
     */
    public static function fromRequest(Request $request) {
        return [
            'father_name' => $request->input('st_father_name'), 
            'phone' => $request->input('st_father_phone'), 
            'cnic' => $request->input('st_father_cnic'), 
            'occupation' => $request->input('st_father_occup'), 
            'mother_name' => $request->input('st_mother_name'), 
            'guardian_name' => $request->input('st_guard_name'), 
            'relation_with_student' => $request->input('st_guard_rel'),
            'guardian_phone' => $request->input('st_guard_phone')
        ];
    }
}