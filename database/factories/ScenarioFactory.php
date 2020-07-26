<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Scenario;
use Faker\Generator as Faker;

$factory->define(Scenario::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'data' => '{}'
    ];
});
