<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_assessment_id');
            $table->unsignedBigInteger('student_id');
            $table->string('message');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('class_assessment_id')->references('id')->on('class_assessments')->onDelete('cascade');
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
        Schema::dropIfExists('assessment_students');
    }
}
