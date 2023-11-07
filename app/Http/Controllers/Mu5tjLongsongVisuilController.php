<?php

namespace App\Http\Controllers;

use App\Models\Mu5tjLongsongVisuil;

class Mu5tjLongsongVisuilController extends Controller
{
    public function getAll()
    {
        $data = Mu5tjLongsongVisuil::query()->with(['kodeLini', 'user'])->paginate(10);
        return view('mu5tj_visuil', compact('data'));
    }

    public function create()
    {
        return view('mu5tj_visuil_create');
    }
}
