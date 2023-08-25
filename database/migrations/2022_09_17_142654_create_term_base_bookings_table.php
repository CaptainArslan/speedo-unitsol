<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermBaseBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_base_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('term_id')->nullable();
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->unsignedBigInteger('venue_id')->nullable();
            $table->unsignedBigInteger('swimming_class_id');
            $table->string('name');
            $table->integer('no_of_class');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('discount')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('trainer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('swimming_class_id')->references('id')->on('swimming_classes')->onDelete('cascade');
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->index(['swimming_class_id', 'venue_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_base_bookings');
    }
}
