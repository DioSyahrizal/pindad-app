<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5TJ extends Model
{
    protected $table = 'mu5_t_j';
    protected $fillable = [
        'no_lot',
        'kode_lini',
        'kode_mesin_bakar',
        'temperature',
        'titik_11',
        'titik_12',
        'titik_13',
        'titik_14',
        'titik_15',
        'titik_21',
        'titik_22',
        'titik_23',
        'titik_24',
        'titik_25',

    ];

    public function kode_lini_join()
    {
        return $this->has(Mu5tjKodelini::class, 'kode_lini');
    }
}
