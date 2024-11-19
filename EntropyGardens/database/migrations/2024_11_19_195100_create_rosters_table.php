<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rosters', function (Blueprint $table) {
            $table->integer('rosterID')->autoIncrement();
            $table->date('date');
            $table->integer('userID_Doctor');
            $table->integer('userID_CG1');
            $table->integer('userID_CG2');
            $table->integer('userID_CG3');
            $table->integer('userID_CG4');

            $table->primary('rosterID');

            $table->foreign('userID_Doctor')->references('userID')->on('users');
            $table->foreign('userID_CG1')->references('userID')->on('users');
            $table->foreign('userID_CG2')->references('userID')->on('users');
            $table->foreign('userID_CG3')->references('userID')->on('users');
            $table->foreign('userID_CG4')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rosters');
    }
};
