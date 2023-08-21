<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5tj_Spec extends Model
{
    protected $table = 'mu5tj_specs';
    protected $fillable = [
        'id_lini',
        'kode_spec',
        '5mm_min',
        '5mm_max',
        '40mm_min',
        '40mm_max',
    ];
}
