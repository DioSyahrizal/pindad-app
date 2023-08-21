<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mu5tj_Spec_Active extends Model
{
    protected $table = 'mu5tj_spec_actives';
    protected $fillable = [
        'id_spec',
    ];

    public function mu5tj_spec()
    {
        return $this->hasOne(Mu5tj_Spec::class, 'id');
    }
}
