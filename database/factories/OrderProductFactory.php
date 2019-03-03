<?php

use Faker\Generator as Faker;

$factory->define(App\OrderProduct::class, function (Faker $faker) {
    return [
        'order_id' => App\Order::all()->random()->id,
        'product_id' => App\Product::all()->random()->id,
        'quantity' => rand(1,100),
        'price' => rand(100,1000)
    ];
});
