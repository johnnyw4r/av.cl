<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'link'=>$faker->imageurl($width = 300, $height = 320),
    	'post_id'	=>random_int(1, 200),
    ];
});
