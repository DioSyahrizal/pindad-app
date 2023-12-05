<?php

namespace App\Http\Controllers;

use App\Models\Mu5tjLongsongDimensi;
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

    public function viewSinglePost(Mu5tjLongsongPengiriman $mu5tj)
    {
        $parentId = $mu5tj->parent_id;
        $dataSpecDimensi = Mu5tjLongsongDimensi::query()->with(['spec'])->where('parent_id', $parentId)->get();
        return view('mu5tj_longsong_pengiriman_detail', [
            'mu5tj' => $mu5tj,
            'specDimensi' => $dataSpecDimensi
        ]);
    }
}
