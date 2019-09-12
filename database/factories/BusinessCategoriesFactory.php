<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\BusinessCategory;

$factory->define(BusinessCategory::class, function (Faker $faker) {
    return [
        'name'  => $faker->name,
    ];
});
