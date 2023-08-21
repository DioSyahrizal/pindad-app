<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5TJ extends Model
{
    protected $table = 'mu5tj';
    protected $fillable = [
        'no_lot',
        'kode_lini',
        'kode_mesin_bakar',
        'temperature',
        'spec_id',
        'user_id',
        'kode',
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
        'retry',
        'status',
        'tanggal_create',
        'mato',
        'status_bakar'

    ];

    public function kodeLini()
    {
        return $this->hasOne(Mu5tjKodelini::class, 'id','kode_lini');
    }
}
