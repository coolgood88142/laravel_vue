<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $connection = 'mysql_user';
    public $timestamps = false;

    public function sub_channels()
    {
        return $this->belongsToMany('App\Models\SubChannels','id');
    }
}