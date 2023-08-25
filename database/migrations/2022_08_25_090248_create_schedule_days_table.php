<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('schedule_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->index(['day_id', 'schedule_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_days');
    }
}
