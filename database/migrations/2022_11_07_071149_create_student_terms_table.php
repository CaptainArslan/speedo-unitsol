<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_detial_id');
            $table->unsignedBigInteger('term_id');
            $table->unsignedBigInteger('student_id');
            $table->integer('qty');
            $table->string('day');
            $table->bigInteger('no_of_class')->default(0);
            $table->enum('type',['term','package']);
            $table->enum('status',['on','off']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('order_detial_id')->references('id')->on('order_detials')->onDelete('cascade');
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
        Schema::dropIfExists('student_terms');
    }
}
