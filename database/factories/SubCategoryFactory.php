<?php

use Faker\Generator as Faker;

$factory->define(App\SubCategory::class, function (Faker $faker) {
    return [
        'name'			=> $faker->unique->sentence(2),
        'category_id'   => random_int(1, 9),
    ];


});
