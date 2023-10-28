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
        'n',
        'sample',
        'p_min_n1',
        'p_min_n2',
        'p_max_n1',
        'p_max_n2',
        'p_status',
        'p_result',
        'dd_min_n1',
        'dd_min_n2',
        'dd_max_n1',
        'dd_max_n2',
        'dd_status',
        'dd_result',
        'dla_0lb',
        'dla_1lb',
        'dla_3lb',
        'dla_4lb',
        'dla_status',
        'dla_result',
        'dmd_min_n1',
        'dmd_min_n2',
        'dmd_max_n1',
        'dmd_max_n2',
        'dmd_status',
        'dmd_result',
        'mb_min_n1',
        'mb_min_n2',
        'mb_max_n1',
        'mb_max_n2',
        'mb_status',
        'mb_result',
        'dlp_min_n1',
        'dlp_min_n2',
        'dlp_max_n1',
        'dlp_max_n2',
        'dlp_status',
        'dlp_result',
        'dml_min_n1',
        'dml_min_n2',
        'dml_max_n1',
        'dml_max_n2',
        'dml_status',
        'dml_result',
        'hs_min_n1',
        'hs_min_n2',
        'hs_max_n1',
        'hs_max_n2',
        'hs_min',
        'hs_max',
        'hs_status',
        'hs_result',
        'td_min_n1',
        'td_min_n2',
        'td_max_n1',
        'td_max_n2',
        'td_min',
        'td_max',
        'td_status',
        'td_result',
        'ta_min_n1',
        'ta_min_n2',
        'ta_max_n1',
        'ta_max_n2',
        'ta_min',
        'ta_max',
        'ta_status',
        'ta_result',
        'klp_min_n1',
        'klp_min_n2',
        'klp_max_n1',
        'klp_max_n2',
        'klp_min',
        'klp_max',
        'klp_status',
        'klp_result',
        'dk_min_n1',
        'dk_min_n2',
        'dk_max_n1',
        'dk_max_n2',
        'dk_min',
        'dk_max',
        'dk_status',
        'dk_result',
        'mato',
        'retry',
        'status_retry',
        'status',
        'keterangan',
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

    public function spec()
    {
        return $this->hasOne(Mu5tjLongsongSpec::class, 'id', 'spec_id');
    }
}
