<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class SubChannels extends Model
{
    protected $collection = 'sub_channels';
    public $timestamps = false;

    public function mainChannels()
    {
        return $this->belongsToMany('App\Models\MainChannels','_id');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Articles','_id');
    }
}

