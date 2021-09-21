<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiderRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned()->nullable();
            $table->integer('driver_id')->unsigned()->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
            $table->integer('rider_id')->unsigned();
            $table->foreign('rider_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('rating', 2, 1);
            $table->string('comment');
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
        Schema::dropIfExists('rider_ratings');
    }
}
