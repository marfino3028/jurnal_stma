<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KatalogMetadata;
use Faker\Generator as Faker;

$factory->define(KatalogMetadata::class, function (Faker $faker) {

    return [
        'category_id' => $faker->word,
        'metadata_id' => $faker->word,
        'type' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
