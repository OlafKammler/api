<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ModelArchitecture;
use App\ModelContext;
use App\ModelScenery;
use Faker\Generator as Faker;

$factory->define(ModelContext::class, function (Faker $faker) {
    return createModelObject($faker);
});

$factory->define(ModelArchitecture::class, function (Faker $faker) {
    return createModelObject($faker);
});

$factory->define(ModelScenery::class, function (Faker $faker) {
    return createModelObject($faker);
});

function createModelObject($faker)
{
    return [
        'url' => $faker->url,
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
};
