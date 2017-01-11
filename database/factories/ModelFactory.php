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

$factory->define(\codeFin\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'denomination' => $faker->name,
        'address' => $faker->address,
        'postal_code' => $faker->postcode,
        'nif' => $faker->unique()->ean8,
        'responsible_name' =>$faker->name,
        'observations' => $faker->text(200),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


// role admin
$factory->state(\codeFin\Models\User::class, 'admin', function (Faker\Generator $faker) {
    return [
        'role' => \codeFin\Models\User::ROLE_ADMIN
    ];
});

// role cliente
$factory->state(\codeFin\Models\User::class, 'user', function (Faker\Generator $faker) {
    return [
        'role' => \codeFin\Models\User::ROLE_USER
    ];
});


$factory->define(\codeFin\Models\BankAccount::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->city,
        'agency' => rand(10000, 60000).'-'.rand(0,9),
        'account' => rand(70000, 260000).'-'.rand(0,9),
    ];
});

$factory->define(\codeFin\Models\Event::class, function (Faker\Generator $faker) {

    $dataInicio = $faker->dateTimeBetween('-1 years', '+1 year');
    $numDias = rand(1,8);
     if($dataInicio <= date()){
         $scheduling = true;
     }else{
         $scheduling = false;
     }

    return [
        'denomination' => $faker->name,
        'start_date_time' => $dataInicio,
        'end_date_time' => $faker->dateTimeBetween($dataInicio, "+$numDias days"),
        'work_plan' => $faker->text(255),
        'rider_tecnique' => $faker->text(255),
        'program' => $faker->text(255),
        'notes' => $faker->text(255),
        'scheduling' => $scheduling,
        'provisional_price' => $faker->randomFloat(1, 10000),
        'final_price' => $faker->randomFloat(1, 10000),
        'participants_number' => $faker->numberBetween(1, 1000),
        'days_number' => $numDias,
        'programme_doc' => $faker->file('/tmp'),
        'procedding_doc' => $faker->file('/tmp'),
    ];
});

$factory->define(\codeFin\Models\Client::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
    ];
});