<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('swimming_class_id');
            $table->unsignedBigInteger('timing_id');
            $table->string('name');
            $table->integer('price');
            $table->enum('status', ['Active', 'de Active'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('swimming_class_id')->references('id')->on('swimming_classes')->onDelete('cascade');
            $table->foreign('timing_id')->references('id')->on('timings')->onDelete('cascade');
            $table->index(['user_id', 'timing_id', 'swimming_class_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
