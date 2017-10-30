<?php

/** @var Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Main\Company;
use Faker\Generator as Faker;


$factory->define(Company::class, function (Faker $faker) {

    $hostname = '127.0.0.1';
    $username = $faker->userName;
    $password = $faker->password;
    $database = ':memory:';

    tenant_connect($hostname, $username, $password, $database);
    tenant_migrate();

    return [
        'name' => $faker->company,
        'hostname' => $hostname,
        'username' => $username,
        'database' => $database,
        'password' => $password
    ];
});

