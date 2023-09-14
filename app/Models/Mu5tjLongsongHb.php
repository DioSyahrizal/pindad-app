<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5tjLongsongHb extends Model
{
    protected $table = 'mu5tj_longsong_hb';
    protected $fillable = [
        'parent_id',
        'no_lot',
        'kode',
        'retry',
        'status',
        'status_bakar',
        'tanggal_create',
        'temperature',
        'user_id',
        'spec_id',
        'lini_id',
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
        'mesin_bakar',
        'waktu_bakar',
        'mato',
        "keterangan",
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
}
