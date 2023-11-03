<?php

namespace App\Http\Controllers;


use App\Models\Mu5tjLongsongHb2;

class MU5TJHB2Controller extends Controller
{
    public function getAll()
    {
        $data = Mu5tjLongsongHb2::query()->with(['kodeLini', 'user'])->paginate(10);
        return view('mu5tj_hb2', compact('data'));
    }

    public function create()
    {
        return view('mu5tj_hb2_create');
    }
}
