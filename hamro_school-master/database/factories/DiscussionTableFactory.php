<?php

namespace Database\Factories;

/** @var Factory $factory */

use App\Entities\Discussion;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Discussion::class, function (Faker $faker) {
    return [
        'user_id' => '1',
        'title' => $faker->text(100),
        'description' => $faker->text(400),
        'visibility_status' => '1',
        'comment_status' => '1',
        'is_verified' => '1',
        'approved_by_id' => '1',
        'updated_at' => Carbon::now(),
        'created_at' => Carbon::now(),
    ];
});
