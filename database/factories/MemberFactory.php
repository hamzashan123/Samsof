<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\City;
use App\Model;
use App\Member;
use App\Hospital;
use App\Speciality;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'active' => true,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'birth' => $faker->dateTimeBetween('-50 years', '-30 years'),
        'qualifications' => [
            Str::title($faker->words(2, true)),
            Str::title($faker->words(2, true))
        ],
        'practise_address' => $faker->streetAddress,
        'city_id' => City::inRandomOrder()->first()->id,
        'hospital_id' => Hospital::inRandomOrder()->first()->id,
        'email' => rand(0,1) ? $email = $faker->unique()->safeEmail : null,
        'alt_email' => rand(0,1) && isset($email) ? $faker->unique()->safeEmail : null,
        'mobile' => $faker->phoneNumber,
        'telephone' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'published' => true,
        'interests' => [
            'professional' => ['slicing', 'dicing'],
            'hobbies' => ['surfing', 'boxing'],
        ],
        'nominated_by' => $faker->name,
        'seconded_by' => $faker->name,
        'password' => isset($email) ? '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' : null, // password
        'last_login_at' => rand(1,0) ? $faker->dateTimeBetween('-10 days') : null,
    ];
});
