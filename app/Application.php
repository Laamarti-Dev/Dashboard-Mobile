<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $table = "application";
    protected $fillable = ['id', 'packageName', 'icon', 'name', 'description', 'category', 'type', 'email', 'installs', 'date_P', 'date_U', 'developer_Name', 'review', 'status','ads_status', 'id_console', 'created_at', 'updated_at'];


}
