<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterChannels;
use App\Models\SubChannels;
use App\Models\CourseSubChannels;
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
        $master_channels_array = [];
        $master_channels_id = [];
        $master_data = MasterChannels::has('subChannels.course')->get();
        foreach ($master_data as $key => $value) {
            array_push($master_channels_array, ['id' => $value->id, 'name' => $value->name]);
            array_push($master_channels_id, $value->id);
        }

        $sub_channels_array = [];
        $sub_channels_id = [];
        $sub_data = subChannels::whereIn('master_channels_id', $master_channels_id)->get();
        foreach ($sub_data as $key => $value) {
            array_push($sub_channels_array, ['id' => $value->id, 'name' => $value->name]);
            array_push($sub_channels_id, $value->id);
        }

        $course_array = [];
        $course_id = [];
        $course_sub_data = CourseSubChannels::whereIn('sub_channels_id', $sub_channels_id)->get();
        foreach ($course_sub_data as $key => $value) {
            array_push($course_array, ['id' => $value->id, 'name' => $value->name]);
            array_push($course_id, $value->id);
        }


        $courseSubChannels = $this->courseSubChannelsRepo->getCourseSubChannelsAllData();

        
        foreach ($courseSubChannels as $key => $value) {
            array_push($course_id, $value->course_id);
            array_push($sub_channels_id, $value->sub_channels_id);
        }

        $course = array_unique($course_id);
        $sub_channels = array_unique($sub_channels_id);

        $course_data = $this->courseRepo->getCourseIdData($course);
        $sub_channels_data = $this->subChannelsRepo->getSubChannelsIdData($sub_channels);


        foreach($course_data as $key => $value){
            array_push($course_array, ['id' => $value->id, 'name' => $value->title]);
        }

        foreach($sub_channels_data as $key => $value){
            array_push($master_channels_id, $value->master_channels_id);
            array_push($sub_channels_array, ['id' => $value->id, 'name' => $value->name]);
        }

        $master = array_unique($master_channels_id);
        $master_channels_data = $this->masterChannelsRepo->getMasterChannelsIdData($master);

        $related = [];
        foreach($master_channels_data as $key => $value){
            $id = $value->id;
            $name = $value->name;
            // array_push($master_channels_array, ['id' => $id, 'name' => $name]);

            $subChannelsData = $this->subChannelsRepo->getMasterSubChannels($id);
            $subChannelsRelatedData = [];
            $courseRelatedData = [];
            foreach($subChannelsData as $key => $value){
                $subChannelsRelatedId = $value->id;
                array_push($subChannelsRelatedData, ['id' => $subChannelsRelatedId, 'name' => $value->name]);

                $courseData = [];
                $courseSubChannelsData = $this->courseSubChannelsRepo->getCourseSubChannels($subChannelsRelatedId);

                foreach($courseSubChannelsData as $key => $value){
                    $courseFirstData = $this->courseRepo->getCourseData($value->course_id);
                    array_push($courseData, ['id' => $value->course_id, 'name' => $courseFirstData->title]);
                }
                array_push($courseRelatedData, $courseData);
            }

            array_push($related, [
                'masterChannelsId' => ['id' => $id, 'name' => $name], 
                'subChannelsId' => $subChannelsRelatedData, 
                'courseId' => $courseRelatedData
                ]
            );
        }

        return view('channelsRelation', [
            'masterChannels' => $master_channels_array,
            'subChannels' => $sub_channels_array,
            'course' => $course_array,
            'related' => $related
        ]);
    }
}
