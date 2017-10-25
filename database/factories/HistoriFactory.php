<?php

use Faker\Generator as Faker;

$factory->define(App\Histori::class, function (Faker $faker) {
    static $password;
    return [
        'us_id' => $faker->numberBetween(1, App\User::count()),
        'hp_deskripsi' => $faker->realText,
    ];
});

