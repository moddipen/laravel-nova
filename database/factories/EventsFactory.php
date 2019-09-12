<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Event;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $day = Arr::random([10, 20, 30, 40, 50]);

    return [
        'name'          => $faker->name,
        'description'   => $faker->text(150),
        'venue'         => $faker->streetName,
        'address'       => $faker->address,
        'city'          => $faker->city,
        'state'         => $faker->state,
        'post_code'     => $faker->postcode,
        'starting_at'   => now()->addDays($day),
        'ending_at'     => now()->addDays($day),
        'image_src'     => $faker->imageUrl(640, 480),
        'country_id'    =>  $faker->numberBetween($min = 1, $max = 50),
    ];
});
