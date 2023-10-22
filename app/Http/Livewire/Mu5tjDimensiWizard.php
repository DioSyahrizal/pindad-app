<?php

namespace App\Http\Livewire;


use App\Models\Mu5tj_Longsong;
use App\Models\Mu5tjKodelini;
use App\Models\Mu5tjLongsongDimensi;
use App\Models\Mu5tjLongsongHb;
use Carbon\Carbon;
use Livewire\Component;

class Mu5tjDimensiWizard extends Component
{
    public $currentStep = 2;
    public $tahun, $kode_lini, $no_lot, $kode, $tanggal_create, $statusCode, $retryCount, $generateCode;
    public $n = 2;
    public $sample = 0;
    public $p_min_n1 = 0;
    public $p_min_n2 = 0;
    public $p_max_n1 = 0;
    public $p_max_n2 = 0;
    public $p_status = '';
    public $p_result = '';
    public $dd_min_n1 = 0;
    public $dd_min_n2 = 0;
    public $dd_max_n1 = 0;
    public $dd_max_n2 = 0;
    public $dd_status = '';
    public $dd_result = '';
    public $jumlah = 20000;


    public function back($step): void
    {
        $this->currentStep = $step;
    }

    public function generateStatus($min_n1, $min_n2, $max_n1, $max_n2): array
    {
        $total_min = $min_n1 + $min_n2;
        $total_max = $max_n1 + $max_n2;
        $status = '';
        $result = '';
        if ($total_min >= 1 && $total_max >= 1) {
            $status = 'MINMAX';
        } elseif ($total_min >= 1 && $total_max < 1) {
            $status = 'MIN';
        } elseif ($total_min < 1 && $total_max >= 1) {
            $status = 'MAX';
        }

        if ($min_n1 + $min_n2 + $max_n1 + $max_n2 <= 1) {
            $result = 'B';
        } else {
            $result = 'TB';
        }
        return array('status' => $status, 'result' => $result);
    }

    public function firstStepSubmit(): void
    {
        $this->validate([
            'tahun' => 'required',
            'kode_lini' => 'required',
            'no_lot' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'n' => 'required|numeric|min:1|max:2',
            'sample' => 'required|numeric|min:1'
        ]);
        $this->currentStep = 2;
    }

    public function secondStepSubmit(): void
    {
        $this->validate([
            'p_min_n1' => 'required|numeric|min:0',
            'p_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'p_max_n1' => 'required|numeric|min:0',
            'p_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'dd_min_n1' => 'required|numeric|min:0',
            'dd_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'dd_max_n1' => 'required|numeric|min:0',
            'dd_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
        ]);

        $this->p_min_n2 = $this->p_min_n2 ?: 0;
        $this->p_max_n2 = $this->p_max_n2 ?: 0;
        $this->dd_min_n2 = $this->dd_min_n2 ?: 0;
        $this->dd_max_n2 = $this->dd_max_n2 ?: 0;

        $result = $this->generateStatus($this->p_min_n1, $this->p_min_n2, $this->p_max_n1, $this->p_max_n2);
        $this->p_status = $result['status'];
        $this->p_result = $result['result'];
        $this->currentStep = 3;
    }

    function __construct()
    {
        $this->tanggal_create = Carbon::now()->format('Y-m-d\TH:i');
        $this->tahun = Carbon::now()->format('Y');
    }


    public function step1Generate(): void
    {
        $this->sample = $this->n * 80;
        if ($this->tahun && $this->no_lot && $this->kode_lini) {
            $this->generateCode = $this->tahun . "." . $this->kode_lini . "." . $this->no_lot;
        } else {
            $this->generateCode = 'not valid';
        }

        if ($this->generateCode !== 'not valid') {
            $retryQuery = Mu5tjLongsongDimensi::where([['kode', '=', $this->generateCode]])->orderBy('created_at', 'desc')->first();
            $checkCodeExist = Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->get();
            if ($checkCodeExist->count() > 0) {
                if ($checkCodeExist->first()->flow_id !== 2) {
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


    public function render()
    {
        $kode_lini_list = Mu5tjKodelini::get();
        if ($this->currentStep === 1) {
            $this->step1Generate();
        }
        return view('livewire.mu5tj-dimensi-wizard', [
            'list_lini' => $kode_lini_list,
            'generateCode' => $this->generateCode,
            'retryCount' => $this->retryCount,
            'status_code' => $this->statusCode,
        ]);
    }
}
