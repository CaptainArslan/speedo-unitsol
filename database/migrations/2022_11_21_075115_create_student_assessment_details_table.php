<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssessmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assessment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assessment_student_id');
            $table->unsignedBigInteger('assessment_id');
            $table->enum('status', ['I can do it', 'Nearly There','Beyond Excepted']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('assessment_id')->references('id')->on('assessments')->onDelete('cascade');
            $table->foreign('assessment_student_id')->references('id')->on('assessment_students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_assessment_details');
    }
}
