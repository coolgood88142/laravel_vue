<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\MasterChannelsRepository;
use App\Repositories\SubChannelsRepository;
use App\Repositories\CourseRepository;
use App\Repositories\CourseSubChannelsRepository;

class ChannelsController extends Controller
{
    protected $masterChannelsRepo;
    protected $subChannelsRepo;
    protected $courseRepo;

    public function __construct(MasterChannelsRepository $masterChannelsRepo, SubChannelsRepository $subChannelsRepo, CourseRepository $courseRepo, CourseSubChannelsRepository $courseSubChannelsRepo)
    {
        $this->masterChannelsRepo = $masterChannelsRepo;
        $this->subChannelsRepo = $subChannelsRepo;
        $this->courseRepo = $courseRepo;
        $this->courseSubChannelsRepo = $courseSubChannelsRepo;
    }

    public function selectCourseSubChannels()
    {
        $courseSubChannels = $this->courseSubChannelsRepo->getCourseSubChannelsAllData();

        $data_array = [];
        $course_array = [];
        $sub_channels_array = [];
        foreach ($courseSubChannels as $key => $value) {
            $courseId = $value->course_id;
            $course = $this->courseRepo->getCourseData($courseId);
            $course_title = $course->title;

            $subChannelsId = $value->sub_channels_id;
            $subChannels = $this->subChannelsRepo->getMasterSubChannelsData($subChannelsId);
            $subChannels_name = $subChannels->name;

            // $array = ['masterChannels' => $masterChannels_name, 'subChannels' => $subChannels_name, 'course' => $course_title];

            // array_push($data_array, $array);
            array_push($course_array, $courseId);
            array_push($sub_channels_array, $subChannelsId);
        }

        foreach ($sub_channels_array as $key => $value) {
            dd($value);
            // $masterChannelsId = $subChannels->master_channels_id;
            // $masterChannels = $this->masterChannelsRepo->getMasterData($masterChannelsId);
            // $masterChannels_name = $masterChannels->name;
        }

        // return view('channelsRelation', ['channels' => $data_array]);
    }
}
