<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubChannels;
use Faker\Generator as Faker;

$factory->define(SubChannels::class, function (Faker $faker) {
    return [
        'master_channels_id' => '1',
        'name' => $faker->name,
        'status' => '1',
        'sort' => '1',
        'url' => 'xxxxx.com.tw',
        'position' => '1'
    ];
});
