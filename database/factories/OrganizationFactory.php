<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Organization;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Organization::class, function (Faker $faker) {

    $name = $faker->unique()->word();

    return [
        'organization_name' => $name,
        'slug' => Str::slug($name),
    ];
});
