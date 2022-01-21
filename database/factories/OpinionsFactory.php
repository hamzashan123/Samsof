<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Opinion;
use Faker\Generator as Faker;

$factory->define(Opinion::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => Str::title($faker->paragraphs(rand(1, 3), true)),
    ];
});
