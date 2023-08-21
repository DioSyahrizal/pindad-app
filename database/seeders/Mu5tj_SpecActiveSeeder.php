<?php

namespace Database\Seeders;

use App\Models\Mu5tj_Spec_Active;
use Illuminate\Database\Seeder;

class Mu5tj_SpecActiveSeeder extends Seeder
{
    public function run(): void
    {
        Mu5tj_Spec_Active::create([
            'id_spec' => 1
        ]);
    }
}
