<?php

namespace App\Http\Controllers;

use App\Models\Mu5TJ;
use App\Models\Mu5tjLongsongHb;

class MU5TJController extends Controller
{
    public function getAll()
    {
        return view('mu5tj');
    }

    public function getTableAll()
    {
        $data = Mu5tjLongsongHb::query()->with(['kodeLini', 'user'])->get();
        return response()->json($data);
    }

    public function create()
    {
        return view('mu5tj_create');
    }

    public function viewSinglePost(Mu5tjLongsongHb $mu5tj)
    {
        return view('mu5tj_hb_detail', compact('mu5tj'));
    }
}
