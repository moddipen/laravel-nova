<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\BusinessCategoryUser;

$factory->define(BusinessCategoryUser::class, function (Faker $faker) {
    return [
        'business_category_id'  => 1,
        'user_id'  => 1,
    ];
});
