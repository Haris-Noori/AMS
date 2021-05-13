<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            // $table->integer('donation_box_id')->unsigned();
            $table->string('box_name');
            $table->string('amount_collected');
            $table->string('image_path')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->timestamps();
        });

        // Schema::table('donations', function (Blueprint $table) {
        //     $table->foreign('donation_box_id')->references('id')->on('donation_boxes');
        // });

        Schema::table('donations', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
