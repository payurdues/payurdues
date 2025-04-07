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
        Schema::create('dues', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->string('name'); // Due name
                $table->decimal('amount', 10, 2); // Amount (decimal)
                $table->decimal('charges', 10, 2); // Charges (decimal)
                $table->unsignedBigInteger('association_id'); // Association ID (foreign key)
                $table->json('payable_faculties')->nullable(); // Payable faculties (JSON, nullable)
                $table->json('payable_departments')->nullable(); // Payable departments (JSON, nullable)
                $table->json('payable_levels')->nullable(); // Payable levels (JSON, nullable)
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
        Schema::dropIfExists('dues');
    }
};
