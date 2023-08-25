<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermBaseBookingPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_base_booking_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('term_base_booking_id');
            $table->string('name')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('no_of_class');
            $table->float('price');
            $table->float('total');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('term_base_booking_id')->references('id')->on('term_base_bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_base_booking_packages');
    }
}
