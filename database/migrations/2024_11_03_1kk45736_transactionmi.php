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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Reference to a student
            $table->string('reference')->unique(); // Transaction reference, must be unique
            $table->string('trans_id')->unique(); // Transaction ID, must be unique
            $table->unsignedBigInteger('due_id'); // Reference to a due or fee ID
            $table->unsignedBigInteger('association_id'); // Reference to a due or fee ID
            $table->string('faculty'); // Faculty name
            $table->string('dept'); // Faculty name
            $table->text('narration')->nullable(); // Details of the transaction, nullable
          
            $table->decimal('amount', 15, 2); // Amount in decimal format

            $table->decimal('final_amount', 15, 2);

            $table->decimal('charges', 15, 2);

            $table->enum('amount_type', ['credit', 'debit']);
            $table->enum('status', ['cancelled', 'pending', 'approved']);
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
