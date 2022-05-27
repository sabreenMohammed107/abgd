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
         //  This is Realations for the user_parents Table ..
     Schema::table('user_parents', function (Blueprint $table) {

        $table->foreign('user_id')->references('id')->on('users');

    });

     //  This is Realations for the school_parents Table ..
     Schema::table('school_parents', function (Blueprint $table) {

        $table->foreign('school_id')->references('id')->on('schools');
        $table->foreign('user_parent_id')->references('id')->on('user_parents');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
