<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Coverage;
use Faker\Generator as Faker;

$factory->define(Coverage::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'likes' => $faker->numberBetween(0, 20),
        'link_type' => $faker->randomElement(['vimeo', 'podcast', 'youtube', 'link']),
        'link' => $faker->url,
    ];
});
