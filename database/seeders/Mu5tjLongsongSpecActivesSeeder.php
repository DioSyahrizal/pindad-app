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
            ],
            [
                "spec_id" => 2,
                "lini_id" => 2,
                "flow_id" => 1,
            ],
            [
                "spec_id" => 3,
                "lini_id" => 3,
                "flow_id" => 1,
            ],
            [
                "spec_id" => 4,
                "lini_id" => 4,
                "flow_id" => 1,
            ],
            [
                "spec_id" => 5,
                "lini_id" => 5,
                "flow_id" => 1,
            ],
            [
                'spec_id' => 6,
                'lini_id' => 1,
                'flow_id' => 2,
            ],
            [
                'spec_id' => 7,
                'lini_id' => 2,
                'flow_id' => 2,
            ],
            [
                'spec_id' => 8,
                'lini_id' => 3,
                'flow_id' => 2,
            ],
            [
                'spec_id' => 9,
                'lini_id' => 4,
                'flow_id' => 2,
            ],
            [
                'spec_id' => 10,
                'lini_id' => 5,
                'flow_id' => 2,
            ],
            [
                'spec_id' => 11,
                'lini_id' => 1,
                'flow_id' => 3,
            ],
            [
                'spec_id' => 12,
                'lini_id' => 2,
                'flow_id' => 3,
            ],
            [
                'spec_id' => 13,
                'lini_id' => 3,
                'flow_id' => 3,
            ],
            [
                'spec_id' => 14,
                'lini_id' => 4,
                'flow_id' => 3,
            ],
            [
                'spec_id' => 15,
                'lini_id' => 5,
                'flow_id' => 3,
            ]
        ]);
    }
}
