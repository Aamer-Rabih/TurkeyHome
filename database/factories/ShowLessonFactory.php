<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ShowLesson;
use Faker\Generator as Faker;

$factory->define(ShowLesson::class, function (Faker $faker) {
    
    return [
        'title' => $faker->name,
        'src'   => $faker->url,
        'order' => $faker->numberBetween(1, 100),
    ];
});
