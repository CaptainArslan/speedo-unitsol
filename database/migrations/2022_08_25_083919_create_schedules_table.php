<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('swimming_class_id');
            $table->unsignedBigInteger('venue_id');
            $table->string('class_name');
            $table->integer('no_of_student');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('trainer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('swimming_class_id')->references('id')->on('swimming_classes')->onDelete('cascade');
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->index(['user_id', 'swimming_class_id', 'venue_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
