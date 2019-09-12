<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->text,
        'image_id' => 1,
        'category_id' => 1, // password
        //'is_active' => 1,
    ];
 //   'title', 'body', 'image_id' ,'category_id','is_active'
});
