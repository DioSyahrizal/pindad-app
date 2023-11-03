<?php

namespace App\Http\Livewire;

use App\Models\Mu5tj_Longsong;
use App\Models\Mu5tjKodelini;
use App\Models\Mu5tjLongsongHb2;
use App\Models\Mu5tjLongsongSpecActive;
use Carbon\Carbon;
use Livewire\Component;

class Mu5tjHb2Wizard extends Component
{
    public $currentStep = 1;
    public $no_lot, $kode_lini, $kode_mesin_bakar, $temperature, $titik_11, $titik_12, $titik_13,
        $titik_14, $titik_15, $titik_21, $titik_22, $titik_23, $titik_24, $titik_25, $titik_31, $titik_32, $titik_33, $titik_34, $titik_35, $tahun, $keterangan, $tanggal_create, $waktu_bakar;
    public $statusCode = '';
    public $generateCode = '';
    public $specTable;
    public $isExistOnHistory = false;
    public $retryCount = 0;
    public $status_bakar = '';

    function __construct()
    {
        $this->tanggal_create = Carbon::now()->format('Y-m-d\TH:i');
        $this->tahun = Carbon::now()->format('Y');
    }

    public function conditionTitik($titik, $min, $max): string
    {
        if ($titik < $min) {
            return 'MIN';
        } elseif ($titik > $max) {
            return 'MAX';
        } else {
            return 'OK';
        }
    }

    public function generateStatus(): string
    {
        $titik1_min = $this->specTable->first()->specDetail->attribute['titik1_min'];
        $titik1_max = $this->specTable->first()->specDetail->attribute['titik1_max'];
        $titik2_min = $this->specTable->first()->specDetail->attribute['titik2_min'];
        $titik2_max = $this->specTable->first()->specDetail->attribute['titik2_max'];
        $titik3_min = $this->specTable->first()->specDetail->attribute['titik3_min'];
        $titik3_max = $this->specTable->first()->specDetail->attribute['titik3_max'];

        $conditionTitik11 = $this->conditionTitik($this->titik_11, $titik1_min, $titik1_max);
        $conditionTitik12 = $this->conditionTitik($this->titik_12, $titik1_min, $titik1_max);
        $conditionTitik13 = $this->conditionTitik($this->titik_13, $titik1_min, $titik1_max);
        $conditionTitik14 = $this->conditionTitik($this->titik_14, $titik1_min, $titik1_max);
        $conditionTitik15 = $this->conditionTitik($this->titik_15, $titik1_min, $titik1_max);

        $conditionTitik21 = $this->conditionTitik($this->titik_21, $titik2_min, $titik2_max);
        $conditionTitik22 = $this->conditionTitik($this->titik_22, $titik2_min, $titik2_max);
        $conditionTitik23 = $this->conditionTitik($this->titik_23, $titik2_min, $titik2_max);
        $conditionTitik24 = $this->conditionTitik($this->titik_24, $titik2_min, $titik2_max);
        $conditionTitik25 = $this->conditionTitik($this->titik_25, $titik2_min, $titik2_max);

        $conditionTitik31 = $this->conditionTitik($this->titik_21, $titik3_min, $titik3_max);
        $conditionTitik32 = $this->conditionTitik($this->titik_22, $titik3_min, $titik3_max);
        $conditionTitik33 = $this->conditionTitik($this->titik_23, $titik3_min, $titik3_max);
        $conditionTitik34 = $this->conditionTitik($this->titik_24, $titik3_min, $titik3_max);
        $conditionTitik35 = $this->conditionTitik($this->titik_25, $titik3_min, $titik3_max);


        $collection = collect([$conditionTitik11, $conditionTitik12, $conditionTitik13, $conditionTitik14, $conditionTitik15,
            $conditionTitik21, $conditionTitik22, $conditionTitik23, $conditionTitik24, $conditionTitik25, $conditionTitik31, $conditionTitik32, $conditionTitik33, $conditionTitik34, $conditionTitik35]);
        $containsMin = $collection->contains('MIN');
        $containsMax = $collection->contains('MAX');

        if ($containsMin && $containsMax) {
            return 'MINMAX';
        } elseif ($containsMin) {
            return 'MIN';
        } elseif ($containsMax) {
            return 'MAX';
        } else {
            return 'PASSED';
        }
    }

    public function generateStatusBakar()
    {
        if ($this->retryCount > 0 && $this->status_bakar) {
            return $this->status_bakar;
        }
        return '-';
    }


    public function firstStepSubmit(): void
    {
        $this->validate([
            'tahun' => 'required',
            'no_lot' => 'required|min:2',
            'kode_lini' => 'required',
            'kode_mesin_bakar' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit(): void
    {
        $this->validate([
            'titik_11' => 'required',
            'titik_12' => 'required',
            'titik_13' => 'required',
            'titik_14' => 'required',
            'titik_15' => 'required',
            'titik_21' => 'required',
            'titik_22' => 'required',
            'titik_23' => 'required',
            'titik_24' => 'required',
            'titik_25' => 'required',
            'titik_31' => 'required',
            'titik_32' => 'required',
            'titik_33' => 'required',
            'titik_34' => 'required',
            'titik_35' => 'required',

        ]);
        $this->submitForm();
    }

    public function submitForm(): void
    {
        $isExist = false;
        $retry = 0;
        $dataFromDb = Mu5tjLongsongHb2::where([['kode', '=', $this->generateCode]])->orderBy('created_at', 'desc')->first();
        if ($dataFromDb) {
            $retry = $dataFromDb->retry;
            $isExist = true;
        }

        $parentId = Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->first()->id;


        Mu5tjLongsongHb2::create([
            'parent_id' => $parentId,
            'user_id' => auth()->user()->id,
            'no_lot' => $this->no_lot,
            'spec_id' => $this->specTable->first()->id,
            'lini_id' => $this->kode_lini,
            'kode' => $this->generateCode,
            'mesin_bakar' => $this->kode_mesin_bakar,
            'waktu_bakar' => $this->waktu_bakar,
            'temperature' => $this->temperature,
            'titik_11' => $this->titik_11,
            'titik_12' => $this->titik_12,
            'titik_13' => $this->titik_13,
            'titik_14' => $this->titik_14,
            'titik_15' => $this->titik_15,
            'titik_21' => $this->titik_21,
            'titik_22' => $this->titik_22,
            'titik_23' => $this->titik_23,
            'titik_24' => $this->titik_24,
            'titik_25' => $this->titik_25,
            'titik_31' => $this->titik_31,
            'titik_32' => $this->titik_32,
            'titik_33' => $this->titik_33,
            'titik_34' => $this->titik_34,
            'titik_35' => $this->titik_35,
            'tanggal_create' => $this->tanggal_create,
            'status' => $this->generateStatus(),
            'mato' => $this->generateStatus() === 'PASSED' ? 1 : 0,
            'keterangan' => $this->keterangan,
            'retry' => $isExist ? $retry + 1 : 0,
            'status_bakar' => $this->generateStatusBakar(),
        ]);

        // update flow_id to 2 when status is passed
        if ($this->generateStatus() === 'PASSED') {
            Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->update([
                'flow_id' => 4,
            ]);
        }

        redirect('/5mm/mu5tj/longsong/hb-2')->with('success', 'You have successfully created a hb-2.');
    }

    public function step1Generate(): void
    {
        if ($this->tahun && $this->no_lot && $this->kode_lini) {
            $this->generateCode = $this->tahun . "." . $this->kode_lini . "." . $this->no_lot;
        } else {
            $this->generateCode = 'not valid';
        }

        if ($this->generateCode !== 'not valid') {
            $retryQuery = Mu5tjLongsongHb2::where([['kode', '=', $this->generateCode]])->orderBy('created_at', 'desc')->first();
            $checkCodeExist = Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->get();
            if ($checkCodeExist->count() > 0) {
                if ($checkCodeExist->first()->flow_id !== 3) {
                    $this->statusCode = 'failed';
                    $this->retryCount = 0;
                } else {
                    $this->retryCount = $retryQuery && $retryQuery->retry !== null ? $retryQuery->retry + 1 : 0;
                    $this->statusCode = 'success';
                }
            } else {
                $this->statusCode = "not_found";
                $this->retryCount = 0;
            }
        }
    }

    public function step2Generate(): void
    {
        $this->specTable = Mu5tjLongsongSpecActive::query()->with(['specDetail', 'lini'])->where([['lini_id', '=', $this->kode_lini], ['flow_id', '=', 3]])->get();
    }


    public function render()
    {
        $kode_lini_list = Mu5tjKodelini::get();
        if ($this->currentStep == 1) {
            $this->step1Generate();
        }
        if ($this->currentStep == 2) {
            $this->step2Generate();
        }
        return view('livewire.mu5tj-hb2-wizard', [
            'list_lini' => $kode_lini_list,
            'generateCode' => $this->generateCode,
            'status_code' => $this->statusCode,
            'specTable' => $this->specTable,
            'retryCount' => $this->retryCount,
            'status_bakar' => $this->status_bakar,
        ]);
    }
}
