<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'author_id'=>rand(1,10),
        'name'=>$faker->company(),
        'pages'=>$faker->numberBetween(300,800),
        'short'=>$faker->text(1000),
        'created_by'=>rand(1,5)
    ];
});
