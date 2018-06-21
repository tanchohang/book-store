<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(3),
        'isbn'=>$faker->isbn13,
        'author'=>$faker->name,
        'price'=>$faker->randomNumber(3),
        'description'=>$faker->text,
        'imgUrl'=>$faker->imageUrl(100,200,'abstract',true)

    ];
});
