<?php

namespace App\Http\Livewire;


use App\Models\Mu5tj_Longsong;
use App\Models\Mu5tjKodelini;
use App\Models\Mu5tjLongsongDimensi;
use App\Models\Mu5tjLongsongHb;
use App\Models\Mu5tjLongsongSpecActive;
use Carbon\Carbon;
use Livewire\Component;

class Mu5tjDimensiWizard extends Component
{
    public $currentStep = 1;
    public $tahun, $kode_lini = 1, $no_lot, $kode, $tanggal_create, $statusCode, $retryCount, $generateCode;
    public $n = 2;
    public $sample = 0;
    public $jumlah = 20000;

    public $specTable;

// Variables for 'p'
    public $p_min_n1 = 0, $p_min_n2 = 0;
    public $p_max_n1 = 0, $p_max_n2 = 0;
    public $p_status = '', $p_result = '';

// Variables for 'dd'
    public $dd_min_n1 = 0, $dd_min_n2 = 0;
    public $dd_max_n1 = 0, $dd_max_n2 = 0;
    public $dd_status = '', $dd_result = '';

// Variables for 'dla'
    public $dla_0lb = 0, $dla_1lb = 0, $dla_3lb = 0, $dla_4lb = 0;
    public $dla_status = '', $dla_result = '';

// Variables for 'dmd'
    public $dmd_min_n1 = 0, $dmd_min_n2 = 0;
    public $dmd_max_n1 = 0, $dmd_max_n2 = 0;
    public $dmd_status = '', $dmd_result = '';

// Variables for 'mb'
    public $mb_min_n1 = 0, $mb_min_n2 = 0;
    public $mb_max_n1 = 0, $mb_max_n2 = 0;
    public $mb_status = '', $mb_result = '';

// Variables for 'dlp'
    public $dlp_min_n1 = 0, $dlp_min_n2 = 0;
    public $dlp_max_n1 = 0, $dlp_max_n2 = 0;
    public $dlp_status = '', $dlp_result = '';

    // Variable for 'dml;
    public $dml_min_n1 = 0, $dml_min_n2 = 0;
    public $dml_max_n1 = 0, $dml_max_n2 = 0;
    public $dml_status = '', $dml_result = '';

    // Variable for 'hs';
    public $hs_min_n1 = 0, $hs_min_n2 = 0;
    public $hs_max_n1 = 0, $hs_max_n2 = 0;
    public $hs_min = 0, $hs_max = 0;
    public $hs_status = '', $hs_result = '';


    public function back($step): void
    {
        $this->currentStep = $step;
    }

    public function resetPanjang(): void
    {
        $this->p_min_n1 = 0;
        $this->p_min_n2 = 0;
        $this->p_max_n1 = 0;
        $this->p_max_n2 = 0;
        $this->p_status = '';
        $this->p_result = '';
    }

    public function resetDiameterDasar(): void
    {
        $this->dd_min_n1 = 0;
        $this->dd_min_n2 = 0;
        $this->dd_max_n1 = 0;
        $this->dd_max_n2 = 0;
        $this->dd_status = '';
        $this->dd_result = '';
    }

    public function resetDiameterLubangapi(): void
    {
        $this->dla_0lb = 0;
        $this->dla_1lb = 0;
        $this->dla_3lb = 0;
        $this->dla_4lb = 0;
        $this->dla_status = '';
        $this->dla_result = '';
    }

    public function resetDiameterDalam(): void
    {
        $this->dmd_min_n1 = 0;
        $this->dmd_min_n2 = 0;
        $this->dmd_max_n1 = 0;
        $this->dmd_max_n2 = 0;
        $this->dmd_status = '';
        $this->dmd_result = '';
    }

    public function resetMalBentuk(): void
    {
        $this->mb_min_n1 = 0;
        $this->mb_min_n2 = 0;
        $this->mb_max_n1 = 0;
        $this->mb_max_n2 = 0;
        $this->mb_status = '';
        $this->mb_result = '';
    }

    public function resetDiameterLPenggalak(): void
    {
        $this->dlp_min_n1 = 0;
        $this->dlp_min_n2 = 0;
        $this->dlp_max_n1 = 0;
        $this->dlp_max_n2 = 0;
        $this->dlp_status = '';
        $this->dlp_result = '';
    }

    public function resetDiameterMulutLuar(): void
    {
        $this->dml_min_n1 = 0;
        $this->dml_min_n2 = 0;
        $this->dml_max_n1 = 0;
        $this->dml_max_n2 = 0;
        $this->dml_status = '';
        $this->dml_result = '';
    }

    public function resetHeadspace(): void
    {
        $this->hs_min_n1 = 0;
        $this->hs_min_n2 = 0;
        $this->hs_max_n1 = 0;
        $this->hs_max_n2 = 0;
        $this->hs_min = 0;
        $this->hs_max = 0;
        $this->hs_status = '';
        $this->hs_result = '';
    }

    public function generateLubangApi(): void
    {
        $countAll = $this->dla_0lb + $this->dla_1lb + $this->dla_3lb + $this->dla_4lb;
        if ($countAll > 0) {
            $this->dla_result = 'TB';
        } else {
            $this->dla_result = 'B';
        }

        if ($this->dla_0lb > 0 && $this->dla_1lb == 0 && $this->dla_3lb == 0 && $this->dla_4lb == 0) {
            $this->dla_status = '0-LB';
        } elseif ($this->dla_0lb == 0 && $this->dla_1lb > 0 && $this->dla_3lb == 0 && $this->dla_4lb == 0) {
            $this->dla_status = '1-LB';
        } elseif ($this->dla_0lb == 0 && $this->dla_1lb == 0 && $this->dla_3lb > 0 && $this->dla_4lb == 0) {
            $this->dla_status = '3-LB';
        } elseif ($this->dla_0lb == 0 && $this->dla_1lb == 0 && $this->dla_3lb == 0 && $this->dla_4lb > 0) {
            $this->dla_status = '4-LB';
        } elseif ($this->dla_0lb > 0 || $this->dla_1lb > 0 || $this->dla_3lb > 0 || $this->dla_4lb > 0) {
            $this->dla_status = 'CAMPUR';
        } else {
            $this->dla_status = 'OK';
        }

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
        } else {
            $status = 'OK';
        }

        if ($total_min + $total_max <= 1) {
            $result = 'B';
        } else {
            $result = 'TB';
        }
        return array('status' => $status, 'result' => $result);
    }

    public function generateStatusWithSpec($min_n1, $min_n2, $max_n1, $max_n2, $min, $max): array
    {
        $result_code = $this->generateStatus($min_n1, $min_n2, $max_n1, $max_n2);
        $result = $result_code['result'];
        $status = $result_code['status'];
        $newResult = '';
        $newStatus = '';

        if ($status == 'OK') {
            if ($min && $max) {
                $newResult = 'TB';
                $newStatus = 'MINMAX';
            } elseif ($min && !$max) {
                $newResult = $result;
                $newStatus = 'MIN';
            } elseif (!$min && $max) {
                $newResult = $result;
                $newStatus = 'MAX';
            } else {
                $newResult = 'B';
                $newStatus = 'OK';
            }
        } else if ($status == 'MIN') {
            if ($max) {
                $newResult = 'TB';
                $newStatus = 'MINMAX';
            } else {
                $newResult = $status;
                $newStatus = $result;
            }
        } else if ($status == 'MAX') {
            if ($min) {
                $newResult = 'TB';
                $newStatus = 'MINMAX';
            } else {
                $newResult = $result;
                $newStatus = $status;
            }
        }
        return array('status' => $newStatus, 'result' => $newResult);
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
            'dla_0lb' => 'required|numeric|min:0',
            'dla_1lb' => 'required|numeric|min:0',
            'dla_3lb' => 'required|numeric|min:0',
            'dla_4lb' => 'required|numeric|min:0',
        ]);

        $resultPanjang = $this->generateStatus($this->p_min_n1, $this->p_min_n2, $this->p_max_n1, $this->p_max_n2);
        $this->p_status = $resultPanjang['status'];
        $this->p_result = $resultPanjang['result'];
        $resultDiameter = $this->generateStatus($this->dd_min_n1, $this->dd_min_n2, $this->dd_max_n1, $this->dd_max_n2);
        $this->dd_status = $resultDiameter['status'];
        $this->dd_result = $resultDiameter['result'];
        $this->generateLubangApi();
        $this->currentStep = 3;
    }

    public function thirdStepSubmit(): void
    {
        $this->validate([
            'dmd_min_n1' => 'required|numeric|min:0',
            'dmd_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'dmd_max_n1' => 'required|numeric|min:0',
            'dmd_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'mb_min_n1' => 'required|numeric|min:0',
            'mb_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'mb_max_n1' => 'required|numeric|min:0',
            'mb_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'dlp_min_n1' => 'required|numeric|min:0',
            'dlp_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'dlp_max_n1' => 'required|numeric|min:0',
            'dlp_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'dml_min_n1' => 'required|numeric|min:0',
            'dml_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'dml_max_n1' => 'required|numeric|min:0',
            'dml_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
        ]);

        $resultDiameterDalam = $this->generateStatus($this->dmd_min_n1, $this->dmd_min_n2, $this->dmd_max_n1, $this->dmd_max_n2);
        $this->dmd_status = $resultDiameterDalam['status'];
        $this->dmd_result = $resultDiameterDalam['result'];
        $resultMalBentuk = $this->generateStatus($this->mb_min_n1, $this->mb_min_n2, $this->mb_max_n1, $this->mb_max_n2);
        $this->mb_status = $resultMalBentuk['status'];
        $this->mb_result = $resultMalBentuk['result'];
        $resultDiameterLPenggalak = $this->generateStatus($this->dlp_min_n1, $this->dlp_min_n2, $this->dlp_max_n1, $this->dlp_max_n2);
        $this->dlp_status = $resultDiameterLPenggalak['status'];
        $this->dlp_result = $resultDiameterLPenggalak['result'];
        $resultDiameterLuar = $this->generateStatus($this->dml_min_n1, $this->dml_min_n2, $this->dml_max_n1, $this->dml_max_n2);
        $this->dml_status = $resultDiameterLuar['status'];
        $this->dml_result = $resultDiameterLuar['result'];
        $this->currentStep = 4;
    }

    public function fourthStepSubmit(): void
    {
        $this->validate([
            'hs_min_n1' => 'required|numeric|min:0',
            'hs_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'hs_max_n1' => 'required|numeric|min:0',
            'hs_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'hs_min' => 'required|numeric|min:0',
            'hs_max' => 'required|numeric|min:0',
        ]);
        $minHS = $this->hs_min < $this->specTable->first()->specDetail->attribute['hs_min'];
        $maxHS = $this->hs_max > $this->specTable->first()->specDetail->attribute['hs_max'];

        $resultHeadspace = $this->generateStatusWithSpec($this->hs_min_n1, $this->hs_min_n2, $this->hs_max_n1, $this->hs_max_n2, $minHS, $maxHS);
        $this->hs_status = $resultHeadspace['status'];
        $this->hs_result = $resultHeadspace['result'];
//        $this->currentStep = 5;
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

    public function step4Generate(): void
    {
        $this->specTable = Mu5tjLongsongSpecActive::query()->with(['specDetail', 'lini'])->where([['lini_id', '=', $this->kode_lini], ['flow_id', '=', 2]])->get();
    }


    public function render()
    {
        $kode_lini_list = Mu5tjKodelini::get();
        if ($this->currentStep === 1) {
            $this->step1Generate();
        }
        if ($this->currentStep === 4) {
            $this->step4Generate();
        }
        return view('livewire.mu5tj-dimensi-wizard', [
            'list_lini' => $kode_lini_list,
            'generateCode' => $this->generateCode,
            'retryCount' => $this->retryCount,
            'status_code' => $this->statusCode,
            'specTable' => $this->specTable,
        ]);
    }
}
