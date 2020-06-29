<?php

use App\Models\MasterChannels;
use App\Models\SubChannels;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MasterChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //建立主頻道一對多個次頻道，多個次頻道次頻道對應多個課程
        factory(MasterChannels::class, 1)->create()->each(function($id){
            $subChannels = factory(SubChannels::class,3)->make();
            $id->sub_channels()->saveMany($subChannels);

            $course = factory(Course::class,3)->create();
            $subChannels->each(function ($sub) use ($course){
                $sub->course_sub_channels()->saveMany($course);
            });
        });

        
    }
}
