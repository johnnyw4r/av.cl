<?php

use Faker\Generator as Faker;

$factory->define(App\Negotiation::class, function (Faker $faker) {
    $p = rand(0, 999999999);

    return [
        'price'=>$p,
        'comment'=>$faker->text(30),
        'user_id'	=>random_int(1, 30),
    	'post_id'	=>random_int(1, 200),
    ];
});
