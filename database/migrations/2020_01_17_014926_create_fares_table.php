<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->integer('servicetype_id')->unsigned();
            $table->foreign('servicetype_id')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->string('company_commission');
            $table->string('base_ride_distance');
            $table->string('base_ride_distance_charge');
            $table->string('price_per_unit');
            $table->string('fee_waiting_time');
            $table->string('waiting_price_per_minute');
            $table->string('gst_charge');
            $table->string('fuel_surge_charge');
            $table->string('nsw_gtl_charge');
            $table->string('nsw_ctp_charge');
            $table->string('booking_charge');
            $table->string('cancel_charge');
            $table->string('free_ride_minute');
            $table->string('price_per_ride_minute');
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
        Schema::dropIfExists('fares');
    }
}
