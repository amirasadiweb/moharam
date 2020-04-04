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
//
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Card::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
    ];
});
$factory->define(App\Note::class, function (Faker\Generator $faker) {
    return [
        'user_id'=>factory(\App\User::class)->create()->id,
        'card_id'=>factory(\App\Card::class)->create()->id,
        'body' => $faker->name,
    ];
});

$factory->define(App\Document::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->paragraph,
    ];
});

//$factory->define(App\Card::class, function (Faker\Generator $faker) {
//    return [
//        'note_id'=>factory(\App\Note::class)->create()->id,
//        'name' => $faker->title,
//    ];
//});
