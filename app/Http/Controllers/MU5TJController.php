<?php

namespace App\Http\Controllers;

use App\Models\Mu5TJ;
use App\Models\Mu5tjLongsongHb;
use Yajra\DataTables\DataTables;

class MU5TJController extends Controller
{
    public function getAll()
    {
        $data = Mu5tjLongsongHb::query()->with(['kodeLini', 'user'])->paginate(10);
        return view('mu5tj', compact('data'));
    }

    public function getTableAll()
    {
        $data = DataTables::of(Mu5tjLongsongHb::query()->with(['kodeLini', 'user']))->make(true);
        return $data;
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
