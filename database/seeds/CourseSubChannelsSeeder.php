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
        // $channels = factory(SubChannels::class, 5)->create();
        // $course = factory(Course::class, 5)->create();

        // Course::all()->each(function ($course) use ($channels) { 
        //     $course->sub_channels()->attach($channels);
        // });
        

        $course = factory(Course::class,3)->create();

        factory(SubChannels::class,3)->create()->each(function ($sub) use ($course){
            $sub->course_sub_channels()->saveMany($course);
        });
    }
}
