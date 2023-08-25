<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassPromotRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_promot_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('term_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('swimming_class_id');
            $table->enum('type',['term','package']);
            $table->enum('status',['waiting','accepted']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('swimming_class_id')->references('id')->on('swimming_classes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_promot_requests');
    }
}
