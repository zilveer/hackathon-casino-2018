<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Contract::class, function (Faker $faker) {
    return [
        'change_rage' => $faker->randomFloat(2, 0, 2),
    ];
});
