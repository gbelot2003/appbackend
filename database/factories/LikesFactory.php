<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,30),
        'user_id' => $faker->numberBetween(1,10)
    ];
});
