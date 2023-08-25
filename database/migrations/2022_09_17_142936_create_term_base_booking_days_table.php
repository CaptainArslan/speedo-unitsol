<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermBaseBookingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_base_booking_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('term_base_booking_id');
            $table->unsignedBigInteger('day_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->foreign('term_base_booking_id')->references('id')->on('term_base_bookings')->onDelete('cascade');
            $table->index(['day_id', 'term_base_booking_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_base_booking_days');
    }
}
