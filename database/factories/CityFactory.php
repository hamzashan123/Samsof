<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\City;
use App\Country;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {

    return [
        'country_id' => factory(Country::class)->create()->id,
        'title' => $faker->city,
    ];
});
