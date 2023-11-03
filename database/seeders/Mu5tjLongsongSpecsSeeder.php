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
                        '5mm_min' => 120,
                        '5mm_max' => 160,
                        '40mm_min' => 95,
                        '40mm_max' => 145,
                    ]
                )
            ],
            [
                'code' => 'A',
                'lini_id' => 2,
                'flow_id' => 1,
                'attribute' => json_encode(
                    [
                        '5mm_min' => 120,
                        '5mm_max' => 170,
                        '40mm_min' => 80,
                        '40mm_max' => 130,
                    ]
                )
            ],
            [
                'code' => 'A',
                'lini_id' => 3,
                'flow_id' => 1,
                'attribute' => json_encode(
                    [
                        '5mm_min' => 120,
                        '5mm_max' => 170,
                        '40mm_min' => 80,
                        '40mm_max' => 130,
                    ]
                )
            ],
            [
                'code' => 'A',
                'lini_id' => 4,
                'flow_id' => 1,
                'attribute' => json_encode(
                    [
                        '5mm_min' => 115,
                        '5mm_max' => 160,
                        '40mm_min' => 70,
                        '40mm_max' => 130,
                    ]
                )
            ],
            [
                'code' => 'A',
                'lini_id' => 5,
                'flow_id' => 1,
                'attribute' => json_encode(
                    [
                        '5mm_min' => 120,
                        '5mm_max' => 160,
                        '40mm_min' => 70,
                        '40mm_max' => 100,
                    ]
                )
            ],
            [
                'code' => 'A',
                'lini_id' => 1,
                'flow_id' => 2,
                'attribute' => json_encode([
                    "p_min" => 44.45,
                    "p_max" => 44.70,
                    "dmd_min" => 5.66,
                    "dmd_max" => 5.68,
                    "hs_min" => 37.95,
                    "hs_max" => 38.10,
                    "dd_min" => 9.50,
                    "dd_max" => 9.60,
                    "dlp_min" => 4.45,
                    "dlp_max" => 4.49,
                    "dla_min" => 0.80,
                    "dla_max" => 1.10,
                    "td_min" => 0.97,
                    "td_max" => 1.17,
                    "ta_min" => 1.05,
                    "ta_max" => 1.25,
                    "klp_min" => 2.60,
                    "klp_max" => 2.80,
                    "dk_min" => 8.30,
                    "dk_max" => 8.44,
                    "dml_min" => 6.32,
                    "dml_max" => 6.33,
                ])
            ],
            [
                'code' => 'A',
                'lini_id' => 2,
                'flow_id' => 2,
                'attribute' => json_encode([
                    "p_min" => 44.45,
                    "p_max" => 44.70,
                    "dmd_min" => 5.66,
                    "dmd_max" => 5.68,
                    "hs_min" => 37.95,
                    "hs_max" => 38.10,
                    "dd_min" => 9.50,
                    "dd_max" => 9.60,
                    "dlp_min" => 4.45,
                    "dlp_max" => 4.49,
                    "dla_min" => 0.80,
                    "dla_max" => 1.10,
                    "td_min" => 0.97,
                    "td_max" => 1.17,
                    "ta_min" => 1.05,
                    "ta_max" => 1.25,
                    "klp_min" => 2.60,
                    "klp_max" => 2.80,
                    "dk_min" => 8.30,
                    "dk_max" => 8.44,
                    "dml_min" => 6.32,
                    "dml_max" => 6.33,
                ])
            ],
            [
                'code' => 'A',
                'lini_id' => 3,
                'flow_id' => 2,
                'attribute' => json_encode([
                    "p_min" => 44.45,
                    "p_max" => 44.70,
                    "dmd_min" => 5.66,
                    "dmd_max" => 5.68,
                    "hs_min" => 37.95,
                    "hs_max" => 38.10,
                    "dd_min" => 9.50,
                    "dd_max" => 9.60,
                    "dlp_min" => 4.45,
                    "dlp_max" => 4.49,
                    "dla_min" => 0.80,
                    "dla_max" => 1.10,
                    "td_min" => 0.97,
                    "td_max" => 1.17,
                    "ta_min" => 1.05,
                    "ta_max" => 1.25,
                    "klp_min" => 2.60,
                    "klp_max" => 2.80,
                    "dk_min" => 8.30,
                    "dk_max" => 8.44,
                    "dml_min" => 6.32,
                    "dml_max" => 6.33,
                ])
            ],
            [
                'code' => 'A',
                'lini_id' => 4,
                'flow_id' => 2,
                'attribute' => json_encode([
                    "p_min" => 44.45,
                    "p_max" => 44.70,
                    "dmd_min" => 5.66,
                    "dmd_max" => 5.68,
                    "hs_min" => 37.95,
                    "hs_max" => 38.10,
                    "dd_min" => 9.50,
                    "dd_max" => 9.60,
                    "dlp_min" => 4.45,
                    "dlp_max" => 4.49,
                    "dla_min" => 0.80,
                    "dla_max" => 1.10,
                    "td_min" => 0.97,
                    "td_max" => 1.17,
                    "ta_min" => 1.05,
                    "ta_max" => 1.25,
                    "klp_min" => 2.60,
                    "klp_max" => 2.80,
                    "dk_min" => 8.30,
                    "dk_max" => 8.44,
                    "dml_min" => 6.32,
                    "dml_max" => 6.33,
                ])
            ],
            [
                'code' => 'A',
                'lini_id' => 5,
                'flow_id' => 2,
                'attribute' => json_encode([
                    "p_min" => 44.45,
                    "p_max" => 44.70,
                    "dmd_min" => 5.66,
                    "dmd_max" => 5.68,
                    "hs_min" => 37.95,
                    "hs_max" => 38.10,
                    "dd_min" => 9.50,
                    "dd_max" => 9.60,
                    "dlp_min" => 4.45,
                    "dlp_max" => 4.49,
                    "dla_min" => 0.80,
                    "dla_max" => 1.10,
                    "td_min" => 0.97,
                    "td_max" => 1.17,
                    "ta_min" => 1.05,
                    "ta_max" => 1.25,
                    "klp_min" => 2.60,
                    "klp_max" => 2.80,
                    "dk_min" => 8.30,
                    "dk_max" => 8.44,
                    "dml_min" => 6.32,
                    "dml_max" => 6.33,
                ])
            ],
            [
                'code' => 'A',
                'lini_id' => 1,
                'flow_id' => 3,
                'attribute' => json_encode(
                    [
                        'titik1_min' => 120,
                        'titik1_max' => 160,
                        'titik2_min' => 95,
                        'titik2_max' => 145,
                        'titik3_min' => 100,
                        'titik3_max' => 120,
                    ]
                )
            ],
            [
                'code' => 'A',
                'lini_id' => 2,
                'flow_id' => 3,
                'attribute' => json_encode(
                    [
                        'titik1_min' => 120,
                        'titik1_max' => 160,
                        'titik2_min' => 95,
                        'titik2_max' => 145,
                        'titik3_min' => 100,
                        'titik3_max' => 120,
                    ]
                )
            ],
            [
                'code' => 'A',
                'lini_id' => 3,
                'flow_id' => 3,
                'attribute' => json_encode(
                    [
                        'titik1_min' => 120,
                        'titik1_max' => 160,
                        'titik2_min' => 95,
                        'titik2_max' => 145,
                        'titik3_min' => 100,
                        'titik3_max' => 120,
                    ]
                )
            ],
            [
                'code' => 'A',
                'lini_id' => 4,
                'flow_id' => 3,
                'attribute' => json_encode(
                    [
                        'titik1_min' => 120,
                        'titik1_max' => 160,
                        'titik2_min' => 95,
                        'titik2_max' => 145,
                        'titik3_min' => 100,
                        'titik3_max' => 120,
                    ]
                )
            ],
            [
                'code' => 'A',
                'lini_id' => 5,
                'flow_id' => 3,
                'attribute' => json_encode(
                    [
                        'titik1_min' => 120,
                        'titik1_max' => 160,
                        'titik2_min' => 95,
                        'titik2_max' => 145,
                        'titik3_min' => 100,
                        'titik3_max' => 120,
                    ]
                )
            ],
        ]);
    }
}
