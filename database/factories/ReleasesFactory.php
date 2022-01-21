<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Release;

$factory->define(Release::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => Str::title($faker->paragraphs(rand(1, 3), true)),
        'video_link' => $faker->url,
        'published_at' => $faker->dateTimeBetween($startDate = '-2 days', $endDate = '+3 weeks'),
    ];
});
