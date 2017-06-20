<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Recipe::class, function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTimeThisMonth(),
        'updated_at' => $faker->dateTimeThisMonth(),
        'box_type' => $faker->randomElement($array = ['gourmet', 'vegetarian']),
        'title' => $faker->title(),
        'slug' => $faker->slug(),
        'short_title' => $faker->text(),
        'marketing_description' => $faker->text(),
        'calories_kcal' => $faker->numberBetween(0, 3000),
        'protein_grams' => $faker->numberBetween(0, 1000),
        'fat_grams' => $faker->numberBetween(0, 200),
        'carbs_grams' => $faker->numberBetween(0, 3000),
        'bulletpoint1' => $faker->text(),
        'bulletpoint2' => $faker->text(),
        'bulletpoint3' => $faker->text(),
        'recipe_diet_type_id' => $faker->randomElement($array = ['fish', 'meat', 'vegetarian']),
        'season' => $faker->randomElement($array = ['spring', 'summer', 'fall', 'winter']),
        'base' => $faker->randomElement($array = ['rice', 'beans', 'veg']),
        'protein_source' => $faker->randomElement($array = ['nuts', 'meat', 'beans', 'tofu']),
        'preparation_type_mins' => $faker->numberBetween(0, 360),
        'shelf_life_days' => $faker->numberBetween(0, 14),
        'equipment_needed' => $faker->text(),
        'origin_country' => $faker->country(),
        'recipe_cuisine' => $faker->randomElement($array = ['persian', 'chinese', 'french', 'italian']),
        'in_your_box' => $faker->text(),
        'gousto_reference' => $faker->numberBetween(0, 1000000)
    ];
});
