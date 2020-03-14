<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    public $table = "ads";
    protected $fillable = ['id','email', 'email_Recovery', 'password','country','state','city','ip','latitude','longitude','adress','phone','monetization','id_ads','status','created_at','updated_at','pinCode'];
}
