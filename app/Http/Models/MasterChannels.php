<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterChannels extends Model
{
    protected $table = 'master_channels';
    protected $connection = 'mysql_user';

    public function subChannels()
    {
        return $this->hasMany('App\Models\SubChannels','master_channels_id');
    }
}
