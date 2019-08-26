<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Document;
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

$factory->define(Document::class, function (Faker $faker) {
    $a = $faker->randomElement(['Oujda', 'Berkane', 'Nador', 'Driouch', 'Guercif', 'Taourirt', 'Jerada', 'Figuig']);
    return [
        'num_ordre' => $a.'_2019_'.$faker->unique()->randomNumber(3),
        'date' => $faker->dateTimeBetween('-10 years'),
        'chef_responsable' => $faker->firstName(),
        'agence' => $a,
        'ville' => $a,
        'objet' => Str::random(20),
        'type' => 'facture',
    ];
});
