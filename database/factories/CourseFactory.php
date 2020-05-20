<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'start_status' => '1',
        'date' => '1900-01-01',
        'display_status' => '1',
        'tag' => '測試',
    ];
});
