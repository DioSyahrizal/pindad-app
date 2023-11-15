<?php

namespace App\Http\Livewire;

use App\Models\Mu5tj_Longsong;
use App\Models\Mu5tjKodelini;
use App\Models\Mu5tjLongsongPengiriman;
use Carbon\Carbon;
use Livewire\Component;


class Mu5tjPengirimanLivewire extends Component
{
    public function confirmed(): void
    {
        Mu5tjLongsongPengiriman::create([
            'parent_id' => Mu5tj_Longsong::where('kode', $this->generateCode)->first()->id,
            'user_id' => auth()->user()->id,
            'lini_id' => $this->kode_lini,
            'no_lot' => $this->no_lot,
            'kode' => $this->generateCode,
            'kode_kirim' => $this->kode_kirim,
            'lot_kirim' => $this->lot_kirim,
            'tgl_pengiriman' => $this->tgl_pengiriman,
            'mato' => 1,
            'status' => 'Kirim',
            'keterangan' => $this->keterangan,
        ]);
        Mu5tj_Longsong::where([['kode', '=', $this->generateCode]])->update([
            'flow_id' => 6,
        ]);
        redirect('/5mm/mu5tj/longsong/pengiriman')->with('success', 'You have successfully created a pengiriman.');
    }

    public function getListeners()
    {
        return [
            'confirmed'
        ];
    }

    public $currentStep = 1;
    public $no_lot, $kode_lini, $tahun, $keterangan, $lot_kirim, $kode_kirim;
    public $generateCode = '';
    public $statusCode = '';
    public $tgl_pengiriman, $mato, $status;

    public function __construct()
    {
        $this->tgl_pengiriman = Carbon::now()->format('Y-m-d');
        $this->tahun = Carbon::now()->format('Y');
    }

    public function generatePengirimanCode(): void
    {
        $parseYear = Carbon::parse($this->tgl_pengiriman)->format('Y');
        $parseMonth = Carbon::parse($this->tgl_pengiriman)->format('m');
        $historyThisMonth = Mu5tjLongsongPengiriman::whereYear('tgl_pengiriman', $parseYear)->whereMonth('tgl_pengiriman', $parseMonth)->count() + 1;
        $this->lot_kirim = str_pad($parseMonth, 2, '0', STR_PAD_LEFT) . str_pad(max($historyThisMonth, 1), 2, '0', STR_PAD_LEFT);
        $this->kode_kirim = $parseYear . '.' . $this->lot_kirim . '.' . $this->kode_lini . $this->no_lot;
    }

    public function resetPengirimanCode(): void
    {
        $this->lot_kirim = '';
        $this->kode_kirim = '';
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
                if ($checkCodeExist->first()->flow_id !== 5) {
                    $this->statusCode = 'failed';
                    $this->resetPengirimanCode();
                } else {
                    $this->statusCode = 'success';
                    $this->generatePengirimanCode();
                }
            } else {
                $this->statusCode = "not_found";
                $this->resetPengirimanCode();

            }
        }
    }


    public function render()
    {
        $kode_lini_list = Mu5tjKodelini::get();
        $this->step1Generate();
        return view('livewire.mu5tj-pengiriman-livewire', [
            'list_lini' => $kode_lini_list,
            'generateCode' => $this->generateCode,
            'status_code' => $this->statusCode,
        ]);
    }
}
