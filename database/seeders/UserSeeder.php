<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            "username" => "admin",
            "name" => "Administrator",
            "email" => "admin@localhost",
            "password" => bcrypt("admin"),
        ]);
    }
}
