<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Document;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    ];
});
