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
        Schema::create('associations', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->string('name'); // Company name

                $table->string('link')->nullable(); // Link (nullable)
                $table->string('email')->nullable(); // Email (nullable)
                $table->text('about')->nullable(); // About (nullable)
                $table->string('password'); // Password
                $table->string('contact_person_name'); // Contact person name
                $table->string('contact_person_phone'); // Contact person phone
                $table->string('bank_code'); // Bank code
                $table->string('bank_name'); // Bank name
                $table->string('bank_account_no'); // Bank account number
                $table->string('bank_account_name'); // Bank account number
                $table->string('provider'); // Provider
                $table->string('image')->nullable(); 
                $table->timestamps(); // Created and updated timestamps
        });


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associations');
    }
};
