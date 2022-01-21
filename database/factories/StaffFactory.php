<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Staff;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'position' => $faker->word,
        'qualifications' => [$faker->word, $faker->word],
        'description' => Str::title($faker->paragraphs(rand(1, 3), true)),
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'social' => $faker->url,
    ];
});
