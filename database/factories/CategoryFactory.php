<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $categories = ['Computer', 'Food', 'Clothes'];

    return [
        'name' => array_random($categories),
        'description' => $faker->paragraph
    ];
});
