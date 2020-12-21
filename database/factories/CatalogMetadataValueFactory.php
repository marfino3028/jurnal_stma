<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CatalogMetadataValue;
use Faker\Generator as Faker;

$factory->define(CatalogMetadataValue::class, function (Faker $faker) {

    return [
        'catalog_id' => $faker->word,
        'metadata_id' => $faker->word,
        'value' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
