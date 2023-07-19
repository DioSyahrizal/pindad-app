<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5TJ extends Model
{
    protected $table = 'mu5_t_js';
    protected $fillable = [
        'no_lot',
        'kode_lini',
        'kode_mesin_bakar',
        'temperature',
    ];
}
