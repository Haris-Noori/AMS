<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            
            // general info
            $table->increments('id', true);
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['male', 'female']);
            $table->date('date_of_birth');
            $table->enum('blood_group', ['N/A', 'A-', 'A+', 'B-', 'B+', 'O-', 'O+', 'AB+', 'AB-']);
            $table->string('student_status')->default('N/A');
            $table->string('current_address')->default('N/A');
            $table->string('permanent_address')->default('N/A');
            $table->string('email')->default('N/A')->default('N/A');
            $table->string('phone')->default('N/A')->default('N/A');            
            $table->text('medical_information')->nullable();
            $table->text('additional_information')->nullable();
            $table->integer('guardian_id')->unsigned();

            // previous education info
            $table->string('educational_institute')->default('N/A');
            $table->string('education_year')->default('N/A');
            $table->string('education_info')->default('N/A');

            // course info
            $table->string('course_title');
            $table->string('course_time');
            
            // residence & facilities info
            $table->string('residence_status');
            $table->string('locker_no')->default('N/A');
            $table->string('food');
            $table->boolean('uniform');
            $table->boolean('cap');
            $table->boolean('mattress');
            $table->boolean('bedsheet');
            $table->boolean('pillow');

            // feed and donation info
            $table->string('fee_status');
            $table->string('fee_amount')->nullable();
            $table->string('fee_plan')->nullable();
            $table->string('donation')->default('N/A');
            $table->string('ref_name')->default('N/A');
            $table->string('ref_num')->default('N/A');


            $table->timestamps();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('guardian_id')->references('id')->on('student_guardians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
