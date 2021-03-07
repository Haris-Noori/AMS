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
            $table->string('father_name')->default('N/A');
            $table->string('phone')->default('N/A');
            $table->string('cnic')->default('N/A');
            $table->string('occupation')->default('N/A');
            $table->string('mother_name')->default('N/A');
            $table->string('guardian_name')->default('N/A');
            $table->string('relation_with_student')->default('N/A');
            $table->string('guardian_phone')->default('N/A');
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
        Schema::table('student_guardians', function (Blueprint $table) {
            //
        });
    }
}
