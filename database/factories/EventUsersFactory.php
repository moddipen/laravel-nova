<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\EventUser;
use Faker\Generator as Faker;

$factory->define(EventUser::class, function (Faker $faker) {
    return [
        'event_id' => 1,
        'user_id' => 1,
    ];
});
