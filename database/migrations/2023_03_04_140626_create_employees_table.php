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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('grand_father_name');
            $table->timestamp('birth_date');
            $table->string('birth_place');
            $table->string('religion');
            $table->string('gender');
            $table->string('nationality');
            $table->string('marital_status');
            $table->longText('additional_skill')->nullable();
            $table->uuid('user_id');
            $table->uuid('department_id');
            $table->boolean('is_approved')->nullable();
            $table->timestamps();

            $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
                    ->onUpdate('cascade');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
