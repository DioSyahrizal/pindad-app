<?php

namespace App\Http\Livewire;

use App\Models\Mu5TJ;
use Livewire\Component;

class Mu5tjWizard extends Component
{
    public function render()
    {
        return view('livewire.mu5tj-wizard');
    }

    public $currentStep = 1;
    public $no_lot, $kode_lini, $kode_mesin_bakar, $temperature, $titik_11, $titik_12, $titik_13,
        $titik_14, $titik_15, $titik_21, $titik_22, $titik_23, $titik_24, $titik_25;
    public $successMessage = '';

    public function back($step): void
    {
        $this->currentStep = $step;
    }

    public function firstStepSubmit(): void
    {
        $this->validate([
            'no_lot' => 'required',
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
        $this->currentStep = 3;
    }

    public function submitForm(): void
    {
        Mu5TJ::create([
            'no_lot' => $this->no_lot,
            'kode_lini' => $this->kode_lini,
            'kode_mesin_bakar' => $this->kode_mesin_bakar,
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
        ]);
        redirect('/mu5tj')->with('success', 'You have been logged in.');
    }


}
