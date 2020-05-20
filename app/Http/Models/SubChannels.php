<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubChannels extends Model
{
    protected $table = 'sub_channels';
    protected $connection = 'mysql_user';
    public $timestamps = false;

    public function master_channels()
    {
        return $this->belongsTo('App\Models\MasterChannels','master_id');
    }

    public function course()
    {
        return $this->belongsToMany('App\Models\Course','id');
    }
}
