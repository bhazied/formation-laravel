<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'mobile' => $faker->phoneNumber
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'small_description' => $faker->sentence,
        'description' => $faker->text(),
        'created_at' => Carbon::now()
    ];
});

$factory->define(App\Annonce::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'reference' => $faker->isbn13,
        'description' => $faker->text(),
        'creator_user_id' => rand(1,50),
        'created_at' => Carbon::now()
    ];
});