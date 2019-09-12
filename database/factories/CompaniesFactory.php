<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'website' => $faker->domainName,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'post_code' => $faker->postcode,
        'image_src' => 'https://lorempixel.com/100/100/',
        'country_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
