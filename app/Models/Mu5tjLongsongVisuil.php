<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5tjLongsongVisuil extends Model
{
    protected $table = 'mu5tj_longsong_visuil';
    protected $fillable = [
        'parent_id',
        'lini_id',
        'user_id',
        'no_lot',
        'kode',
        'jumlah',
        'n',
        'sample',
        'n1_visuil',
        'n2_visuil',
        'status_visuil',
        'la_0lb',
        'la_1lb',
        'la_3lb',
        'la_4lb',
        'la_status',
        'la_result',
        'retry',
        'status',
        'keterangan',
        'mato',
        'tanggal_create'
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
