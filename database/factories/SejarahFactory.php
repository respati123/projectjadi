<?php

use Faker\Generator as Faker;

$factory->define(App\Sejarah::class, function (Faker $faker) {
    return [
        'ks_id' => $faker->numberBetween(1, App\KategoriSejarah::count()),
        'sj_nama' => $faker->city,
        'sj_alamat' => $faker->streetAddress,
        'sj_deskripsi' => $faker->text,
        'sj_lat' => $faker->latitude($min = -90, $max = 90),
        'sj_lng' => $faker->longitude($min = -180, $max = 180),
        'sj_youtube' => $faker->randomElement($array = array ('viW0M5R2BLo','JDVVn5XArJ4b','NwyFYkKjLbc')),
        'sj_gambar' => $faker->imageUrl($width=1280, $height=720, 'cats'),
    ];
});