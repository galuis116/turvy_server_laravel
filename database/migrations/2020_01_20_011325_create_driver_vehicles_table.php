<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->integer('make_id')->unsigned()->nullable();
            $table->foreign('make_id')->references('id')->on('vehicle_makes')->onDelete('set null');
            $table->integer('model_id')->unsigned()->nullable();
            $table->foreign('model_id')->references('id')->on('vehicle_models')->onDelete('set null');
            $table->String('servicetype_id')->nullable();
            $table->string('plate');
            $table->string('color')->nullable();
            $table->string('year')->nullable();
            $table->string('front_photo')->nullable();
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
        Schema::dropIfExists('driver_vehicles');
    }
}
