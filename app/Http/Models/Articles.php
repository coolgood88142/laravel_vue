<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Articles extends Model
{
    protected $collection = 'articles';
    public $timestamps = false;

    public function subChannels()
    {
        return $this->belongsTo('App\Models\SubChannels2','sub_channels_id');
    }

}
