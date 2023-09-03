<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5tjLongsongSpec extends Model
{
    protected $table = 'mu5tj_longsong_specs';
    protected $fillable = [
        'code',
        'lini_id',
        'flow_id',
        'attribute',
    ];

    protected $casts = [
        'attribute' => 'array',
    ];
}
