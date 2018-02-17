<?php

use Faker\Generator as Faker;

$currencies = [
    'Casino Coin'       => "cc",
    'Monoprix Coin'     => "mc",
    'Franprix Coin'     => "fc",
    'Leader price Coin' => "lpc",
    'Naturalia Coin'    => "nc",
];

$factory->define(App\Models\Currency::class, function (Faker $faker) use ($currencies) {
    return [
        'name' => $name = array_rand($currencies),
        'code' => $currencies[$name],
    ];
});
