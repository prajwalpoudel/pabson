<?php

namespace Database\Factories;

/** @var Factory $factory */

use App\Entities\Role;
use App\Entities\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
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
        'role_id'           => rand(1, count(Role::all())),
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'address'           => $faker->address,
        'phone'             => $faker->phoneNumber,
        'profile'           => 'profileURL',
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => bcrypt('pass'), // password
        'remember_token'    => Str::random(10),
        'updated_at'        => Carbon::now(),
        'created_at'        => Carbon::now(),
    ];
});
