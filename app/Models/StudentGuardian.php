<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentGuardian extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_guardians';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'guardian_id';

    /**
     * Fields fillable by student
     * 
     * @var array
     */
    protected $fillable = [
        'father_name', 
        'phone', 
        'cnic', 
        'occupation', 
        'mother_name', 
        'guardian_name', 
        'relation_with_student',
        'guardian_phone'
    ];

    /**
     * Get the student associated with the guardian.
     */
    public function student() 
    {
        return $this->belongsTo('App\Models\Student');
    }
}
