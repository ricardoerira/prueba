<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use App\Models\InputTypes;
use App\Models\Section;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'input_type_id'                     => factory(InputTypes::class),
        'name'                              => $faker->sentence(),
        'subtext'                           => $faker->sentence(),
        'required_yn'              => $faker->numberBetween(0,1),
        'answer_required_yn'                => $faker->numberBetween(0,1),
        'allow_mutiple_option_answers_yn'   => $faker->numberBetween(0,1),
    ];
});
