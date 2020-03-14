<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    public $table = "console";
    protected $fillable = ['id','email', 'email_Recovery', 'password','country','state','city','ip','latitude','longitude','open_Method','card_Number','phone','status','created_at','updated_at'];

}
