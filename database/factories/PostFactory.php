<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    
    $title = $faker->sentence(1);
    $p = rand(0, 999999999);
    $po= $p + rand(-999999, 999999);
    $pbest = max($p,$po);
    $data = ['Argentina','Bolivia','Brasil','Chile','Colombia','Costa Rica','Cuba','Ecuador','España','El Salvador',
        'Guatemala','Honduras','México','Nicaragua','Panamá','Perú','República Dominicana','Uruguay','Venezuela'
    ];


    return [
        'title'		       =>$title,
        'body' 		       =>$faker->text(45),
        'slug' 		       =>str_slug($title),
        'negotiable'       => 1,
        'price'		       => $p,
        'oldPrice'	       => $po,
        'bestPrice'	       => $pbest,
        'dateStart'	       => $faker->dateTime('now'),
        'dateEnd'	       => $faker->dateTimeBetween('+0 days', '+30 days'),
        'country'          => $data[rand(0,18)],
        'region'           => $faker->state,
        'deleted'	       => 0,
        'state'		       => 'DRAFT',
        'category_id'   => random_int(1, 9),
        'subcategory_id'   => random_int(1, 9),
        'user_id'          => random_int(1, 30),
        
    ];
});

       