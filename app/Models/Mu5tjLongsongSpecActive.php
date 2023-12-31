<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5tjLongsongSpecActive extends Model
{
    protected $table = 'mu5tj_longsong_spec_actives';
    protected $fillable = [
        'spec_id',
        'lini_id',
        'flow_id',
    ];

    public function specDetail()
    {
        return $this->hasOne(Mu5tjLongsongSpec::class, 'id', 'spec_id');
    }

    public function lini()
    {
        return $this->hasOne(Mu5tjKodelini::class, 'id', 'lini_id');
    }
}
