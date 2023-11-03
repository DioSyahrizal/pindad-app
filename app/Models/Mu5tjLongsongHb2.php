<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5TjLongsongHb2 extends Model
{
    protected $table = 'mu5tj_longsong_hb2';
    protected $fillable = [
        'parent_id',
        'user_id',
        'spec_id',
        'lini_id',
        'no_lot',
        'kode',
        'mesin_bakar',
        'waktu_bakar',
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
        'titik_31',
        'titik_32',
        'titik_33',
        'titik_34',
        'titik_35',
        'status',
        'mato',
        'retry',
        'status_bakar',
        'tanggal_create',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_create' => 'datetime',
    ];

    public function kodeLini()
    {
        return $this->hasOne(Mu5tjKodelini::class, 'id', 'lini_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function spec()
    {
        return $this->hasOne(Mu5tjLongsongSpec::class, 'id', 'spec_id');
    }
}
