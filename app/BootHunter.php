<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BootHunter extends Model
{
    public $table = "ipdetection";
    protected $fillable = ['id','ip','country_name','city','isp','block','packageName','created_at','updated_at','domain'];
}
