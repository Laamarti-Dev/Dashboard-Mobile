<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * DB::table('users')->insert(['fullname'=>'Laamarti Mohamed','email'=>'laamarti@gmail.com','password'=>Hash::make('12301230LM'),'aboutMe'=>'','AboutUs'=>'','img'=>'MyUsername','IpToken'=>''])

     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname')->default(null);
            $table->string('email')->unique();
            $table->string('password');
            $table->mediumText('aboutMe')->default(null);
            $table->longText('AboutUs')->default(null);
            $table->string('img')->default(null);
            $table->string('IpToken')->default(null);
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
        Schema::dropIfExists('users');
    }
}
