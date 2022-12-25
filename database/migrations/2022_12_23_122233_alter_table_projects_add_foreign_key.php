<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProjectsAddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table){
            $table->foreignId('supervisorID')->references('id')->on('staff');
            $table->foreignId('examiner1ID')->references('id')->on('staff');
            $table->foreignId('examiner2ID')->references('id')->on('staff');
            $table->foreignId('stdID')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table){
            $table->foreignId('supervisorID');
            $table->foreignId('examiner1ID')->nullable();
            $table->foreignId('examiner2ID')->nullable();
        });
    }
}
