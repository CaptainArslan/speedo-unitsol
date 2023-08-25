<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_schedule_id');
            $table->unsignedBigInteger('day_id');
            $table->timestamps();
            $table->foreign('employee_schedule_id')->references('id')->on('employee_schedules')->onDelete('cascade');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_days');
    }
}
