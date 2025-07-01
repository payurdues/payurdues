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
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('association_id');
            $table->foreign('association_id')->references('id')->on('associations')->onDelete('cascade');
            $table->string('title');
            $table->date('voting_date');
            $table->time('voting_time');
            $table->integer('voting_period'); // in hours
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
        Schema::dropIfExists('elections');
    }
};
