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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->integer('prescriptionID')->autoIncrement();
            $table->integer('userID');
            $table->date('date');
            $table->text('comment');
            $table->string('morningMed', length:50);
            $table->string('afternoonMed', length:50);
            $table->string('nightMed', length:50);

            $table->primary('prescriptionID');

            $table->foreign('userID')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
