<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
        'iso' => $faker->countryCode,
        'code' => $faker->numberBetween($min = 1, $max = 300),
        'is_active' => true,
    ];
});
