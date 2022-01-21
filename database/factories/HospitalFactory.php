<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Hospital;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Hospital::class, function (Faker $faker) {
    return [
        'title' => Str::title($faker->words(2, true)) . ' Hospital',
    ];
});
