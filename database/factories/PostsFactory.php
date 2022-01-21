<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Post;
use App\Category;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 3),
        'title' => $faker->sentence,
        'headline' => $faker->sentence,
        'content' => Str::title($faker->paragraphs(rand(1, 3), true)),
        'published_at' => $faker->dateTimeBetween($startDate = '-2 days', $endDate = '+3 weeks'),
        'media' => $faker->url,
        'media_type' => $faker->randomElement(['youtube', 'vimeo', 'podcast']),
    ];
});
