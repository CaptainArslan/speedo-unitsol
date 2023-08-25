<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReqDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_req_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('image')->nullable();
            $table->string('emirate_front_img')->nullable();
            $table->string('emirate_back_img')->nullable();
            $table->string('nda')->nullable();
            $table->string('employee_contract')->nullable();
            $table->string('employee_image')->nullable();
            $table->string('insurance_doc')->nullable();
            $table->string('achivement_doc')->nullable();
            $table->string('certification_doc')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_req_docs');
    }
}
