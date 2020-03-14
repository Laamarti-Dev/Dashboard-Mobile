<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('console', function (Blueprint $table) {
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
            $table->string('open_Method');
            $table->string('card_Number');
            $table->string('phone');
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
        Schema::dropIfExists('console');
    }
}
