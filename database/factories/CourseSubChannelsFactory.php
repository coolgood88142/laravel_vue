<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use App\Models\SubChannels;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'course_id'=>Course::all()->random()->id,
        'sub_channels_id'=>SubChannels::all()->random()->id
    ];
});
