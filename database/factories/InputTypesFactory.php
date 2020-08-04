<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\InputTypes;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(InputTypes::class, function (Faker $faker) {

    $name = $faker->unique()->word();

    return [
        "name" => $name,
        "slug" => Str::slug($name),
    ];
});
