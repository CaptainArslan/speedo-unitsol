<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('venue_id');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('asset_type_id');
            $table->string('asset_name');
            $table->string('asset_number');
            $table->integer('price')->nullable();
            $table->integer('qty')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['New Item', 'Featured', 'Out of Stock'])->default('New Item');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->foreign('asset_type_id')->references('id')->on('asset_types')->onDelete('cascade');
            $table->index(['user_id', 'venue_id', 'staff_id', 'asset_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
