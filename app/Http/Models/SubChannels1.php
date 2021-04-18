<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubChannels1 extends Model
{
    protected $table = 'sub_channels';
    protected $connection = 'mysql_user';

    public function masterChannels()
    {
        return $this->belongsToMany('App\Models\MasterChannels','master_channels_id');
    }

    public function course()
    {
        return $this->belongsToMany('App\Models\Course');
    }

    public function courseSubChannels()
    {
        return $this->belongsToMany('App\Models\CourseSubChannels', 'course_sub_channels', 'sub_channels_id', 'course_id');
    }
}
