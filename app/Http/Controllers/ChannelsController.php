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
        //要先建立關聯key，才可以將3張表使用join
        $course = $this->courseRepo->getCourseAllData()->sub_channels()->orderBy('name')->get();
    }

}
