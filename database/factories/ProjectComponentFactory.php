<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Playlist;
use App\Scenario;
use App\Checkpoint;
use App\Form;
use App\FormActivity;
use Faker\Generator as Faker;

$factory->define(Playlist::class, function (Faker $faker) {
    return array_merge(createBasicFields($faker));
});
$factory->define(Scenario::class, function (Faker $faker) {
    return array_merge(createBasicFields($faker));
});
$factory->define(Checkpoint::class, function (Faker $faker) {
    return array_merge(createBasicFields($faker));
});
$factory->define(Form::class, function (Faker $faker) {
    return array_merge(createBasicFields($faker), ['type' => $faker->randomElement(['activity', 'question'])]);
});

function createBasicFields($faker)
{
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
}
