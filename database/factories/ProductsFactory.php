<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->paragraph(3),
        'image_url' => $faker->imageUrl($width = 400, $height = 400),
        'price' => $faker->randomNumber(3),
        'offer_price' => $faker->randomNumber(1),
        'offer' => 0,
        'category_id' => rand(1, 5),
        'available' => true,
    ];
});
