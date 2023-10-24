<?php

namespace Database\Seeders;

use App\Models\Mu5tjKodelini;
use Illuminate\Database\Seeder;

class Mu5tj_KodeliniSeeder extends Seeder
{
    public function run(): void
    {
        Mu5tjKodelini::insert([
            [
                'nama' => 'MODIF',
            ],
            [
                'nama' => "EXT"
            ],
            [
                'nama' => 'LAMA'
            ],
            [
                'nama' => 'NLC'
            ],
            [
                'nama' => 'INT'
            ]
        ]);
    }
}
