<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Header;
use App\Models\Organization;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Header::class, function (Faker $faker) {

    $name = $faker->unique()->sentence();

    return [
        "organization_id"       => factory(Organization::class),
        "survey_name"           => $name,
        "slug"                  =>  Str::slug($name),
        "instructions"          => $faker->sentence(),
        "other_header_info"     => $faker->sentence()
    ];
});
