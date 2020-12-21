<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Catalog;
use Faker\Generator as Faker;

$factory->define(Catalog::class, function (Faker $faker) {

    return [
        'cover' => $faker->word,
        'full' => $faker->word,
        'user_id' => $faker->word,
        'category_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
