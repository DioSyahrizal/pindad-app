<?php

namespace App\Http\Controllers;

use App\Models\Mu5TJ;
use App\Models\Mu5tjLongsongHb;

class MU5TJController extends Controller
{
    public function getAll()
    {
        $data = Mu5tjLongsongHb::query()->with('kodeLini')->paginate(10);
        return view('mu5tj', compact('data'));
    }

    public function create()
    {
        return view('mu5tj_create');
    }

    public function viewSinglePost(Mu5tjLongsongHb $mu5tj)
    {
        return view('mu5tj_dimensi_form', compact('mu5tj'));
    }
}
