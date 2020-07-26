<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Organization;
use App\Models\SurveyHeader;
use Faker\Generator as Faker;

$factory->define(SurveyHeader::class, function (Faker $faker) {
    return [
        "organization_id"       => factory(Organization::class),
        "survey_name"           => $faker->unique()->sentence(),
        "instructions"          => $faker->sentence(),
        "other_header_info"     => $faker->sentence()
    ];
});
