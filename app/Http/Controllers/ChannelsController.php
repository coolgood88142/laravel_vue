<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterChannels;
use App\Models\SubChannels;
use App\Models\Course;
use App\Models\CourseSubChannels;
use App\Repositories\MasterChannelsRepository;
use App\Repositories\SubChannelsRepository;
use App\Repositories\CourseRepository;
use App\Repositories\CourseSubChannelsRepository;
use App\Services\ElasticService;
use Elasticsearch\ClientBuilder;
use Config;

class ChannelsController extends Controller
{
    protected $masterChannelsRepo;
    protected $subChannelsRepo;
    protected $courseRepo;
    protected $elasticService;

    public function __construct(MasterChannelsRepository $masterChannelsRepo, SubChannelsRepository $subChannelsRepo, CourseRepository $courseRepo, CourseSubChannelsRepository $courseSubChannelsRepo, ElasticService $elasticService)
    {
        $this->masterChannelsRepo = $masterChannelsRepo;
        $this->subChannelsRepo = $subChannelsRepo;
        $this->courseRepo = $courseRepo;
        $this->courseSubChannelsRepo = $courseSubChannelsRepo;
        $this->elasticService = $elasticService;
    }

    public function selectCourseSubChannels()
    {
        $related = [];
        $total_channels_array = [];
        $master_channels_array = [];
        $master_channels_id = [];
        $master_data = MasterChannels::has('subChannels.course')->get();
        foreach ($master_data as $key => $value) {
            $master = MasterChannels::where('id', $value->id)->first();
            array_push($master_channels_array, ['id' => $master->id, 'name' => $master->name]);
            array_push($master_channels_id, $value->id);
            array_push($total_channels_array, $master->name);

            $sub = [];
            $course = [];
            $course_id = [];
            $sub_channels =  subChannels::where('master_channels_id', $value->id)->get();
            foreach ($sub_channels as $key => $value) {
                array_push($sub, ['id' => $value->id, 'name' => $value->name]);
                array_push($total_channels_array, $value->name);

                $courseSub = [];
                $course_sub_channels = CourseSubChannels::where('sub_channels_id', $value->id)->get();
                foreach ($course_sub_channels as $key => $value) {
                    $coursedata = Course::where('id', $value->course_id)->first();
                    array_push($courseSub, ['id' => $coursedata->id, 'name' => $coursedata->title]);
                    array_push($total_channels_array, $coursedata->title);
                }
                array_push($course, $courseSub);
            }

            array_push($related, [
                'masterChannelsId' => ['id' => $master->id, 'name' => $master->name], 
                'subChannelsId' => $sub, 
                'courseId' => $course
                ]
            );
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
            array_push($course_id, $value->course_id);
        }

        $course_data = Course::whereIn('id', $course_id)->get();
        foreach ($course_data as $key => $value) {
            array_push($course_array, ['id' => $value->id, 'name' => $value->title]);
        }

        $totalChannels = [];
        $total_channels_array = array_unique($total_channels_array);

        foreach ($total_channels_array as $key => $value) {
            array_push($totalChannels, $value);
        }

        $host = '127.0.0.1';
        $message = 'test message';
        $category = 'record';
        $sort = 1;
        $this->elasticService->addElastic($host, $message, $category, $sort);

        return view('channelsRelation', [
            'masterChannels' => $master_channels_array,
            'subChannels' => $sub_channels_array,
            'course' => $course_array,
            'related' => $related,
            'totalChannels' => $totalChannels
        ]);
    }

    public function getKeyWordChannelsData(Request $request)
    {
        $search = $request->search;
        $search_array = [];
        if($search != ''){
            $courseSubChannels = CourseSubChannels::select('course_id')->distinct()->get();
            foreach ($courseSubChannels as $key => $value) {
                $coursedata = Course::where([
                    ['id', '=', $value->course_id],
                    ['title', 'like', '%'. $search .'%']
                ])->first();

                if($coursedata != null){
                    array_push($search_array, $coursedata->title);
                }
            }
        }

        if(count($search_array) > 0){
            $search_array = array_unique($search_array);
        }

        return response()->json(['searchData' => $search_array]);
    }
}
