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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => $password ?: $password = bcrypt('s12345678'),
        'role' => $faker->randomElement($array = array(0, 1)),
        'img' => config('custom.defaultAvatar'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
       'cat_name' => $faker->randomElement($array = array('Thời trang nam', 'Thời trang nữ', 'Thời trang cho bé', 'Thời trang gia đình', 'giầy dép, túi xách')),
   ];
});

$factory->define(App\Models\SubCategory::class, function (Faker\Generator $faker){
    return [
        'cat_id' => function () {
            return App\Models\Category::pluck('id')
                ->random(2)
               ->first();
        },
        'sub_name' => $faker->text(100),
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker){
    return [
        'sub_id' => function () {
            return App\Models\SubCategory::pluck('id')
                ->random(2)
               ->first();
        },
        'name' => $faker->text(100),
        'new' => $faker->randomElement($array = array(0, 1)),
        'description' => $faker->text(100),
        'quantity' => $faker->numberBetween(5,20),
        'price' => $faker->numberBetween(100000,1000000),
        'discount' => $faker->numberBetween(1,80),
        'img' => config('custom.defaultimg'),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker){
    return [
        'pro_id' => function () {
            return App\Models\Product::pluck('id')
                ->random(3)
               ->first();
        },
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(3)
               ->first();
        },
        'content' => $faker->text(30),
    ];
});

$factory->define(App\Models\Size::class, function (Faker\Generator $faker){
    return [
        'pro_id' => function () {
            return App\Models\Product::pluck('id')
                ->random(2)
               ->first();
        },
        'size' => $faker->randomElement($array = array('M', 'L', 'XL', 'S')),
    ];
});
