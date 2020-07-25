<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Checkpoint;
use Faker\Generator as Faker;

$factory->define(Checkpoint::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'data' => '{}'
    ];
});
