<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Media;

$factory->define(Media::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'headline' => $faker->sentence,
        'content' => Str::title($faker->paragraphs(rand(1, 3), true)),
        'published_at' => $faker->dateTimeBetween($startDate = '-2 days', $endDate = '+3 weeks'),
        'video_link' => $faker->url,
        'media_type' => $faker->randomElement(['vimeo', 'photo', 'document', 'youtube']),
    ];
});
