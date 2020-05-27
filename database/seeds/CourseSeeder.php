<?php

use App\Models\Course;
use App\Models\SubChannels;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Course::class, 5)->create();
        
        factory(Course::class, 1)->create()->each(function($id){
            $id->sub_channels()->save(factory(SubChannels::class)->make());
        });
    }
}
