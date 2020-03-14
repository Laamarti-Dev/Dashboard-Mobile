<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('packageName')->unique();
            $table->string('icon');
            $table->string('name');
            $table->longText('description');
            $table->string('category');
            $table->string('type');
            $table->string('email');
            $table->string('installs');
            $table->string('date_P');
            $table->string('date_U');
            $table->string('developer_Name');
            $table->string('review');
            $table->boolean('status');
            $table->boolean('ads_status');
            $table->unsignedBigInteger('id_console');
            $table->timestamps();
            $table->foreign('id_console')->references('id')->on('console')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application');
    }
}
