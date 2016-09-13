<?php
use Webpatser\Countries\Countries;
use App\User;

$factory->define(App\Federation::class, function (Faker\Generator $faker) {
    $countries = Countries::all()->pluck('id')->toArray();

    $users = User::all()->pluck('id')->toArray();

    return [
        'name' => $faker->name,
        'president_id' => $faker->randomElement($users),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'country_id' => $faker->randomElement($countries),
    ];
});