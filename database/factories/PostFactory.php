<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use App\User;
use App\Category;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'cat_id'=> function(){
            return Category::all()->random();
        },
        'user_id' => function(){
           return User::all()->random();
        },
        'comment_id' => rand(1,20),
        'title' => $faker->sentence,
        'description' => $faker->text,
        'photo' => $faker->imageUrl
    ];
});
