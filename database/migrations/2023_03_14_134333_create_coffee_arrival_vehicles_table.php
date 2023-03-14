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
        Schema::create('coffee_arrival_vehicles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('plate_no');
            $table->string('driver_name');
            $table->string('driver_phone_no');
            $table->string('driver_license_no');
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
        Schema::dropIfExists('coffee_arrival_vehicles');
    }
};
