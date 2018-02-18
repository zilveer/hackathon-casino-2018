<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Token::class, function (Faker $faker) {
    return [
        'brand' => array_random(App\Models\Token::$brands),
    ];
});
