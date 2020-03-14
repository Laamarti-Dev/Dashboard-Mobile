<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpdetectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipdetection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip');
            $table->string('country_name');
            $table->string('city');
            $table->string('isp');
            $table->string('block');
            $table->string('domain');
            $table->string('packageName');
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
        Schema::dropIfExists('ipdetection');
    }
}
