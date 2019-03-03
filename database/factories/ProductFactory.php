<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $products = ['Laptop', 'Desktop', 'Mouse', 'Keyboard'];

    return [
        'category_id' => rand(1,20),
        'product_name' => array_random($products),
        'price' => rand(100,500),
        'image' => $faker->imageUrl($width = 200, $height = 200),
        'quantity' => rand(1,100),
        'avg_rating' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10)
    ];
});
