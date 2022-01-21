<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Event;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraphs(3, 3),
        'starts_at' => $faker->dateTimeBetween($startDate = '+10 days', $endDate = '+15 days'),
        'ends_at' => $faker->dateTimeBetween($startDate = '+16 days', $endDate = '+20 days'),
        'link' => $faker->url,
        'rsvp' => $faker->email,
        'color' => $faker->hexColor,
    ];
});
