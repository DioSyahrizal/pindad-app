<?php

namespace Database\Seeders;

use App\Models\Mu5tj_Spec;
use Illuminate\Database\Seeder;

class Mu5tj_SpecSeeder extends Seeder
{
    public function run(): void
    {
        Mu5tj_Spec::create([
            'id_lini' => 1,
            'kode_spec' => 'A',
            '5mm_min' => 2.0,
            '5mm_max' => 2.0,
            '40mm_min' => 2.0,
            '40mm_max' => 2.0,
        ]);
    }
}
