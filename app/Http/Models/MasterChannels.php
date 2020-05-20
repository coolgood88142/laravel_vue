<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterChannels extends Model
{
    protected $table = 'master_channels';
    protected $connection = 'mysql_user';
    public $timestamps = false;

    public function sub_channels()
    {
        return $this->hasOne('App\Models\SubChannels','master_id');
    }
}