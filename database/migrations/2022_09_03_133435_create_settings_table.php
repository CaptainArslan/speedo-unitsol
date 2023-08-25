<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_logo')->nullable();
            $table->string('business_address')->nullable();
            $table->string('copyright')->nullable();
            $table->string('main_site')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->boolean('maintanance_mode')->default(0);
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_encryption')->nullable();
            $table->boolean('activity_logs')->default(0);
            $table->boolean('2_factor_auth')->default(0);
            $table->boolean('auto_logout')->default(0);
            $table->boolean('login_alert')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
