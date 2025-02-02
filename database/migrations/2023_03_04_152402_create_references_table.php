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
        Schema::create('references', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('city');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('position');
            $table->string('relation');
            $table->uuid('employee_id');
            $table->timestamps();

            $table->foreign('employee_id')
                    ->references('id')
                    ->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('references');
    }
};
