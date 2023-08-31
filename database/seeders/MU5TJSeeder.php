<?php

namespace Database\Seeders;

use App\Models\Mu5TJ;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MU5TJSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1,5) as $index) {
            Mu5TJ::create([
                'no_lot' => $faker->randomNumber(5),
                'kode_lini' => 1,
                'kode_mesin_bakar' => $faker->randomNumber(2),
                'temperature' => $faker->randomFloat(2, 0, 100),
                'user_id' => 1,
                'kode' => $faker->randomNumber(5),
                'mato' => 0,
                'status_bakar' => '-',
                'titik_11' => $faker->randomFloat(2, 0, 100),
                'titik_12' => $faker->randomFloat(2, 0, 100),
                'titik_13' => $faker->randomFloat(2, 0, 100),
                'titik_14' => $faker->randomFloat(2, 0, 100),
                'titik_15' => $faker->randomFloat(2, 0, 100),
                'titik_21' => $faker->randomFloat(2, 0, 100),
                'titik_22' => $faker->randomFloat(2, 0, 100),
                'titik_23' => $faker->randomFloat(2, 0, 100),
                'titik_24' => $faker->randomFloat(2, 0, 100),
                'titik_25' => $faker->randomFloat(2, 0, 100),
            ]);
        }
    }
}
