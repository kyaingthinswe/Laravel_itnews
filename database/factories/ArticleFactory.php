<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(50),
        'description'=>$faker->text(1000),
        'user_id'=> \App\User::all()->random()->id,
        'cat_slug'=>\App\Category::all()->random()->cat_slug,
    ];
});
