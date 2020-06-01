<?php

use App\Models\SubChannels;
use App\Models\Course;
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
        factory(SubChannels::class, 5)->create();
        $course = factory(Course::class,5)->create();

        SubChannels::all()->each(function ($channels) use ($course) { 
            $channels->course()->attach($course); 
        });
    }
}
