<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airport_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_name')->unique();
            $table->integer('airport_id')->unsigned();
            $table->foreign('airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->integer('destination_id')->unsigned();
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->integer('servicetype_id')->unsigned();
            $table->foreign('servicetype_id')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->double('price', 8, 2);
            $table->integer('number_tolls');
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
        Schema::dropIfExists('airport_prices');
    }
}
