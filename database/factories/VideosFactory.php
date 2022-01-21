<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Video;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'link' => $faker->url,
    ];
});
