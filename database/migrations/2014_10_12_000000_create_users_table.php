<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->unsignedBigInteger('emirate_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob')->nullable();
            $table->integer('salary')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->date('contract_start_date')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->text('address')->nullable();
            $table->string('street_no')->nullable();
            $table->string('building_name')->nullable();
            $table->text('villa_no')->nullable();
            $table->string('nearest_landmark')->nullable();
            $table->string('relation')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->enum('status', ['Active', 'de Avtive'])->default('Active');
            $table->string('email')->unique();
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_trainer')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('nationality_id')->references('id')->on('nationalities')->cascadeOnDelete();
            $table->foreign('designation_id')->references('id')->on('designations')->cascadeOnDelete();
            $table->index(['nationality_id', 'designation_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
