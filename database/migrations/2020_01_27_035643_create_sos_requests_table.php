<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSosRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sos_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rider_id')->unsigned()->nullable();
            $table->foreign('rider_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('driver_id')->unsigned()->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->integer('sos_number')->unsigned();
            $table->foreign('sos_number')->references('id')->on('sos_contacts')->onDelete('cascade');
            $table->text('content')->nullable();
            $table->double('lat');
            $table->double('lng');
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
        Schema::dropIfExists('sos_requests');
    }
}
