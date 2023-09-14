<?php

namespace App\Http\Livewire;

use App\Models\Mu5TJ;
use App\Models\Mu5tj_Longsong;
use App\Models\Mu5tjKodelini;
use App\Models\Mu5tjLongsongHb;
use App\Models\Mu5tjLongsongSpecActive;
use Carbon\Carbon;
use Livewire\Component;

class Mu5tjWizard extends Component
{


    public $currentStep = 1;
    public $no_lot, $kode_lini, $kode_mesin_bakar, $temperature, $titik_11, $titik_12, $titik_13,
        $titik_14, $titik_15, $titik_21, $titik_22, $titik_23, $titik_24, $titik_25, $tahun, $keterangan, $tanggal_create, $waktu_bakar;
    public $statusCode = '';
    public $generateCode = '';
    public $specTable;
    public $isExistOnHistory = false;

    function __construct()
    {
        $this->tanggal_create = Carbon::now()->format('Y-m-d\TH:i');
    }


    public function render()
    {
        $kode_lini_list = Mu5tjKodelini::get();
        $this->step1Generate();
        $this->step2Generate();
        return view('livewire.mu5tj-wizard', [
            'list_lini' => $kode_lini_list,
            'generateCode' => $this->generateCode,
            'status_code' => $this->statusCode,
            'specTable' => $this->specTable,
        ]);
    }

    public function step1Generate(): void
    {
        if ($this->tahun && $this->no_lot && $this->kode_lini) {
            $this->generateCode = $this->tahun . "." . $this->kode_lini . "." . $this->no_lot;
        } else {
            $this->generateCode = 'not valid';
        }

        if ($this->generateCode !== 'not valid') {
            $checkCodeExist = Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->get();
            if ($checkCodeExist->count() > 0) {
                if ($checkCodeExist->first()->flow_id !== 1) {
                    $this->statusCode = 'failed';
                } else {
                    $this->isExistOnHistory = true;
                    $this->statusCode = 'success';
                }
            } else {
                $this->statusCode = "success";
            }
        }
    }

    public function step2Generate(): void
    {
        if ($this->currentStep === 2) {
            $this->specTable = Mu5tjLongsongSpecActive::query()->with('specDetail')->where([['lini_id', '=', $this->kode_lini], ['flow_id', '=', 1]])->get();
        }

    }


    public function back($step): void
    {
        $this->currentStep = $step;
    }

    public function firstStepSubmit(): void
    {
        $this->validate([
            'tahun' => 'required',
            'no_lot' => 'required|min:2',
            'kode_lini' => 'required',
            'kode_mesin_bakar' => 'required',
            'temperature' => 'required',
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

        ]);
        $this->submitForm();
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
        $min5mmSpec = $this->specTable->first()->specDetail->attribute['5mm_min'];
        $max5mmSpec = $this->specTable->first()->specDetail->attribute['5mm_max'];
        $min40mmSpec = $this->specTable->first()->specDetail->attribute['40mm_min'];
        $max40mmSpec = $this->specTable->first()->specDetail->attribute['40mm_max'];

        $conditionTitik11 = $this->conditionTitik($this->titik_11, $min5mmSpec, $max5mmSpec);
        $conditionTitik12 = $this->conditionTitik($this->titik_12, $min5mmSpec, $max5mmSpec);
        $conditionTitik13 = $this->conditionTitik($this->titik_13, $min5mmSpec, $max5mmSpec);
        $conditionTitik14 = $this->conditionTitik($this->titik_14, $min5mmSpec, $max5mmSpec);
        $conditionTitik15 = $this->conditionTitik($this->titik_15, $min5mmSpec, $max5mmSpec);

        $conditionTitik21 = $this->conditionTitik($this->titik_21, $min40mmSpec, $max40mmSpec);
        $conditionTitik22 = $this->conditionTitik($this->titik_22, $min40mmSpec, $max40mmSpec);
        $conditionTitik23 = $this->conditionTitik($this->titik_23, $min40mmSpec, $max40mmSpec);
        $conditionTitik24 = $this->conditionTitik($this->titik_24, $min40mmSpec, $max40mmSpec);
        $conditionTitik25 = $this->conditionTitik($this->titik_25, $min40mmSpec, $max40mmSpec);

        $collection = collect([$conditionTitik11, $conditionTitik12, $conditionTitik13, $conditionTitik14, $conditionTitik15,
            $conditionTitik21, $conditionTitik22, $conditionTitik23, $conditionTitik24, $conditionTitik25]);
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

    public function submitForm(): void
    {
        $created = null;
        $lastData = null;
        // insert into mu5tj_longsong history when not exist
        if (!$this->isExistOnHistory) {
            $created = Mu5tj_Longsong::create([
                'kode' => $this->generateCode,
                'flow_id' => 1,
            ]);
        } else {
            $lastData = Mu5tjLongsongHb::where([['kode', '=', $this->generateCode]])->orderBy('created_at', 'desc')->first();
        }


        Mu5tjLongsongHb::create([
            'parent_id' => $created ? $created->id : Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->first()->id,
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
            'tanggal_create' => $this->tanggal_create,
            'status' => $this->generateStatus(),
            'mato' => $this->generateStatus() === 'PASSED' ? 1 : 0,
            'keterangan' => $this->keterangan,
            'retry' => $created ? 0 : $lastData->retry + 1,
            'status_bakar' => $this->generateStatus() === 'PASSED' ? 'Optimasi' : 'Bakar Ulang',
        ]);

        // update flow_id to 2 when status is passed
        if ($this->generateStatus() === 'PASSED') {
            Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->update([
                'flow_id' => 2,
            ]);
        }

        redirect('/5mm/mu5tj/longsong/hb-1')->with('success', 'You have successfully created a hb-1.');
    }


}
