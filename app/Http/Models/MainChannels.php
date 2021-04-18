<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MainChannels extends Model
{
    protected $collection = 'main_channels';
    public $timestamps = false;

    public function subChannels()
    {
        return $this->hasMany('App\Models\SubChannels','main_channels_id');
    }
}
