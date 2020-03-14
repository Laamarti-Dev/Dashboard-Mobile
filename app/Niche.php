<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niche extends Model
{
    public $table = "niche";
    protected $fillable = ['id','name','category','about','status'];
}
