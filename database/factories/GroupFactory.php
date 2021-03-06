<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\group;
use Faker\Generator as Faker;

$factory->define(group::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->sentence(3),
        'description' => $faker->paragraph(3),
        'featured' => secure_asset('uploads/groups/php2.png'),
        'category_id' => $faker->randomDigit,
        'user_id' => $faker->randomDigit
    ];
});
