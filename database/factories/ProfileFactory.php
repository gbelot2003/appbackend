<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Profile;
use App\User;
use Faker\Generator as Faker;

/*$cid = array_rand([53, 66, 97, 170]);
$city = \App\City::where('country_id', $cid)->select('id')->get()->toArray();*/

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id'           => factory(User::class)->create()->id,
        'avatar'            => $faker->imageUrl,
        'alias'             => $faker->name,
        'country_id'        => array_rand([53, 66, 97, 170]),
        'city_id'           => array_rand([54333, 54281, 53908]),
        'about'             => $faker->text(200),
        'field_facebook'    => $faker->url,
        'field_instagram'   => $faker->url,
        'field_twitter'     => $faker->url,
        'field_linkedin'    => $faker->url,
    ];
});
