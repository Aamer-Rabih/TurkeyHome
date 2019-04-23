<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' =>  $faker->text($maxNbChars = 50), 
        'active' => $faker->randomElement([true, false])
    ];
});
