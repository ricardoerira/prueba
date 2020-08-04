<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Choice;
use Faker\Generator as Faker;

$factory->define(Choice::class, function (Faker $faker) {
    return [
        "name" => $faker->word()
    ];
});
