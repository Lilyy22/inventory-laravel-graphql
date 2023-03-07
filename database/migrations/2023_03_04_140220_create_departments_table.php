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
        Schema::create('departments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('remark')->nullable();
            $table->string('phone_no');
            // $table->string('manager_employee_id')->nullable();
            $table->uuid('company_id');
            // $table->uuid('parent_id');
            $table->timestamps();

            $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
                    ->onUpdate('cascade');
            // $table->foreign('manager_employee_id')
            //         ->references('id')
            //         ->on('employees')
            //         ->onUpdate('cascade');
            // $table->foreign('parent_id')
            //         ->references('id')
            //         ->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
