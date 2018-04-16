<?php

use Faker\Generator as Faker;

$factory->define(App\Evaluation::class, function (Faker $faker) {
    return [
    	'average'=>random_int(0, 10),
    	'comment'=>$faker->text(30),
    	'user_id'	=>random_int(1, 30),
    	'user_id2'	=>random_int(1, 30),
    	'post_id'	=>random_int(1, 200),  
    ];
});
