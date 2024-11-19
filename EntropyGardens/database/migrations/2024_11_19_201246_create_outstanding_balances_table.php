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
        Schema::create('outstanding_balances', function (Blueprint $table) {
            $table->integer('balanceID')->autoIncrement();
            $table->integer('userID');
            $table->decimal('payTab', total:10, places:2);

            $table->primary('balanceID');
            $table->foreign('userID')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outstanding_balances');
    }
};
