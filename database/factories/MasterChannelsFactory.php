<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MasterChannels;
use Faker\Generator as Faker;

$factory->define(MasterChannels::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => '1',
        'sort' => '1',
        'url' => 'xxxxx.com.tw',
        'position' => '1'
    ];
});
