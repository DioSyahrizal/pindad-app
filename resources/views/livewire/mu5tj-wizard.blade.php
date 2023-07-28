<div class="pt-5">
    {{--    @if(!empty($successMessage))--}}
    {{--        <div class="alert alert-success">--}}
    {{--            {{ $successMessage }}--}}
    {{--        </div>--}}
    {{--    @endif--}}
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ $currentStep != 1 ? '' : 'active' }}" href="#step1">Step 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStep != 2 ? '' : 'active' }}" href="#step2">Step 2</a>
        </li>
    </ul>
    <div class="row pt-3">
        {{-- Step 1 --}}
        <div id="step1" class="needs-validation" style="display: {{ $currentStep != 1 ? 'none' : '' }}">
            <div class="mb-3">
                <label for="no_lot" class="form-label">Nomor Lot</label>
                <input type="text" wire:model="no_lot"
                       class="form-control {{$errors->first('no_lot') ? "is-invalid" : "" }}" id="no_lot"
                       aria-describedby="no_lot">
                @error('no_lot')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kode_lini" class="form-label">Kode Lini</label>
                <input type="text" wire:model="kode_lini"
                       class="form-control {{$errors->first('kode_lini') ? "is-invalid" : "" }}" id="kode_lini">
                @error('kode_lini')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kode_mesin_bakar" class="form-label">Kode Mesin Bakar</label>
                <input type="text" wire:model="kode_mesin_bakar"
                       class="form-control {{$errors->first('kode_mesin_bakar') ? "is-invalid" : "" }}"
                       id="kode_mesin_bakar">
                @error('kode_mesin_bakar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="temperature" class="form-label">Temperature</label>
                <input type="text" wire:model="temperature"
                       class="form-control {{$errors->first('temperature') ? "is-invalid" : "" }}" id="temperature">
                @error('temperature')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary" wire:click="firstStepSubmit"
                    type="button">Next
            </button>
        </div>

        {{-- Step 2 --}}
        <div id="step2" style="display: {{ $currentStep != 2 ? 'none' : '' }}">
            <div class="mb-3">
                <label for="titik_11" class="form-label">Titik 1.1</label>
                <input type="text" wire:model="titik_11"
                       class="form-control {{$errors->first('titik_11') ? "is-invalid" : "" }}" id="titik_11"
                       aria-describedby="titik_11">
                @error('titik_11')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titik_12" class="form-label">Titik 1.2</label>
                <input type="text" wire:model="titik_12"
                       class="form-control {{$errors->first('titik_12') ? "is-invalid" : "" }}" id="titik_12"
                       aria-describedby="titik_12">
                @error('titik_12')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titik_13" class="form-label">Titik 1.3</label>
                <input type="text" wire:model="titik_13"
                       class="form-control {{$errors->first('titik_13') ? "is-invalid" : "" }}" id="titik_13"
                       aria-describedby="titik_13">
                @error('titik_13')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titik_14" class="form-label">Titik 1.4</label>
                <input type="text" wire:model="titik_14"
                       class="form-control {{$errors->first('titik_14') ? "is-invalid" : "" }}" id="titik_14"
                       aria-describedby="titik_14">
                @error('titik_14')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titik_15" class="form-label">Titik 1.5</label>
                <input type="text" wire:model="titik_15"
                       class="form-control {{$errors->first('titik_15') ? "is-invalid" : "" }}" id="titik_15"
                       aria-describedby="titik_15">
                @error('titik_15')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titik_21" class="form-label">Titik 2.1</label>
                <input type="text" wire:model="titik_21"
                       class="form-control {{$errors->first('titik_21') ? "is-invalid" : "" }}" id="titik_21"
                       aria-describedby="titik_21">
                @error('titik_21')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titik_22" class="form-label">Titik 2.2</label>
                <input type="text" wire:model="titik_22"
                       class="form-control {{$errors->first('titik_22') ? "is-invalid" : "" }}" id="titik_22"
                       aria-describedby="titik_22">
                @error('titik_22')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titik_23" class="form-label">Titik 2.3</label>
                <input type="text" wire:model="titik_23"
                       class="form-control {{$errors->first('titik_23') ? "is-invalid" : "" }}" id="titik_23"
                       aria-describedby="titik_23">
                @error('titik_23')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titik_24" class="form-label">Titik 2.4</label>
                <input type="text" wire:model="titik_24"
                       class="form-control {{$errors->first('titik_14') ? "is-invalid" : "" }}" id="titik_24"
                       aria-describedby="titik_24">
                @error('titik_24')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="titik_25" class="form-label">Titik 2.5</label>
                <input type="text" wire:model="titik_25"
                       class="form-control {{$errors->first('titik_25') ? "is-invalid" : "" }}" id="titik_25"
                       aria-describedby="titik_25">
                @error('titik_25')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-danger" type="button" wire:click="back(1)">Back</button>
            <button class="btn btn-primary" type="button" wire:click="secondStepSubmit">Next</button>
        </div>

        {{-- Step 3 --}}
        <div id="step3" style="display: {{ $currentStep != 3 ? 'none' : '' }}">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Name: {{$no_lot}}</li>
                <li class="list-group-item">Username: {{ $kode_lini }}</li>
            </ul>
            <button class="btn btn-danger" type="button" wire:click="back(2)">Back</button>
            <button class="btn btn-success" wire:click="submitForm" type="button">Finish</button>
        </div>
    </div>
</div>
