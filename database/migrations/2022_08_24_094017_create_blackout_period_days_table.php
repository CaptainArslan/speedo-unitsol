<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlackoutPeriodDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blackout_period_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('blackout_period_id');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreign('blackout_period_id')->references('id')->on('blackout_periods')->onDelete('cascade');
            $table->index(['day_id', 'blackout_period_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blackout_period_days');
    }
}
