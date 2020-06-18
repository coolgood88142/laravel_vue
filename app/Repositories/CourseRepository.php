<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository
{
    public function save($id, $title, $tag)
    {
        $course = new Course();
        $course->title = $title;
        $course->start_status = '1';
        $today = Carbon::now()->toDateString();
        $course->date = $today;
        $course->display_status = '1';
        $course->tag = $tag;
        $course->save();
    }

    public function getCourseAllData()
    {
        $course = Course::all();
        return $course;
    }

    public function getCourseData($id)
    {
        $course = Course::where('id', $id)->first();
        return $course;
    }

    public function getCourseMultipleData($id)
    {
        $course = Course::whereIn('id', $id)->get();
        return $course;
    }
}
