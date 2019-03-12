<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'total_price' => rand(500,1000),
        'description' => $faker->paragraph,
        'status' => 1
    ];
});
