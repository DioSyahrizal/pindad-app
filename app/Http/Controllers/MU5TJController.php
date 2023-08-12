<?php

namespace App\Http\Controllers;

use App\Models\Mu5TJ;

class MU5TJController extends Controller
{
    public function getAll()
    {
        $data = Mu5TJ::select(['mu5_t_j.*', 'mu5tj_kodelini.nama as nama_lini'])->leftJoin('mu5tj_kodelini', 'mu5_t_j.kode_lini', '=', 'mu5tj_kodelini.id')->paginate(10);
        return view('mu5tj', compact('data'));
    }

    public function create()
    {
        return view('mu5tj_create');
    }

    public function viewSinglePost(Mu5TJ $mu5tj)
    {
        return view('mu5tj_dimensi_form', compact('mu5tj'));
    }
}
