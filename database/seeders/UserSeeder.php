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
            "name" => "Cahya",
            "npp" =>  801301,
            "jabatan" => "Management Trainee",
            "username" => "MUTU01",
            "password" => bcrypt("admin"),
        ]);
    }
}
