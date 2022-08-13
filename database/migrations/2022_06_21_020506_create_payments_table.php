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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('transactionId')->unique();
            $table->date('paidDate');
            $table->string('amount');
            $table->string('paymentMethod');
            $table->string('status');
            $table->foreignId('paidBy')->constrained('users');
            $table->foreignId('paidFor')->constrained('bookings');
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
        Schema::dropIfExists('paymentss');
    }
};
