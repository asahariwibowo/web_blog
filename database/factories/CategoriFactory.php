<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Categori;
use Faker\Generator as Faker;

$factory->define(Categori::class, function (Faker $faker) {
    return [
        'name_katagori'=>$faker->unique()->name,
        'slug'=>Str::slug($faker->unique()->name, '_'),

    ];
});
