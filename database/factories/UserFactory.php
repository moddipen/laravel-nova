<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $countries = \App\Models\Country::pluck('id')->take(5);
    $gender = \App\Models\Gender::pluck('id');
    $company = \App\Models\Company::pluck('id');

    $email = $faker->unique()->safeEmail;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $email,
        'email_verified_at' => now(),
        'password' => Hash::make($email), // password
        'remember_token' => Str::random(10),
        'uuid' => $faker->unique()->uuid,
        'date_of_birth' => $faker->date('Y-m-d'),
        'phone' => $faker->phoneNumber,
        'image_src' => 'https://lorempixel.com/100/100/',
        'gender_id' => $gender->random(),
        'country_id' => $countries->random(),
        'company_id' => $company->random(),
    ];
});
