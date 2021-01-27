<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'phone_number' => $faker->unique()->phoneNumber,
        'civil_id' => $faker->randomNumber(5),
        'stop_number' => $faker->randomNumber(2),
        'nationality' => $faker->country,
        'gender' => $faker->randomElement($array = array ('male','female')),
        'social_status' => $faker->randomElement($array = array ('single','married')),
        'appetite' => $faker->randomElement($array = array ('good','very_good')),
        'age' => $faker->numberBetween($min = 18, $max = 60),
        'diets_before' => $faker->realText($maxNbChars = 100),
        'height' => $faker->numberBetween($min = 100, $max = 180),
        'current_weight' => $faker->numberBetween($min = 50, $max = 180),
        'physical_activity' => $faker->realText($maxNbChars = 100),
        'medications' => $faker->realText($maxNbChars = 100),
        'water_intake' => $faker->realText($maxNbChars = 100),
        'sleep' => $faker->realText($maxNbChars = 100),


        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});
