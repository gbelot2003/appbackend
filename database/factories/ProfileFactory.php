<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id'       => factory(User::class)->create()->id,
        'avatar'        => $faker->imageUrl,
        'country_id'    => array_rand([53, 66, 97, 170]),
    ];
});
