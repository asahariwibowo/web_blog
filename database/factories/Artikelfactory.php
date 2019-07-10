<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use app\Categori;

$factory->define(App\Artikel::class, function (Faker $faker) {
    $word = $faker->word; /**menggenerate word didalam variable word  */
    return [
        'judul' => Str::slug($faker->unique()->name, '_'),
        'body' => $word,
        'gambar' => $faker->unique()->name,
        'categoris_id' => function () {
            return Categori::all()->random();
        }
    ];
});
