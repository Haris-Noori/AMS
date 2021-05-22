<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Log;

use App\Transformers\StudentTransformer;
use App\Transformers\GuardianTransformer;


class Student extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'student_id';

    /**
     * Fields fillable by student
     * 
     * @var array
     */
    protected $fillable = [
        // general info
        'first_name', 
        'last_name', 
        'gender', 
        'date_of_birth', 
        'blood_group', 
        'student_status', 
        'current_address',
        'permanent_address',
        'email',
        'phone',
        'medical_information',
        'additional_information',
        'guardian_id',

        // previous education info
        'educational_institute',
        'education_year',
        'education_info',
        
        // course info
        'course_title',
        'course_time',

        // residence & facilitaiton info
        'residence_status',
        'locker_no',
        'food',
        'uniform',
        'cap',
        'mattress',
        'bedsheet',
        'pillow',

        // feed and donation info
        'fee_status',
        'fee_amount',
        'fee_plan',
        'donation',
        'ref_name',
        'ref_num',
        'image',
        'document_path',

        // rollnumber
        'rollnumber'
    ];

    /**
     * @param request Illuminate\Http\Request
     * Recieves form data and makes entry in
     * Students and Students Guardian Table
     * @return void
     */
    public static function register(Request $request) {
        
        try {
            $guardian = GuardianTransformer::fromRequest($request);
            StudentGuardian::create($guardian);
            Log::debug("Created Guardian, ", $guardian);

            // create student
            $student = StudentTransformer::fromRequest($request);
            $student['guardian_id'] = (string)StudentGuardian::latest()->first()->id;
            // Log::debug('Created Student', $student);

            $rollNumber = Student::rollNumber();
            $student = array_merge($student, ['rollnumber' => $rollNumber]);
            Log::debug('Created Student', $student);

            Student::create($student);
        } catch(Exception $e) {
            return ["error" => "Failed registering user."];
        }
        // echo "Student registered";
    }

    /**
     *  Returns whether student being admitted
     *  is unique or not.
     * @param string firstName
     * @param string lastName
     * @param string fatherName
     * @return bool
     */
    public static function isUnique(String $firstName, String $lastName, String $fatherName) {
        Log::debug(count(Student::where(['first_name' => $firstName, 'last_name' => $lastName])->get()));
        Log::debug(count(StudentGuardian::where('father_name', $fatherName)->get()));
        Log::debug(Student::where('first_name', $firstName)
        ->where('last_name', $lastName)->get() && StudentGuardian::where('father_name', $fatherName)->get());
        return (count(Student::where(['first_name' => $firstName, 'last_name' => $lastName])->get()) == 0)
            && (count(StudentGuardian::where('father_name', $fatherName)->get()) == 0);
    }

    

    /**
     * Get the guardian associated with the student.
     */
    public function guardian() 
    {
        return $this->hasOne('App\Models\StudentGuardian');
    }

    private static function rollNumber() 
    {
        $total_std = Student::count();  //returns number of data in database
        $std_id = $total_std+1;          //generating next roll number
        
        $year = date('Y');          //2021
        $year = substr($year,-2);      //last two number

        $month = date('m');             //current month 05 

        $new_std_id = '';
        if($std_id < 10){
            $new_std_id = $year.$month.'-000'.$std_id;
        }
        elseif($std_id > 10 and $std_id < 99){
            $new_std_id = $year.$month.'-00'.$std_id;
        }
        elseif($std_id > 100 and $std_id < 999){
            $new_std_id = $year.$month.'-0'.$std_id;
        }
        else{
            $new_std_id = $year.$month.'-'.$std_id;
        }

        print_r('Roll Number: '.$new_std_id);
        return $new_std_id;
    }
}
