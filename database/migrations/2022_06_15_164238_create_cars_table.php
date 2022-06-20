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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_brand_id')->constrained('car_brands');
            $table->string('car_name');
            $table->string('plate_no');
            $table->string('image')->nullable();
            $table->boolean('stock');
            $table->integer('minimum_charge');
            $table->integer('charge_per_km');
            $table->integer('seat_capacity');
            $table->string('fuel_type');
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
        Schema::dropIfExists('cars');
    }
};
