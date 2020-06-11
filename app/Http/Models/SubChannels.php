<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubChannels extends Model
{
    protected $table = 'sub_channels';
    protected $connection = 'mysql_user';

    public function master_channels()
    {
        return $this->belongsTo('App\Models\MasterChannels','master_id');
    }

    public function course()
    {
        return $this->belongsToMany('App\Models\Course');
    }

    public function course_sub_channels()
    {
        return $this->belongsToMany('App\Models\CourseSubChannels', 'course_sub_channels', 'course_id', 'sub_channels_id');
    }
}
