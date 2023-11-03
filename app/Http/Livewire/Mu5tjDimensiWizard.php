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
    public $tahun, $kode_lini, $no_lot, $kode, $tanggal_create, $statusCode, $retryCount, $generateCode, $status;
    public $n = 2;
    public $sample = 0;
    public $jumlah = 20000;
    public $status_retry = '';
    public $specTable, $mato;


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

    // Variable for 'td';
    public $td_min_n1 = 0, $td_min_n2 = 0;
    public $td_max_n1 = 0, $td_max_n2 = 0;
    public $td_min = 0, $td_max = 0;
    public $td_status = '', $td_result = '';

    // Variable for 'ta';
    public $ta_min_n1 = 0, $ta_min_n2 = 0;
    public $ta_max_n1 = 0, $ta_max_n2 = 0;
    public $ta_min = 0, $ta_max = 0;
    public $ta_status = '', $ta_result = '';

    // Variable for 'klp';
    public $klp_min_n1 = 0, $klp_min_n2 = 0;
    public $klp_max_n1 = 0, $klp_max_n2 = 0;
    public $klp_min = 0, $klp_max = 0;
    public $klp_status = '', $klp_result = '';

    // Variable for 'dk';
    public $dk_min_n1 = 0, $dk_min_n2 = 0;
    public $dk_max_n1 = 0, $dk_max_n2 = 0;
    public $dk_min = 0, $dk_max = 0;
    public $dk_status = '', $dk_result = '';


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

    public function resetTebalDasar(): void
    {
        $this->td_min_n1 = 0;
        $this->td_min_n2 = 0;
        $this->td_max_n1 = 0;
        $this->td_max_n2 = 0;
        $this->td_min = 0;
        $this->td_max = 0;
        $this->td_status = '';
        $this->td_result = '';
    }

    public function resetTinggiAnvil(): void
    {
        $this->ta_min_n1 = 0;
        $this->ta_min_n2 = 0;
        $this->ta_max_n1 = 0;
        $this->ta_max_n2 = 0;
        $this->ta_min = 0;
        $this->ta_max = 0;
        $this->ta_status = '';
        $this->ta_result = '';
    }

    public function resetKLPenggalak(): void
    {
        $this->klp_min_n1 = 0;
        $this->klp_min_n2 = 0;
        $this->klp_max_n1 = 0;
        $this->klp_max_n2 = 0;
        $this->klp_min = 0;
        $this->klp_max = 0;
        $this->klp_status = '';
        $this->klp_result = '';
    }

    public function resetDiameterKerongan(): void
    {
        $this->dk_min_n1 = 0;
        $this->dk_min_n2 = 0;
        $this->dk_max_n1 = 0;
        $this->dk_max_n2 = 0;
        $this->dk_min = 0;
        $this->dk_max = 0;
        $this->dk_status = '';
        $this->dk_result = '';
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
                $newResult = $result;
                $newStatus = $status;
            }
        } else if ($status == 'MAX') {
            if ($min) {
                $newResult = 'TB';
                $newStatus = 'MINMAX';
            } else {
                $newResult = $result;
                $newStatus = $status;
            }
        } else {
            $newResult = $result;
            $newStatus = $status;
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
            'td_min_n1' => 'required|numeric|min:0',
            'td_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'td_max_n1' => 'required|numeric|min:0',
            'td_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'td_min' => 'required|numeric|min:0',
            'td_max' => 'required|numeric|min:0',
            'ta_min_n1' => 'required|numeric|min:0',
            'ta_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'ta_max_n1' => 'required|numeric|min:0',
            'ta_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'ta_min' => 'required|numeric|min:0',
            'ta_max' => 'required|numeric|min:0',
        ]);
        $minHS = $this->hs_min < $this->specTable->first()->specDetail->attribute['hs_min'];
        $maxHS = $this->hs_max > $this->specTable->first()->specDetail->attribute['hs_max'];
        $resultHeadspace = $this->generateStatusWithSpec($this->hs_min_n1, $this->hs_min_n2, $this->hs_max_n1, $this->hs_max_n2, $minHS, $maxHS);
        $this->hs_status = $resultHeadspace['status'];
        $this->hs_result = $resultHeadspace['result'];

        $minTD = $this->td_min < $this->specTable->first()->specDetail->attribute['td_min'];
        $maxTD = $this->td_max > $this->specTable->first()->specDetail->attribute['td_max'];
        $resultTebalDasar = $this->generateStatusWithSpec($this->td_min_n1, $this->td_min_n2, $this->td_max_n1, $this->td_max_n2, $minTD, $maxTD);
        $this->td_status = $resultTebalDasar['status'];
        $this->td_result = $resultTebalDasar['result'];

        $minTA = $this->ta_min < $this->specTable->first()->specDetail->attribute['ta_min'];
        $maxTA = $this->ta_max > $this->specTable->first()->specDetail->attribute['ta_max'];
        $resultTinggiAnvil = $this->generateStatusWithSpec($this->ta_min_n1, $this->ta_min_n2, $this->ta_max_n1, $this->ta_max_n2, $minTA, $maxTA);
        $this->ta_status = $resultTinggiAnvil['status'];
        $this->ta_result = $resultTinggiAnvil['result'];
        $this->currentStep = 5;
    }

    public function fifthStepSubmit(): void
    {
        $this->validate([
            'klp_min_n1' => 'required|numeric|min:0',
            'klp_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'klp_max_n1' => 'required|numeric|min:0',
            'klp_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'klp_min' => 'required|numeric|min:0',
            'klp_max' => 'required|numeric|min:0',
            'dk_min_n1' => 'required|numeric|min:0',
            'dk_min_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'dk_max_n1' => 'required|numeric|min:0',
            'dk_max_n2' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'dk_min' => 'required|numeric|min:0',
            'dk_max' => 'required|numeric|min:0',
        ]);

        $minKLP = $this->klp_min < $this->specTable->first()->specDetail->attribute['klp_min'];
        $maxKLP = $this->klp_max > $this->specTable->first()->specDetail->attribute['klp_max'];
        $resultKLPenggalak = $this->generateStatusWithSpec($this->klp_min_n1, $this->klp_min_n2, $this->klp_max_n1, $this->klp_max_n2, $minKLP, $maxKLP);
        $this->klp_status = $resultKLPenggalak['status'];
        $this->klp_result = $resultKLPenggalak['result'];

        $minDK = $this->dk_min < $this->specTable->first()->specDetail->attribute['dk_min'];
        $maxDK = $this->dk_max > $this->specTable->first()->specDetail->attribute['dk_max'];
        $resultDK = $this->generateStatusWithSpec($this->dk_min_n1, $this->dk_min_n2, $this->dk_max_n1, $this->dk_max_n2, $minDK, $maxDK);
        $this->dk_status = $resultDK['status'];
        $this->dk_result = $resultDK['result'];

        $this->submit();
    }

    public function totalAll()
    {
        return $this->p_min_n1 + $this->p_min_n2 + $this->p_max_n1 + $this->p_max_n2 + $this->dd_min_n1 + $this->dd_min_n2 + $this->dd_max_n1 + $this->dd_max_n2 + $this->dmd_min_n1 + $this->dmd_min_n2 + $this->dmd_max_n1 + $this->dmd_max_n2 + $this->mb_min_n1 + $this->mb_min_n2 + $this->mb_max_n1 + $this->mb_max_n2 + $this->dlp_min_n1 + $this->dlp_min_n2 + $this->dlp_max_n1 + $this->dlp_max_n2 + $this->dml_min_n1 + $this->dml_min_n2 + $this->dml_max_n1 + $this->dml_max_n2 + $this->hs_min_n1 + $this->hs_min_n2 + $this->hs_max_n1 + $this->hs_max_n2 + $this->td_min_n1 + $this->td_min_n2 + $this->td_max_n1 + $this->td_max_n2 + $this->ta_min_n1 + $this->ta_min_n2 + $this->ta_max_n1 + $this->ta_max_n2 + $this->klp_min_n1 + $this->klp_min_n2 + $this->klp_max_n1 + $this->klp_max_n2 + $this->dk_min_n1 + $this->dk_min_n2 + $this->dk_max_n1 + $this->dk_max_n2;
    }

    public function generateMato(): void
    {
        if ($this->totalAll() > 1) {
            $this->mato = 0;
            $this->status = 'Tolak';
        } elseif (
            $this->p_result === 'TB' || $this->dd_result === 'TB' || $this->dla_result === 'TB' ||
            $this->dmd_result === 'TB' || $this->mb_result === 'TB' || $this->dlp_result === 'TB' ||
            $this->dml_result === 'TB' || $this->hs_result === 'TB' || $this->td_result === 'TB' ||
            $this->ta_result === 'TB' || $this->klp_result === 'TB' || $this->dk_result === 'TB'
        ) {
            $this->status = 'Tolak';
            $this->mato = 0;
        } else {
            $this->status = 'Terima';
            $this->mato = 1;
        }
    }

    public function submit(): void
    {
        $isExist = false;
        $retry = 0;
        $dataFromDb = Mu5tjLongsongDimensi::where([['kode', '=', $this->generateCode]])->orderBy('created_at', 'desc')->first();
        if ($dataFromDb) {
            $retry = $dataFromDb->retry;
            $isExist = true;
        }

        $this->generateMato();

        $parentId = Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->first()->id;

        Mu5tjLongsongDimensi::create([
            'parent_id' => $parentId,
            'user_id' => auth()->user()->id,
            'spec_id' => $this->specTable->first()->id,
            'lini_id' => $this->kode_lini,
            'no_lot' => $this->no_lot,
            'kode' => $this->generateCode,
            'jumlah' => $this->jumlah,
            'n' => $this->n,
            'sample' => $this->sample,
            'p_min_n1' => $this->p_min_n1,
            'p_min_n2' => $this->p_min_n2,
            'p_max_n1' => $this->p_max_n1,
            'p_max_n2' => $this->p_max_n2,
            'p_status' => $this->p_status,
            'p_result' => $this->p_result,
            'dd_min_n1' => $this->dd_min_n1,
            'dd_min_n2' => $this->dd_min_n2,
            'dd_max_n1' => $this->dd_max_n1,
            'dd_max_n2' => $this->dd_max_n2,
            'dd_status' => $this->dd_status,
            'dd_result' => $this->dd_result,
            'dla_0lb' => $this->dla_0lb,
            'dla_1lb' => $this->dla_1lb,
            'dla_3lb' => $this->dla_3lb,
            'dla_4lb' => $this->dla_4lb,
            'dla_status' => $this->dla_status,
            'dla_result' => $this->dla_result,
            'dmd_min_n1' => $this->dmd_min_n1,
            'dmd_min_n2' => $this->dmd_min_n2,
            'dmd_max_n1' => $this->dmd_max_n1,
            'dmd_max_n2' => $this->dmd_max_n2,
            'dmd_status' => $this->dmd_status,
            'dmd_result' => $this->dmd_result,
            'mb_min_n1' => $this->mb_min_n1,
            'mb_min_n2' => $this->mb_min_n2,
            'mb_max_n1' => $this->mb_max_n1,
            'mb_max_n2' => $this->mb_max_n2,
            'mb_status' => $this->mb_status,
            'mb_result' => $this->mb_result,
            'dlp_min_n1' => $this->dlp_min_n1,
            'dlp_min_n2' => $this->dlp_min_n2,
            'dlp_max_n1' => $this->dlp_max_n1,
            'dlp_max_n2' => $this->dlp_max_n2,
            'dlp_status' => $this->dlp_status,
            'dlp_result' => $this->dlp_result,
            'dml_min_n1' => $this->dml_min_n1,
            'dml_min_n2' => $this->dml_min_n2,
            'dml_max_n1' => $this->dml_max_n1,
            'dml_max_n2' => $this->dml_max_n2,
            'dml_status' => $this->dml_status,
            'dml_result' => $this->dml_result,
            'hs_min_n1' => $this->hs_min_n1,
            'hs_min_n2' => $this->hs_min_n2,
            'hs_max_n1' => $this->hs_max_n1,
            'hs_max_n2' => $this->hs_max_n2,
            'hs_min' => $this->hs_min,
            'hs_max' => $this->hs_max,
            'hs_status' => $this->hs_status,
            'hs_result' => $this->hs_result,
            'td_min_n1' => $this->td_min_n1,
            'td_min_n2' => $this->td_min_n2,
            'td_max_n1' => $this->td_max_n1,
            'td_max_n2' => $this->td_max_n2,
            'td_min' => $this->td_min,
            'td_max' => $this->td_max,
            'td_status' => $this->td_status,
            'td_result' => $this->td_result,
            'ta_min_n1' => $this->ta_min_n1,
            'ta_min_n2' => $this->ta_min_n2,
            'ta_max_n1' => $this->ta_max_n1,
            'ta_max_n2' => $this->ta_max_n2,
            'ta_min' => $this->ta_min,
            'ta_max' => $this->ta_max,
            'ta_status' => $this->ta_status,
            'ta_result' => $this->ta_result,
            'klp_min_n1' => $this->klp_min_n1,
            'klp_min_n2' => $this->klp_min_n2,
            'klp_max_n1' => $this->klp_max_n1,
            'klp_max_n2' => $this->klp_max_n2,
            'klp_min' => $this->klp_min,
            'klp_max' => $this->klp_max,
            'klp_status' => $this->klp_status,
            'klp_result' => $this->klp_result,
            'dk_min_n1' => $this->dk_min_n1,
            'dk_min_n2' => $this->dk_min_n2,
            'dk_max_n1' => $this->dk_max_n1,
            'dk_max_n2' => $this->dk_max_n2,
            'dk_min' => $this->dk_min,
            'dk_max' => $this->dk_max,
            'dk_status' => $this->dk_status,
            'dk_result' => $this->dk_result,
            'mato' => $this->mato,
            'retry' => $isExist ? $retry + 1 : 0,
            'status_retry' => $this->status_retry ? $this->status_retry : '-',
            'status' => $this->status,
            'tanggal_create' => $this->tanggal_create,
        ]);

        // update flow_id to 2 when status is passed
        if ($this->mato === 1) {
            Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->update([
                'flow_id' => 3,
            ]);
        }

        redirect('/5mm/mu5tj/longsong/dimensi')->with('success', 'You have successfully created a hb-1.');
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

    public function step2Generate(): void
    {
        if ($this->n == 1) {
            $this->p_min_n2 = 0;
            $this->p_max_n2 = 0;
            $this->dd_min_n2 = 0;
            $this->dd_max_n2 = 0;
            $this->dmd_min_n2 = 0;
            $this->dmd_max_n2 = 0;
            $this->mb_min_n2 = 0;
            $this->mb_max_n2 = 0;
            $this->dlp_min_n2 = 0;
            $this->dlp_max_n2 = 0;
            $this->dml_min_n2 = 0;
            $this->dml_max_n2 = 0;
            $this->hs_min_n2 = 0;
            $this->hs_max_n2 = 0;
            $this->td_min_n2 = 0;
            $this->td_max_n2 = 0;
            $this->ta_min_n2 = 0;
            $this->ta_max_n2 = 0;
            $this->klp_min_n2 = 0;
            $this->klp_max_n2 = 0;
            $this->dk_min_n2 = 0;
            $this->dk_max_n2 = 0;
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
        if ($this->currentStep === 2) {
            $this->step2Generate();
        }
        if ($this->currentStep === 4 || $this->currentStep === 5) {
            $this->step4Generate();
        }
        return view('livewire.mu5tj-dimensi-wizard', [
            'list_lini' => $kode_lini_list,
            'generateCode' => $this->generateCode,
            'retryCount' => $this->retryCount,
            'status_code' => $this->statusCode,
            'specTable' => $this->specTable,
            'n' => $this->n,
        ]);
    }
}
