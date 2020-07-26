<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\InputTypes;
use Faker\Generator as Faker;

$factory->define(InputTypes::class, function (Faker $faker) {
    return [
        "input_type_name" => $faker->unique()->word(),
    ];
});
