<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('gender')->unsigned();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->string('abn')->nullable();
            $table->string('commission')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->integer('state_id')->unsigned()->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->string('avatar')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code',100)->nullable();
            $table->boolean('is_online')->default(0);
            $table->boolean('is_login')->default(0);
            $table->boolean('is_busy')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('drivers');
    }
}
