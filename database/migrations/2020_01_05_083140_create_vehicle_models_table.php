<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('servicetype_id')->unsigned();
            $table->foreign('servicetype_id')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->integer('make_id')->unsigned();
            $table->foreign('make_id')->references('id')->on('vehicle_makes')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_models');
    }
}
