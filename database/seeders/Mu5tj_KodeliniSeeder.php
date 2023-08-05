<?php

namespace Database\Seeders;

use App\Models\Mu5Tj_kodelini;
use Illuminate\Database\Seeder;

class Mu5tj_KodeliniSeeder extends Seeder
{
    public function run(): void
    {
        Mu5Tj_kodelini::insert([
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
                'nama' => 'NLL'
            ],
            [
                'nama' => 'INT'
            ]
        ]);
    }
}
