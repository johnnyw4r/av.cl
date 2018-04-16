<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'comment'	=>$faker->text(30),
        'user_id'	=>random_int(1, 30),
        'post_id'	=>random_int(1, 200),
    ];
});
