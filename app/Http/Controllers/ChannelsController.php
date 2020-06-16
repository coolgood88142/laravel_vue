<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\MasterChannelsRepository;
use App\Repositories\SubChannelsRepository;
use App\Repositories\CourseRepository;

class ChannelsController extends Controller
{
    protected $masterChannelsRepo;
    protected $subChannelsRepo;
    protected $courseRepo;

    public function __construct(MasterChannelsRepository $masterChannelsRepo, SubChannelsRepository $subChannelsRepo, CourseRepository $courseRepo)
    {
        $this->masterChannelsRepo = $masterChannelsRepo;
        $this->subChannelsRepo = $subChannelsRepo;
        $this->courseRepo = $courseRepo;
    }

    public function selectCourseSubChannels()
    {
        $courseSubChannels = DB::table('course_sub_channels')
            ->join('course', 'course_sub_channels.course_id', '=', 'course.id')
            ->join('sub_channels', 'course_sub_channels.sub_channels_id', '=', 'sub_channels.id')
            ->select('course_sub_channels.course_id', 'course.title', 'course_sub_channels.sub_channels_id', 'sub_channels.name')
            ->get();

        $courseSubChannelsArray = [];

        //先取關連資料，透過subChannels_id組master_id
        foreach ($courseSubChannels as $key => $value) {

            $array = [
                'course_id' => $value->course_id,
                'course_title' => $value->title,
                'sub_channels_id' => $value->sub_channels_id,
                'sub_channels_name' => $value->name,
            ];

            array_push($courseSubChannelsArray, $array);
        }
        dd($courseSubChannelsArray);

        //在組多個master組對應subchannels的資料
    }
}
