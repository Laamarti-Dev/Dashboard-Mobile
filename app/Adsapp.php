<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adsapp extends Model
{
    public $table = 'adsapps';
    protected  $fillable = ['id','id_ads','id_apps','banner','interstitial','rewarded','native','jsonurl','status','created_at','updated_at'];
}
