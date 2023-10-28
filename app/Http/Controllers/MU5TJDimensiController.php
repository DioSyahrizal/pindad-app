<?php

namespace App\Http\Controllers;


use App\Models\Mu5tjLongsongDimensi;

class MU5TJDimensiController extends Controller
{
    public function getAll()
    {
        $data = Mu5tjLongsongDimensi::query()->with(['kodeLini', 'user'])->paginate(10);
        return view('mu5tj-dimensi', compact('data'));
    }

    public function create()
    {
        return view('mu5tj-dimensi-create');
    }
}
