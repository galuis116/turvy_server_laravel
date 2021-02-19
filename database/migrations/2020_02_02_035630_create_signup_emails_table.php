<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignupEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signup_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender_email');
            $table->string('sender_name');
            $table->text('subject');
            $table->text('title');
            $table->text('body1');
            $table->text('body2');
            $table->text('footer');
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('signup_emails');
    }
}
