<?php

use App\Models\Course;
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
        // DB::table('course')->insert([
        //     'title' => '測試課程',
        //     'start_status' => '1',
        //     'date' => '109/5/20',
        //     'display_status' => '1',
        //     'tag' => 'test'
        // ]);


        factory(Course::class, 5)->create();
    }
}
