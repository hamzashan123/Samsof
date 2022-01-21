<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Speciality;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Speciality::class, function (Faker $faker) {
    return [
        'title' => Str::title($faker->words(rand(1, 2), true)),
    ];
});
