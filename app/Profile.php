<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $table = "users";
    protected $fillable = ['id','fullname','email','password','aboutMe','AboutUs','img','IpToken'];
}
