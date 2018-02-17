<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Coin::class, function (Faker $faker) {
    return [
        'amount' => $faker->randomFloat(6, 0, 50),
    ];
});
