<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5tjLongsongDimensi extends Model
{
    protected $table = 'mu5tj_longsong_dimensi';

    protected $fillable = [
        'parent_id',
        'user_id',
        'spec_id',
        'lini_id',
        'no_lot',
        'kode',
        'jumlah',
    ];

    public function kodeLini()
    {
        return $this->hasOne(Mu5tjKodelini::class, 'id', 'lini_id');
    }
}
