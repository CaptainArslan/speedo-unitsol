<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTimingIdToTermBaseBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('term_base_bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('timing_id')->nullable();
            $table->foreign('timing_id')->references('id')->on('timings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('term_base_bookings', function (Blueprint $table) {
            //
        });
    }
}
