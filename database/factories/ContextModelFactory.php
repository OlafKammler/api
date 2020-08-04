<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContextModel;
use Faker\Generator as Faker;

$factory->define(ContextModel::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});
