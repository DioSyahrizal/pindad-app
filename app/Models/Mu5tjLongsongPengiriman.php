<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5tjLongsongPengiriman extends Model
{
    protected $table = 'mu5tj_longsong_pengiriman';
    protected $fillable = [
        'parent_id',
        'user_id',
        'lini_id',
        'no_lot',
        'kode',
        'kode_kirim',
        'lot_kirim',
        'tgl_pengiriman',
        'mato',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tgl_pengiriman' => 'datetime',
    ];

    public function kodeLini()
    {
        return $this->hasOne(Mu5tjKodelini::class, 'id', 'lini_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function dimensi()
    {
        return $this->hasOne(Mu5tjLongsongDimensi::class, 'parent_id', 'parent_id')->where('mato', '=', 1);
    }

    public function visuil()
    {
        return $this->hasOne(Mu5tjLongsongVisuil::class, 'parent_id', 'parent_id')->where('mato', '=', 1);
    }
}
