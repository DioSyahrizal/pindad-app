<?php

namespace App\Http\Controllers;

use App\Models\Mu5TJ;

class MU5TJController extends Controller
{
    public function getAll()
    {
            $data = Mu5TJ::get();
            return view('mu5tj', ['data' => $data]);
    }
}
