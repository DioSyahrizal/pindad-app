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
            @if($status_code === 'success')
                <div class="alert alert-success" role="alert">
                    Nomor Lot belum approved!
                </div>
            @elseif($status_code === 'failed')
                <div class="alert alert-danger" role="alert">
                    Nomor Lot sudah approved!
                </div>
            @endif
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <select name="tahun" class="form-select {{$errors->first('tahun') ? "is-invalid" : "" }}"
                        aria-label="Tahun" wire:model="tahun">
                    <option selected>Tahun...</option>
                    @for($i = now()->year; $i >= 1990; $i--)
                        <option value="{{ $i }}" @selected(old('tahun') == $i)>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
                @error('tahun')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
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
                <select name="kode_lini" class="form-select {{$errors->first('kode_lini') ? "is-invalid" : "" }}"
                        aria-label="Kode Lini" wire:model="kode_lini">
                    <option selected>Kode Lini...</option>
                    @foreach($list_lini as $lini)
                        <option value="{{ $lini->id }}" @selected(old('kode_lini') == $lini->id)>
                            {{ $lini->nama }}
                        </option>
                    @endforeach
                </select>
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
                    <label for="waktu_bakar" class="form-label">Waktu Bakar</label>
                    <input type="text" wire:model="waktu_bakar"
                           class="form-control {{$errors->first('waktu_bakar') ? "is-invalid" : "" }}" id="waktu_bakar">
                    @error('waktu_bakar')
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
                    @if($status_code !== 'success')
                        disabled
                    @endif
                    type="button">Next
            </button>
        </div>

        {{-- Step 2 --}}
        <div id="step2" style="display: {{ $currentStep != 2 ? 'none' : '' }}">
            <h4 class="mt-4">Table Specs</h4>
            <div class="w-[50%] bg-white rounded my-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th rowspan="2">#</th>
                        <th rowspan="4">Kode Spec</th>
                        <th colspan="2" class="text-center">5 mm (1)</th>
                        <th colspan="2" class="text-center">40 mm (2)</th>
                    </tr>
                    <tr>
                        <th>MIN</th>
                        <th>MAX</th>
                        <th>MIN</th>
                        <th>MAX</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($specTable)
                        @foreach($specTable as $spec)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$spec->spec_id}}</td>
                                <td>{{$spec->specDetail->attribute['5mm_min']}}</td>
                                <td>{{$spec->specDetail->attribute['5mm_max']}}</td>
                                <td>{{$spec->specDetail->attribute['40mm_min']}}</td>
                                <td>{{$spec->specDetail->attribute['40mm_max']}}</td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
            <table class="table bg-white rounded">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">5 mm</th>
                    <th scope="col">40 mm</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 1; $i <= 5; $i++)
                    @php
                        $key = "titik_1$i";
                        $key2 = "titik_2$i";
                    @endphp
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td class="input--custom-group">
                            <input type="number" wire:model="{{$key}}"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="{{$key}}"
                                   placeholder="titik 1.{{$i}}"
                            >
                            <div class="{{$errors->first($key) ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input type="number" wire:model="{{$key2}}"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="{{$key2}}"
                                   placeholder="titik 2.{{$i}}"
                            >
                            <div class="{{$errors->first($key2)  ? 'error' : ''}}"/>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea wire:model="keterangan"
                       class="form-control {{$errors->first('keterangan') ? "is-invalid" : "" }}"
                          rows="4"
                       id="keterangan"></textarea>
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_create" class="form-label">Tanggal Create</label>
                <input type="datetime-local" wire:model="tanggal_create"
                       class="form-control {{$errors->first('tanggal_create') ? "is-invalid" : "" }}"
                       id="tanggal_create">
                @error('tanggal_create')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-danger" type="button" wire:click="back(1)">Back</button>
            <button class="btn btn-primary" type="button" wire:click="secondStepSubmit"
            >Next
            </button>
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

<script>
    $(document).ready(function () {
        $('#input-number').on('keydown', function (event) {
            // Get the pressed key code
            var keyCode = event.keyCode || event.which;

            // Check if the pressed key is "e" or "-"
            if (keyCode === 69 || keyCode === 189) {
                // Prevent default behavior of the keypress
                event.preventDefault();
            }
        });
    });
</script>

