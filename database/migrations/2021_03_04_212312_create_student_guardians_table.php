<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('father_name');
            $table->string('phone');
            $table->string('cnic');
            $table->string('occupation');
            $table->string('mother_name');
            $table->string('guardian_name');
            $table->string('relation_with_student');
            $table->string('guardian_phone');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_guardians', function (Blueprint $table) {
            //
        });
    }
}
