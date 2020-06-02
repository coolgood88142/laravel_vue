<?php

use App\Models\Course;
use App\Models\SubChannels;
use App\Models\CourseSubChannels;
use Illuminate\Database\Seeder;

class CourseSubChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = factory(SubChannels::class, 5)->create();
        $course = factory(Course::class, 5)->create();

        Course::all()->each(function ($course) use ($channels) { 
            $course->sub_channels()->attach($channels);
        });
        

        // factory(MasterChannels::class, 5)->create()->each(function($id){
        //     $id->sub_channels()->save(factory(SubChannels::class)->make());
        // })

        // SubChannels::all()->each(function ($channels) use ($course) { 
        //     $channels->course()->attach($course); 
        // });
    }
}
