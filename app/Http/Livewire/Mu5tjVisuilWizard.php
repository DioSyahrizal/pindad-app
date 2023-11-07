<?php

namespace App\Http\Livewire;

use App\Models\Mu5tj_Longsong;
use App\Models\Mu5tjKodelini;
use App\Models\Mu5tjLongsongHb2;
use App\Models\Mu5tjLongsongVisuil;
use Carbon\Carbon;
use Livewire\Component;

class Mu5tjVisuilWizard extends Component
{
    public $currentStep = 1;
    public $no_lot, $kode_lini, $kode_mesin_bakar, $tahun, $keterangan, $tanggal_create;
    public $n = 1;
    public $sample = 0;
    public $jumlah = 20000;

    public $statusCode = '';
    public $generateCode = '';
    public $retryCount = 0;
    public $n1_visuil, $n2_visuil, $status_visuil;
    public $la_0lb = 0, $la_1lb = 0, $la_3lb = 0, $la_4lb = 0, $la_status = 0, $la_result = 0;

    function __construct()
    {
        $this->tanggal_create = Carbon::now()->format('Y-m-d\TH:i');
        $this->tahun = Carbon::now()->format('Y');
    }

    public function back($step): void
    {
        $this->currentStep = $step;
    }

    public function step1Generate(): void
    {
        if ($this->tahun && $this->no_lot && $this->kode_lini) {
            $this->generateCode = $this->tahun . "." . $this->kode_lini . "." . $this->no_lot;
        } else {
            $this->generateCode = 'not valid';
        }

        if ($this->generateCode !== 'not valid') {
            $retryQuery = Mu5tjLongsongVisuil::where([['kode', '=', $this->generateCode]])->orderBy('created_at', 'desc')->first();
            $checkCodeExist = Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->get();
            if ($checkCodeExist->count() > 0) {
                if ($checkCodeExist->first()->flow_id !== 4) {
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
        $this->sample = $this->n * 80;
        if ($this->n1_visuil >= 3 && $this->n1_visuil <= 4) {
            $this->n = 2;
        } else {
            $this->n = 1;
        }

    }

    public function generateVisuilStatus(): void
    {
        if ($this->n === 1) {
            if ($this->n1_visuil <= 2) {
                $this->status_visuil = 'B';
            } else {
                $this->status_visuil = 'TB';
            }
        } else {
            if (($this->n1_visuil + $this->n2_visuil) <= 6) {
                $this->status_visuil = 'B';
            } else {
                $this->status_visuil = 'TB';
            }
        }
    }

    public function generateLubangApi(): void
    {
        $countAll = $this->la_0lb + $this->la_1lb + $this->la_3lb + $this->la_4lb;
        if ($countAll > 0) {
            $this->la_result = 'TB';
        } else {
            $this->la_result = 'B';
        }

        if ($this->la_0lb > 0 && $this->la_1lb == 0 && $this->la_3lb == 0 && $this->la_4lb == 0) {
            $this->la_status = '0-LB';
        } elseif ($this->la_0lb == 0 && $this->la_1lb > 0 && $this->la_3lb == 0 && $this->la_4lb == 0) {
            $this->la_status = '1-LB';
        } elseif ($this->la_0lb == 0 && $this->la_1lb == 0 && $this->la_3lb > 0 && $this->la_4lb == 0) {
            $this->la_status = '3-LB';
        } elseif ($this->la_0lb == 0 && $this->la_1lb == 0 && $this->la_3lb == 0 && $this->la_4lb > 0) {
            $this->la_status = '4-LB';
        } elseif ($this->la_0lb > 0 || $this->la_1lb > 0 || $this->la_3lb > 0 || $this->la_4lb > 0) {
            $this->la_status = 'CAMPUR';
        } else {
            $this->la_status = 'OK';
        }

    }

    public function resetVisuil(): void
    {
        $this->n1_visuil = null;
        $this->n2_visuil = null;
        $this->status_visuil = null;
    }

    public function resetDiameterLubangapi(): void
    {
        $this->la_0lb = 0;
        $this->la_1lb = 0;
        $this->la_3lb = 0;
        $this->la_4lb = 0;
        $this->la_status = null;
        $this->la_result = null;
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'no_lot' => 'required',
            'kode_lini' => 'required',
            'tahun' => 'required',
            'jumlah' => 'required|min:1',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'n1_visuil' => 'required',
            'n2_visuil' => $this->n === 2 ? 'required|numeric|min:0' : '',
            'la_0lb' => 'required|numeric|min:0',
            'la_1lb' => 'required|numeric|min:0',
            'la_3lb' => 'required|numeric|min:0',
            'la_4lb' => 'required|numeric|min:0',
        ]);
        $this->generateVisuilStatus();
        $this->generateLubangApi();
        $this->submit();
    }

    public function generateStatus()
    {
        if ($this->status_visuil === 'B' && $this->la_result === 'B') {
            return 'Terima';
        } else {
            return 'Tolak';
        }
    }

    public function submit()
    {
        $isExist = false;
        $retry = 0;
        $dataFromDb = Mu5tjLongsongVisuil::where([['kode', '=', $this->generateCode]])->orderBy('created_at', 'desc')->first();
        if ($dataFromDb) {
            $retry = $dataFromDb->retry;
            $isExist = true;
        }

        $parentId = Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->first()->id;

        Mu5tjLongsongVisuil::create([
            'parent_id' => $parentId,
            'user_id' => auth()->user()->id,
            'no_lot' => $this->no_lot,
            'lini_id' => $this->kode_lini,
            'kode' => $this->generateCode,
            'jumlah' => $this->jumlah,
            'n' => $this->n,
            'sample' => $this->sample,
            'n1_visuil' => $this->n1_visuil,
            'n2_visuil' => $this->n === 2 ? $this->n2_visuil : 0,
            'status_visuil' => $this->status_visuil,
            'la_0lb' => $this->la_0lb,
            'la_1lb' => $this->la_1lb,
            'la_3lb' => $this->la_3lb,
            'la_4lb' => $this->la_4lb,
            'la_status' => $this->la_status,
            'la_result' => $this->la_result,
            'retry' => $isExist ? $retry + 1 : 0,
            'mato' => $this->generateStatus() === 'Terima' ? 1 : 0,
            'status' => $this->generateStatus(),
            'tanggal_create' => $this->tanggal_create,
            'keterangan' => $this->keterangan,
        ]);

        // update flow_id to 2 when status is passed
        if ($this->generateStatus() === 'Terima') {
            Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->update([
                'flow_id' => 5,
            ]);
        }
        redirect('/5mm/mu5tj/longsong/visuil')->with('success', 'You have successfully created a visuil.');
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

        return view('livewire.mu5tj-visuil-wizard', [
            'list_lini' => $kode_lini_list,
            'generateCode' => $this->generateCode,
            'status_code' => $this->statusCode,
            'retryCount' => $this->retryCount,
        ]);
    }
}
