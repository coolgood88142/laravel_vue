<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MasterChannelsRepository;
use App\Repositories\SubChannelsRepository;
use App\Repositories\CourseRepository;

class ChannelsController extends Controller
{
    protected $masterChannelsRepo;
    protected $subChannelsRepo;
    protected $courseRepo;

    public function __construct(MasterChannelsRepository $masterChannelsRepo, SubChannelsRepository $categorysRepo, CourseRepository $courseRepo)
    {
        $this->masterChannelsRepo = $masterChannelsRepo;
        $this->subChannelsRepo = $subChannelsRepo;
        $this->courseRepo = $courseRepo;
    }

    public function selectChannels()
    {
        $masterChannels = $this->masterChannelsRepo->getMasterChannelsAllData();

        return view('channels', ['masterChannels' => $masterChannels]);
    }

    public function selectCourse()
    {
        $course = $this->courseRepo->getCourseAllData()->sub_channels()->orderBy('name')->get();
    }

    public function selectCourseSubChannels()
    {
        $courseSubChannels = DB::table('course_sub_channels');
        $master_array = [];
        //先取關連資料，透過subChannels_id組master_id
        foreach ($courseSubChannels as $key => $value) {
            $subChannels = $value->sub_channels_id;
            $masterChannelsData = $this->masterChannelsRepo->getMasterData($subChannels->master_channels_id);
            array_push($master_array, $masterChannelsData->name);
        }

        //在組多個master組對應subchannels的資料
    }
}
