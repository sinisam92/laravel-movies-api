<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'director' => $faker->name,
        'imageUrl' => $faker->imageUrl($width = 700, $height = 300, 'abstract', true, 'Faker', true),
        'duration' => $faker->numberBetween($min = 95, $max = 210 ),
        'releaseDate' => $faker->date,
        'genre' => $faker->word,

    ];
});
