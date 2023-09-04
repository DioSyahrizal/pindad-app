<?php

namespace Database\Seeders;

use App\Models\Mu5tjLongsongSpec;
use Illuminate\Database\Seeder;

class Mu5tjLongsongSpecsSeeder extends Seeder
{
    public function run(): void
    {
        Mu5tjLongsongSpec::insert([
            [
                'code' => 'A',
                'lini_id' => 1,
                'flow_id' => 1,
                'attribute' => json_encode(
                    [
                        '5mm_min' => 4.5,
                        '5mm_max' => 7.5,
                        '40mm_min' => 39.5,
                        '40mm_max' => 40.5,
                    ]
                )
            ],
            [
                'code' => 'B',
                'lini_id' => 2,
                'flow_id' => 1,
                'attribute' => json_encode(
                    [
                        '5mm_min' => 4.5,
                        '5mm_max' => 7.5,
                        '40mm_min' => 39.5,
                        '40mm_max' => 40.5,
                    ]
                )
            ],
            [
                'code' => 'C',
                'lini_id' => 3,
                'flow_id' => 1,
                'attribute' => json_encode(
                    [
                        '5mm_min' => 4.5,
                        '5mm_max' => 7.5,
                        '40mm_min' => 39.5,
                        '40mm_max' => 40.5,
                    ]
                )
            ],
            [
                'code' => 'D',
                'lini_id' => 4,
                'flow_id' => 1,
                'attribute' => json_encode(
                    [
                        '5mm_min' => 4.5,
                        '5mm_max' => 7.5,
                        '40mm_min' => 39.5,
                        '40mm_max' => 40.5,
                    ]
                )
            ],
            [
                'code' => 'E',
                'lini_id' => 5,
                'flow_id' => 1,
                'attribute' => json_encode(
                    [
                        '5mm_min' => 4.5,
                        '5mm_max' => 7.5,
                        '40mm_min' => 39.5,
                        '40mm_max' => 40.5,
                    ]
                )
            ],
        ]);
    }
}
