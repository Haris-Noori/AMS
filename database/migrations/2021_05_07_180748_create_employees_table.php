<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->enum('gender', ['N/A', 'Male', 'Female']);
            $table->date('date_of_birth')->nullable();
            $table->enum('blood_group', ['N/A', 'A-', 'A+', 'B-', 'B+', 'O-', 'O+', 'AB+', 'AB-']);
            $table->string('cnic')->default('N/A');
            $table->string('marital_status')->default('N/A');
            $table->string('email')->default('N/A')->default('N/A');
            $table->string('phone')->default('N/A')->default('N/A');
            $table->string('current_address')->default('N/A');
            $table->string('permanent_address')->default('N/A');
            $table->text('medical_information')->nullable();
            $table->text('additional_information')->nullable();
            $table->string('employee_type')->default('N/A');
            $table->date('joining_date')->nullable();
            $table->string('basic_salary')->default('N/A');
            $table->string('bank_account')->default('N/A');
            $table->string('job_status')->default('N/A');
            $table->string("password")->default('1234');

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
}
