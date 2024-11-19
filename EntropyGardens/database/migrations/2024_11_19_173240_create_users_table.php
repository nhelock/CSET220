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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('roleName', length: 20);
            $table->string('firstName', length: 50);
            $table->string('lastName', length:50);
            $table->string('email', length:100);
            $table->string('phoneNumber', length:16);
            $table->text('password');
            $table->date('DOB');
            $table->boolean('isRegistered')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
