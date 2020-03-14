<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adsapps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_ads');
            $table->unsignedBigInteger('id_apps');
            $table->string('banner');
            $table->string('interstitial');
            $table->string('rewarded');
            $table->string('native');
            $table->string('jsonurl');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('id_apps')->references('id')->on('application');
            $table->foreign('id_ads')->references('id')->on('ads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adsapps');
    }
}
