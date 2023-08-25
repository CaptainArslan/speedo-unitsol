<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_grading_id');
            $table->unsignedBigInteger('student_id');
            $table->enum('status', ['Pass', 'Fail']);
            $table->text('remarks');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('class_grading_id')->references('id')->on('class_gradings')->onDelete('cascade');
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
        Schema::dropIfExists('gradings');
    }
}
