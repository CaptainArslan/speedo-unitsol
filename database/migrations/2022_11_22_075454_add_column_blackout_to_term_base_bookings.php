<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnBlackoutToTermBaseBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('term_base_bookings', function (Blueprint $table) {
            $table->boolean('blackout_check')->default(0);
            $table->date('blackout_start_date')->nullable();
            $table->date('blackout_end_date')->nullable();
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
