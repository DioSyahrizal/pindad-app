<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(Mu5tjLongsongFlowSeeder::class);
        $this->call(Mu5tj_KodeliniSeeder::class);
        $this->call(Mu5tjLongsongSpecsSeeder::class);
        $this->call(Mu5tjLongsongSpecActivesSeeder::class);
        $this->call(MU5TJSeeder::class);

    }
}
