<?php

namespace App\Repositories;

use App\Models\CourseSubChannels;
use Illuminate\Database\Eloquent\Collection;

class CourseSubChannelsRepository
{

    public function getCourseSubChannelsAllData()
    {
        $CourseSubChannels = CourseSubChannels::all(['course_id', 'sub_channels_id']);
        return $CourseSubChannels;
    }

    public function getCourseSubChannels($id)
    {   
        $CourseSubChannels = CourseSubChannels::where('sub_channels_id', $id)->get();
        return $CourseSubChannels;
    }

}
