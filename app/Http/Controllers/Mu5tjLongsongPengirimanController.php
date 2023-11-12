<?php

namespace App\Http\Controllers;

use App\Models\Mu5tjLongsongPengiriman;

class Mu5tjLongsongPengirimanController extends Controller
{
    public function getAll()
    {
        $data = Mu5tjLongsongPengiriman::query()->with(['kodeLini', 'user'])->paginate(10);
        return view('mu5tj_longsong_pengiriman', compact('data'));
    }

    public function create()
    {
        return view('mu5tj_longsong_pengiriman_create');
    }
}
