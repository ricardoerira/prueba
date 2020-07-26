<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SurveyHeader;
use App\Models\SurveySections;
use Faker\Generator as Faker;

$factory->define(SurveySections::class, function (Faker $faker) {
    return [
        'survey_header_id'      => factory(SurveyHeader::class),
        'section_name'          => $faker->unique()->sentence(),
        'section_title'         => $faker->sentence(2),
        'section_subheading'    => $faker->sentence(2),
        'section_required_yn'   => $faker->numberBetween(0,1)
    ];
});
