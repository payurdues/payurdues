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
        
        Schema::table('elections', function (Blueprint $table) {
            $table->enum('status', ['ongoing', 'created', 'past'])->default('created')->after('voting_period');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
        Schema::table('elections', function (Blueprint $table) {
            $table->dropColumn('status');
        });
       
    }
};
