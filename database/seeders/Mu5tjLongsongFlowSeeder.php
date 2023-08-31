<?php

namespace Database\Seeders;

use App\Models\Mu5tjLongsongFlow;
use Illuminate\Database\Seeder;

class Mu5tjLongsongFlowSeeder extends Seeder
{
    public function run(): void
    {
        Mu5tjLongsongFlow::insert([
            [
                'name' => 'HB-1',
            ],
            [
                'name' => "Dimensi"
            ],
            [
                'name' => 'HB-2'
            ],
            [
                'name' => 'Visual'
            ],
            [
                'name' => 'Pengiriman'
            ],
            [
                'name' => 'Non-Conform'
            ],
            [
                'name' => 'MRB'
            ]
        ]);
    }
}
