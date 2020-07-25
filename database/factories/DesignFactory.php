<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Design;
use Faker\Generator as Faker;

$factory->define(Design::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'data' => '{}'
    ];
});
