<?php

use Faker\Generator as Faker;

$factory->define(App\KategoriSejarah::class, function (Faker $faker) {
    return [
        'ks_nama' => $faker->word,
        'ks_gambar' => $faker->imageUrl($width=640, $height=480, 'city'),
        'ks_jumlah' => $faker->randomDigit,
    ];
});
