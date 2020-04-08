<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserInfo;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(UserInfo::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'birthday' => '1900-01-01',
        'counties' => '臺北縣',
        'districts' => '臺北市',
        'road' => 'xx路xx巷xx號',
        'gender' => 'R',
        'email' => $faker->unique()->safeEmail,
        'interest' => '0,1',
    ];
});
