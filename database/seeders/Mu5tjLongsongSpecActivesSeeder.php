<?php

namespace Database\Seeders;

use App\Models\Mu5tjLongsongSpecActive;
use Illuminate\Database\Seeder;

class Mu5tjLongsongSpecActivesSeeder extends Seeder
{
    public function run(): void
    {
        Mu5tjLongsongSpecActive::insert([
            [
                "spec_id" => 1,
                "lini_id" => 1,
                "flow_id" => 1,
            ]
        ]);
    }
}
