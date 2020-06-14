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
        $courseSubChannels = DB::table('course_sub_channels')->paginate(20);
        $master_array = [];
        //先取關連資料，透過subChannels_id組master_id
        foreach ($courseSubChannels as $key => $value) {
            $subChannelsId = $value->sub_channels_id;
            $masterChannels = $this->masterChannelsRepo->getMasterData($subChannelsId);
            array_push($master_array, $masterChannels->name);
        }

        dd($master_array);

        //在組多個master組對應subchannels的資料
    }
}
