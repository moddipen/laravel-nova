<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\EventItem;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$factory->define(EventItem::class, function (Faker $faker) {
    $day = Arr::random([10, 20, 30, 40, 50]);

    return [
        'event_id' => 1,
        'name' => $faker->name,
        'starting_at' => now()->addDays($day),
        'ending_at' => now()->addDays($day)->addHour(1),
    ];
});
