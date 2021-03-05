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
            
            $table->increments('id', true);
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['male', 'female']);
            $table->date('date_of_birth');
            $table->enum('blood_group', ['A-', 'A+', 'B-', 'B+', 'O-', 'O+', 'AB+', 'AB-']);
            $table->string('student_status');
            $table->text('current_address');
            $table->text('permanent_address');
            $table->string('email')->default('N/A');
            $table->string('phone')->default('N/A');            
            $table->text('medical_information');
            $table->text('additional_information');
            // $table->foreignId('guardian_id')->constrained('student_guardians');   
            $table->integer('guardian_id')->unsigned();
            // $table->index('guardian_id');
            // $table->foreign('guardian_id')->references('id')->on('student_guardians')->onDelete('cascade');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('guardian_id')->references('id')->on('student_guardians');
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
