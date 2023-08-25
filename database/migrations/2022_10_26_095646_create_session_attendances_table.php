<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_session_id');
            $table->unsignedBigInteger('student_id');
            $table->enum('status', ['Present', 'Absent', 'Late']);
            $table->text('late')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('class_session_id')->references('id')->on('class_sessions')->onDelete('cascade');
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
        Schema::dropIfExists('session_attendances');
    }
}
