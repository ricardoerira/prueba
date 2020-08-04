<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
    return [
        'name'          => $faker->unique()->sentence(),
        'title'         => $faker->sentence(2),
        'subheading'    => $faker->sentence(2),
        'required_yn'   => $faker->numberBetween(0,1)
    ];
});
