<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('swimming_class_id')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->integer('discount')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->date('till_date')->nullable();
            $table->enum('status',['Active','Call back requested','Follow up 1','Follow up 2','Enroll Now','Lost']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('swimming_class_id')->references('id')->on('swimming_classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessment_requests');
    }
}
