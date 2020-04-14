<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => function () {
            return Post::inRandomOrder()->first()->id;
        },
        'name' => $faker->name(),
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->optional()->url,
        'comment' => $faker->realText()
    ];
});
