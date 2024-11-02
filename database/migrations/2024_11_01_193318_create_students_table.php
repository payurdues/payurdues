<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('matric_no')->unique()->nullable(); // Matric Number
            $table->string('jamb_reg')->unique()->nullable(); // JAMB Registration
            $table->string('form_no')->unique()->nullable(); // Form Number
            $table->string('first_name'); // First Name
            $table->string('other_names')->nullable(); // Other Names
            $table->string('faculty'); // Faculty
            $table->string('department')->nullable();
            $table->string('level')->nullable();
          
            $table->enum('facultyduestatus', ['pending', 'paid'])->default('pending'); // Faculty Due Status
            $table->enum('depduestatus', ['pending', 'paid'])->default('pending'); // Department Due Status
            $table->enum('levelduestatus', ['pending', 'paid'])->default('pending'); // Level Due Status

            $table->timestamps(); // Created and Updated timestamps
          
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
