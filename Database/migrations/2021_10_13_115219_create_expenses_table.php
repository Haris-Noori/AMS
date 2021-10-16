<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->string('description')->nullable();
            $table->string('amount');
            $table->string('status');              // paid or unpaid
            $table->string('image_path')->nullable();
            $table->string('added_by');             // username or email
            $table->string('user_designation');     // admin or employee
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
        Schema::dropIfExists('expenses');
    }
}
