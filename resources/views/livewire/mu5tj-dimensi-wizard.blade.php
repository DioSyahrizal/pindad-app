<div class="pt-5">
    {{--    @if(!empty($successMessage))--}}
    {{--        <div class="alert alert-success">--}}
    {{--            {{ $successMessage }}--}}
    {{--        </div>--}}
    {{--    @endif--}}
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <span class="nav-link {{ $currentStep != 1 ? '' : 'active' }}">Step 1</span>
        </li>
        <li class="nav-item">
            <span class="nav-link {{ $currentStep != 2 ? '' : 'active' }}">Step 2</span>
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
            @elseif($status_code === 'not_found')
                <div class="alert alert-danger" role="alert">
                    Nomor Lot tidak ditemukan!
                </div>
            @endif
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <select name="tahun" class="form-select {{$errors->first('tahun') ? "is-invalid" : "" }}"
                        aria-label="Tahun" wire:model="tahun">
                    <option selected>Tahun...</option>
                    @for($i = now()->year; $i >= 2019; $i--)
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
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="numeric" wire:model="jumlah"
                       class="form-control numeric {{$errors->first('jumlah') ? "is-invalid" : "" }}" id="jumlah"
                       aria-describedby="jumlah">
                @error('jumlah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <label for="n" class="form-label">N (Kelipatan)</label>
            <div class="flex gap-3 mb-2">
                <div class="inline-block">
                    <input type="radio" wire:model="n"
                           value={{1}}
                           name="n1"
                           id="n1"
                           aria-describedby="n1">
                    <label class="form-check-label" for="n1">1</label>
                </div>
                <div class="inline-block">
                    <input type="radio" wire:model="n"
                           value={{2}}
                           name="n2"
                           id="n2"
                           aria-describedby="n2">
                    <label class="form-check-label" for="n2">2</label>
                </div>
                @error('n')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sample" class="form-label">Sample</label>
                <input type="numeric" wire:model="sample" readonly

                       class="form-control numeric {{$errors->first('sample') ? "is-invalid" : "" }}" id="sample"
                       aria-describedby="sample">
                @error('sample')
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
            <div class="py-3 px-2 rounded bg-white">
                {{$p_result}}
                {{ $p_status }}
                <h3 class="mb-4">Panjang</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Min</th>
                        <th scope="col">Max</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">n1</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="p_min_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="p_min_n1"
                                   placeholder="P Min N1"
                            >
                            <div class="{{$errors->first('p_min_n1') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="p_max_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="p_max_n1"
                                   placeholder="P Min N1"
                            >
                            <div class="{{$errors->first('p_max_n1') ? 'error' : ''}}"/>
                        </td>
                    </tr>
                    @if($n === 2)
                        <th scope="row">n2</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="p_min_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="p_min_n2"
                                   placeholder="P Min N2"
                            >
                            <div class="{{$errors->first('p_min_n2') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="p_max_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="p_max_n2"
                                   placeholder="P Max N2"
                            >
                            <div class="{{$errors->first('p_max_n2') ? 'error' : ''}}"/>
                        </td>
                    @endif
                    </tbody>
                </table>
                <h3 class="mb-4">Diameter Dalam</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Min</th>
                        <th scope="col">Max</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">n1</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dd_min_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dd_min_n1"
                                   placeholder="DD Min N1"
                            >
                            <div class="{{$errors->first('dd_min_n1') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dd_max_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dd_max_n1"
                                   placeholder="DD Max N1"
                            >
                            <div class="{{$errors->first('dd_max_n1') ? 'error' : ''}}"/>
                        </td>
                    </tr>
                    @if($n === 2)
                        <th scope="row">n2</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dd_min_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dd_min_n2"
                                   placeholder="DD Min N2"
                            >
                            <div class="{{$errors->first('dd_min_n2') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dd_max_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dd_max_n2"
                                   placeholder="DD Max N2"
                            >
                            <div class="{{$errors->first('dd_max_n2') ? 'error' : ''}}"/>
                        </td>
                    @endif
                    </tbody>
                </table>
                <button class="btn btn-secondary" wire:click="back(1)" type="button">
                    Back
                </button>
                <button class="btn btn-primary" wire:click="secondStepSubmit"
                        type="button">
                    Next
                </button>
            </div>
        </div>

        {{--        --}}{{-- Step 3 --}}
        {{--        <div id="step3" style="display: {{ $currentStep != 3 ? 'none' : '' }}">--}}
        {{--            <ul class="list-group list-group-flush">--}}
        {{--                <li class="list-group-item">No Lot: {{$no_lot}}</li>--}}
        {{--                <li class="list-group-item">Kode Lini: {{ $kode_lini }}</li>--}}
        {{--            </ul>--}}
        {{--            <button class="btn btn-danger" type="button" wire:click="back(2)">Back</button>--}}
        {{--            <button class="btn btn-success" wire:click="submitForm" type="button">Finish</button>--}}
        {{--        </div>--}}
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.numeric').each(function () {
            $(this).on('input', function () {
                var sanitized = $(this).val().replace(/[^0-9.]/g, '');
                sanitized = sanitized.replace(/(.)\./, '$1');
                $(this).val(sanitized);
            });
        });
    });
</script>

