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
        Schema::create('family__information', function (Blueprint $table) {
            $table->integer('userID');
            $table->string('familyCode', length:10);
            $table->string('emergencyContact', length:16);
            $table->string('relation', length:50);
            $table->boolean('isRegistered')->default(false);

            $table->foreign('userID')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family__information');
    }
};
