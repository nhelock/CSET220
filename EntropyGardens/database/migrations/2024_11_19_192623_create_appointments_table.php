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
        Schema::create('appointments', function (Blueprint $table) {
            $table->integer('appointmentID')->autoIncrement();
            $table->integer('userID_Patient');
            $table->date('date');
            $table->integer('userID_Doctor');

            $table->primary('appointmentID');
            $table->foreign('userID_Patient')->references('userID')->on('users');
            $table->foreign('userID_Doctor')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
