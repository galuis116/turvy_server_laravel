<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rider_id')->unsigned()->nullable();
            $table->foreign('rider_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('rider_country_id')->unsigned()->nullable();
            $table->foreign('rider_country_id')->references('id')->on('countries')->onDelete('set null');
            $table->string('rider_name');
            $table->string('rider_mobile');
            $table->string('rider_email');
            $table->boolean('is_current')->default(0);
            $table->date('booking_date');
            $table->time('booking_time');
            $table->string('origin');
            $table->double('origin_lat', 15, 8)->nullable();
            $table->double('origin_lng', 15, 8)->nullable();
            $table->string('destination');
            $table->double('destination_lat', 15, 8)->nullable();
            $table->double('destination_lng', 15, 8)->nullable();
            $table->integer('servicetype_id')->unsigned()->nullable();
            $table->foreign('servicetype_id')->references('id')->on('vehicle_types')->onDelete('set null');
            $table->integer('driver_id')->unsigned()->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
            $table->integer('coupon_id')->unsigned()->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');
            $table->integer('payment_id')->unsigned()->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null');
            $table->boolean('is_manual')->default(1);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamp('arrival_time')->nullable();
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('appointments');
    }
}
