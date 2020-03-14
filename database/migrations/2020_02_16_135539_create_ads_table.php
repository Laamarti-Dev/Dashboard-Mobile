<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('email_Recovery')->unique();
            $table->string('password');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('ip');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('adress');
            $table->string('phone');
            $table->string('pinCode');
            $table->string('monetization');
            $table->string('id_ads');
            $table->boolean('status');
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
        Schema::dropIfExists('ads');
    }
}
