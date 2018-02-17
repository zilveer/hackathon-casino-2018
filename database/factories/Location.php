<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Location::class, function (Faker $faker) {
    return [
        'place_id' => str_random(27),
    ];
});
