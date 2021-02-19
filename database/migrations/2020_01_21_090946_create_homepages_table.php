<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner_image')->nullable();
            $table->string('banner_title')->nullable();
            $table->text('banner_description')->nullable();
            $table->string('charity_title')->nullable();
            $table->text('charity_description')->nullable();
            $table->string('workflow_title1')->nullable();
            $table->text('workflow_description1')->nullable();
            $table->string('workflow_title2')->nullable();
            $table->text('workflow_description2')->nullable();
            $table->string('workflow_title3')->nullable();
            $table->text('workflow_description3')->nullable();
            $table->string('workflow_title4')->nullable();
            $table->text('workflow_description4')->nullable();
            $table->string('footer_caption')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->string('instagram')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->text('policy')->nullable();
            $table->text('terms')->nullable();
            $table->string('help')->nullable();
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
        Schema::dropIfExists('homepages');
    }
}
