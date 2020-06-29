<?php

use App\Models\SubChannels;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SubChannels::class, 5)->create();

        // factory(SubChannels::class, 1)->create()->each(function($id){
        //     $id->course()->save(factory(Course::class)->make());
        // });
    }
}
