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

        $master_channels_id = [];
        $sub_channels_id = [];
        $course_id = [];
        foreach ($courseSubChannels as $key => $value) {
            array_push($course_id, $value->course_id);
            array_push($sub_channels_id, $value->sub_channels_id);
        }

        $course = array_unique($course_id);
        $sub_channels = array_unique($sub_channels_id);

        $course_data = $this->courseRepo->getCourseIdData($course);
        $sub_channels_data = $this->subChannelsRepo->getSubChannelsIdData($sub_channels);

        $master_channels_array = [];
        $sub_channels_array = [];
        $course_array = [];
        foreach($course_data as $key => $value){
            array_push($course_array, ['id' => $value->id, 'title' => $value->title]);
        }

        foreach($sub_channels_data as $key => $value){
            array_push($master_channels_id, $value->master_channels_id);
            array_push($sub_channels_array, ['id' => $value->id, 'name' => $value->name]);
        }

        $master = array_unique($master_channels_id);
        $master_channels_data = $this->masterChannelsRepo->getMasterChannelsIdData($master);

        foreach($master_channels_data as $key => $value){
            array_push($master_channels_array, ['id' => $value->id, 'name' => $value->name]);
        }

        return view('channelsRelation', [
            'masterChannels' => $master_channels_array,
            'subChannels' => $sub_channels_array,
            'course' => $course_array
        ]);
    }
}
