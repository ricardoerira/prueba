<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
    return [
        'section_name'          => $faker->unique()->sentence(),
        'section_title'         => $faker->sentence(2),
        'section_subheading'    => $faker->sentence(2),
        'section_required_yn'   => $faker->numberBetween(0,1)
    ];
});
