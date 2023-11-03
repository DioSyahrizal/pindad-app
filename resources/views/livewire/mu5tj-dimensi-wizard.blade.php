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
        <li class="nav-item">
            <span class="nav-link {{ $currentStep != 3 ? '' : 'active' }}">Step 3</span>
        </li>
        <li class="nav-item">
            <span class="nav-link {{ $currentStep != 4 ? '' : 'active' }}">Step 4</span>
        </li>
        <li class="nav-item">
            <span class="nav-link {{ $currentStep != 5 ? '' : 'active' }}">Step 5</span>
        </li>
    </ul>
    <div class="row pt-3">
        {{-- Step 1 --}}
        <h3>Kode: {{$generateCode !== 'not valid' ? $generateCode : ''}}</h3>
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
            @if($retryCount && $retryCount >= 0)
                <div class="mb-3">
                    <label for="status_retry" class="form-label">Status Produk</label>
                    <select name="status_retry"
                            class="form-select {{$errors->first('status_retry') ? 'is-invalid': ""}}"
                            aria-label="Status Bakar" wire:model="status_retry">
                        <option selected>Status Product...</option>
                        <option value="Ulangan Mal" @selected(old('status_retry') == 'Ulangan Mal')>Ulangan Mal</option>
                        <option value="Repair" @selected(old('status_retry') == 'Repair')>Repair</option>
                        <option value="Lain - Lain" @selected(old('status_retry') == 'Lain - Lain')>Lain - Lain</option>
                    </select>
                    @error('status_bakar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            @endif
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
                           name="n"
                           id="n1"
                           aria-describedby="n1">
                    <label class="form-check-label" for="n1">1</label>
                </div>
                <div class="inline-block">
                    <input type="radio" wire:model="n"
                           value={{2}}
                           name="n"
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
                        <th scope="col">
                            <button class="btn btn-light btn-sm" wire:click="resetPanjang">Reset</button>
                        </th>
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
                    @if($n == 2)
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
                {{$dd_result}}
                {{$dd_status}}
                <h3 class="mb-4">Diameter Dasar</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            <button class="btn btn-light btn-sm" wire:click="resetDiameterDasar">Reset</button>
                        </th>
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
                    @if($n == 2)
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
                {{$dla_result}}
                {{$dla_status}}
                <h3 class="mb-4">Diameter Lubang Api</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            <button class="btn btn-light btn-sm" wire:click="resetDiameterLubangapi">Reset</button>
                        </th>
                        <th scope="col">LA-0</th>
                        <th scope="col">LA-1</th>
                        <th scope="col">LA-3</th>
                        <th scope="col">LA-4</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">#</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dla_0lb"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dla_0lb"
                                   placeholder="DLA 0 LB"
                            >
                            <div class="{{$errors->first('dla_0lb') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dla_1lb"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dla_1lb"
                                   placeholder="DLA 1 LB"
                            >
                            <div class="{{$errors->first('dla_1lb') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dla_3lb"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dla_3lb"
                                   placeholder="DLA 3 LB"
                            >
                            <div class="{{$errors->first('dla_3lb') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dla_4lb"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dla_4lb"
                                   placeholder="DLA 4 LB"
                            >
                            <div class="{{$errors->first('dla_4lb') ? 'error' : ''}}"/>
                        </td>
                    </tr>
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

        {{-- Step 3 --}}
        <div id="step3" style="display: {{ $currentStep != 3 ? 'none' : '' }}">
            <div class="py-3 px-2 rounded bg-white">
                {{$dmd_result}}
                {{$dmd_status}}
                <h3 class="mb-4">Diameter Mulut Dalam</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            <button class="btn btn-light btn-sm" wire:click="resetDiameterDalam">Reset</button>
                        </th>
                        <th scope="col">Min</th>
                        <th scope="col">Max</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">n1</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dmd_min_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dmd_min_n1"
                                   placeholder="DMD Min N1"
                            >
                            <div class="{{$errors->first('dmd_min_n1') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dmd_max_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dd_max_n1"
                                   placeholder="DMD Max N1"
                            >
                            <div class="{{$errors->first('dmd_max_n1') ? 'error' : ''}}"/>
                        </td>
                    </tr>
                    @if($n == 2)
                        <th scope="row">n2</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dmd_min_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dmd_min_n2"
                                   placeholder="DMD Min N2"
                            >
                            <div class="{{$errors->first('dmd_min_n2') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dmd_max_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dmd_max_n2"
                                   placeholder="DMD Max N2"
                            >
                            <div class="{{$errors->first('dmd_max_n2') ? 'error' : ''}}"/>
                        </td>
                    @endif
                    </tbody>
                </table>
                {{$mb_result}}
                {{$mb_status}}
                <h3 class="mb-4">Mal Bentuk</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            <button class="btn btn-light btn-sm" wire:click="resetMalBentuk">Reset</button>
                        </th>
                        <th scope="col">Min</th>
                        <th scope="col">Max</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">n1</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="mb_min_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="mb_min_n1"
                                   placeholder="MB Min N1"
                            >
                            <div class="{{$errors->first('mb_min_n1') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="mb_max_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="mb_max_n1"
                                   placeholder="MB Max N1"
                            >
                            <div class="{{$errors->first('mb_max_n1') ? 'error' : ''}}"/>
                        </td>
                    </tr>
                    @if($n == 2)
                        <th scope="row">n2</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="mb_min_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="mb_min_n2"
                                   placeholder="MB Min N2"
                            >
                            <div class="{{$errors->first('mb_min_n2') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="mb_max_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="mb_max_n2"
                                   placeholder="MB Max N2"
                            >
                            <div class="{{$errors->first('mb_max_n2') ? 'error' : ''}}"/>
                        </td>
                    @endif
                    </tbody>
                </table>
                {{$dlp_result}}
                {{$dlp_status}}
                <h3 class="mb-4">Diameter L.Penggalak</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            <button class="btn btn-light btn-sm" wire:click="resetDiameterLPenggalak">Reset</button>
                        </th>
                        <th scope="col">Min</th>
                        <th scope="col">Max</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">n1</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dlp_min_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dlp_min_n1"
                                   placeholder="DLP Min N1"
                            >
                            <div class="{{$errors->first('dlp_min_n1') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dlp_max_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dlp_max_n1"
                                   placeholder="DLP Max N1"
                            >
                            <div class="{{$errors->first('dlp_max_n1') ? 'error' : ''}}"/>
                        </td>
                    </tr>
                    @if($n == 2)
                        <th scope="row">n2</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dlp_min_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dlp_min_n2"
                                   placeholder="DLP Min N2"
                            >
                            <div class="{{$errors->first('dlp_min_n2') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dlp_max_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dlp_min_n2"
                                   placeholder="DLP Max N2"
                            >
                            <div class="{{$errors->first('dlp_min_n2') ? 'error' : ''}}"/>
                        </td>
                    @endif
                    </tbody>
                </table>
                {{$dml_result}}
                {{$dml_status}}
                <h3 class="mb-4">Diameter Mulut Luar</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            <button class="btn btn-light btn-sm" wire:click="resetDiameterMulutLuar">Reset</button>
                        </th>
                        <th scope="col">Min</th>
                        <th scope="col">Max</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">n1</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dml_min_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dml_min_n1"
                                   placeholder="DML Min N1"
                            >
                            <div class="{{$errors->first('dml_min_n1') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dml_max_n1"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dml_max_n1"
                                   placeholder="DML Max N1"
                            >
                            <div class="{{$errors->first('dml_max_n1') ? 'error' : ''}}"/>
                        </td>
                    </tr>
                    @if($n == 2)
                        <th scope="row">n2</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dml_min_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dml_min_n2"
                                   placeholder="DML Min N2"
                            >
                            <div class="{{$errors->first('dml_min_n2') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="dml_max_n2"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="dml_max_n2"
                                   placeholder="DML Max N2"
                            >
                            <div class="{{$errors->first('dml_max_n2') ? 'error' : ''}}"/>
                        </td>
                    @endif
                    </tbody>
                </table>
                <button class="btn btn-secondary" type="button" wire:click="back(2)">Back</button>
                <button class="btn btn-primary" wire:click="thirdStepSubmit" type="button">Next</button>
            </div>
        </div>
        <div id="step4" style="display: {{ $currentStep != 4 ? 'none' : '' }}">
            <div class="py-3 px-2 rounded bg-white">
                <h3 class="mb-4">Headspace</h3>
                <h4 class="mb-4">Spec</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Lini</th>
                        <th>MIN</th>
                        <th>MAX</th>
                    </tr>

                    </thead>
                    <tbody>
                    @if($specTable)
                        @foreach($specTable as $spec)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$spec->lini->nama}}</td>
                                <td>{{$spec->specDetail->attribute['hs_min']}}</td>
                                <td>{{$spec->specDetail->attribute['hs_max']}}</td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
                {{$hs_result}}
                {{$hs_status}}
                <h4>Table Headspace</h4>
                <div class="flex gap-3 content-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">
                                <button class="btn btn-light btn-sm" wire:click="resetHeadspace">Reset</button>
                            </th>
                            <th scope="col">Min N1-N2</th>
                            <th scope="col">Max N1-N2</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">n1</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="hs_min_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="hs_min_n1"
                                       placeholder="HS Min N1"
                                >
                                <div class="{{$errors->first('hs_min_n1') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="hs_max_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="hs_max_n1"
                                       placeholder="HS Max N1"
                                >
                                <div class="{{$errors->first('hs_max_n1') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        @if($n == 2)
                            <th scope="row">n2</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="hs_min_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="hs_min_n2"
                                       placeholder="HS Min N2"
                                >
                                <div class="{{$errors->first('hs_min_n2') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="hs_max_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="hs_max_n2"
                                       placeholder="HS Max N2"
                                >
                                <div class="{{$errors->first('hs_max_n2') ? 'error' : ''}}"/>
                            </td>
                        @endif
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Min</th>
                            <th scope="col">Max</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="hs_min"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="hs_min"
                                       placeholder="HS Min"
                                >
                                <div class="{{$errors->first('hs_min') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="hs_max"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="hs_max"
                                       placeholder="HS Max"
                                >
                                <div class="{{$errors->first('hs_max') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h3 class="mb-4">Tebal Dasar</h3>
                <h4 class="mb-4">Spec</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Lini</th>
                        <th>MIN</th>
                        <th>MAX</th>
                    </tr>

                    </thead>
                    <tbody>
                    @if($specTable)
                        @foreach($specTable as $spec)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$spec->lini->nama}}</td>
                                <td>{{$spec->specDetail->attribute['td_min']}}</td>
                                <td>{{$spec->specDetail->attribute['td_max']}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$td_result}}
                {{$td_status}}
                <h4>Table Tebal Dasar</h4>
                <div class="flex gap-3 content-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">
                                <button class="btn btn-light btn-sm" wire:click="resetTebalDasar">Reset</button>
                            </th>
                            <th scope="col">Min N1-N2</th>
                            <th scope="col">Max N1-N2</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">n1</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="td_min_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="td_min_n1"
                                       placeholder="TD Min N1"
                                >
                                <div class="{{$errors->first('td_min_n1') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="td_max_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="td_max_n1"
                                       placeholder="TD Max N1"
                                >
                                <div class="{{$errors->first('td_max_n1') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        @if($n == 2)
                            <th scope="row">n2</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="td_min_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="td_min_n2"
                                       placeholder="TD Min N2"
                                >
                                <div class="{{$errors->first('td_min_n2') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="td_max_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="td_max_n2"
                                       placeholder="TD Max N2"
                                >
                                <div class="{{$errors->first('td_max_n2') ? 'error' : ''}}"/>
                            </td>
                        @endif
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Min</th>
                            <th scope="col">Max</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="td_min"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="td_min"
                                       placeholder="TD Min"
                                >
                                <div class="{{$errors->first('td_min') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="td_max"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="td_max"
                                       placeholder="TD Max"
                                >
                                <div class="{{$errors->first('td_max') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h3 class="mb-4">Tinggi Anvil</h3>
                <h4 class="mb-4">Spec</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Lini</th>
                        <th>MIN</th>
                        <th>MAX</th>
                    </tr>

                    </thead>
                    <tbody>
                    @if($specTable)
                        @foreach($specTable as $spec)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$spec->lini->nama}}</td>
                                <td>{{$spec->specDetail->attribute['ta_min']}}</td>
                                <td>{{$spec->specDetail->attribute['ta_max']}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$ta_result}}
                {{$ta_status}}
                <h4>Table Tinggi Anvil</h4>
                <div class="flex gap-3 content-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">
                                <button class="btn btn-light btn-sm" wire:click="resetTinggiAnvil">Reset</button>
                            </th>
                            <th scope="col">Min N1-N2</th>
                            <th scope="col">Max N1-N2</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">n1</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="ta_min_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="ta_min_n1"
                                       placeholder="TA Min N1"
                                >
                                <div class="{{$errors->first('ta_min_n1') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="ta_max_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="ta_max_n1"
                                       placeholder="TA Max N1"
                                >
                                <div class="{{$errors->first('ta_max_n1') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        @if($n == 2)
                            <th scope="row">n2</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="ta_min_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="ta_min_n2"
                                       placeholder="TA Min N2"
                                >
                                <div class="{{$errors->first('ta_min_n2') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="ta_max_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="ta_max_n2"
                                       placeholder="TA Max N2"
                                >
                                <div class="{{$errors->first('ta_max_n2') ? 'error' : ''}}"/>
                            </td>
                        @endif
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Min</th>
                            <th scope="col">Max</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="ta_min"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="ta_min"
                                       placeholder="TA Min"
                                >
                                <div class="{{$errors->first('ta_min') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="ta_max"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="ta_max"
                                       placeholder="TA Max"
                                >
                                <div class="{{$errors->first('ta_max') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-secondary" type="button" wire:click="back(3)">Back</button>
                <button class="btn btn-primary" wire:click="fourthStepSubmit" type="button">Next</button>
            </div>
        </div>
        <div id="step5" style="display: {{ $currentStep != 5 ? 'none' : '' }}">
            <div class="py-3 px-2 rounded bg-white">
                <h3 class="mb-4">KL Penggalak</h3>
                <h4 class="mb-4">Spec</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Lini</th>
                        <th>MIN</th>
                        <th>MAX</th>
                    </tr>

                    </thead>
                    <tbody>
                    @if($specTable)
                        @foreach($specTable as $spec)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$spec->lini->nama}}</td>
                                <td>{{$spec->specDetail->attribute['klp_min']}}</td>
                                <td>{{$spec->specDetail->attribute['klp_max']}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$klp_result}}
                {{$klp_status}}
                <h4>Table Tinggi Anvil</h4>
                <div class="flex gap-3 content-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">
                                <button class="btn btn-light btn-sm" wire:click="resetKLPenggalak">Reset</button>
                            </th>
                            <th scope="col">Min N1-N2</th>
                            <th scope="col">Max N1-N2</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">n1</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="klp_min_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="klp_min_n1"
                                       placeholder="KLP Min N1"
                                >
                                <div class="{{$errors->first('klp_min_n1') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="klp_max_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="klp_max_n1"
                                       placeholder="KLP Max N1"
                                >
                                <div class="{{$errors->first('klp_max_n1') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        @if($n == 2)
                            <th scope="row">n2</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="klp_min_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="klp_min_n2"
                                       placeholder="KLP Min N2"
                                >
                                <div class="{{$errors->first('klp_min_n2') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="klp_max_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="klp_max_n2"
                                       placeholder="KLP Max N2"
                                >
                                <div class="{{$errors->first('klp_max_n2') ? 'error' : ''}}"/>
                            </td>
                        @endif
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Min</th>
                            <th scope="col">Max</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="klp_min"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="klp_min"
                                       placeholder="KLP Min"
                                >
                                <div class="{{$errors->first('klp_min') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="klp_max"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="klp_max"
                                       placeholder="KLP Max"
                                >
                                <div class="{{$errors->first('klp_max') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h3 class="mb-4">Diameter Kerongan</h3>
                <h4 class="mb-4">Spec</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Lini</th>
                        <th>MIN</th>
                        <th>MAX</th>
                    </tr>

                    </thead>
                    <tbody>
                    @if($specTable)
                        @foreach($specTable as $spec)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$spec->lini->nama}}</td>
                                <td>{{$spec->specDetail->attribute['dk_min']}}</td>
                                <td>{{$spec->specDetail->attribute['dk_max']}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$dk_result}}
                {{$dk_status}}
                <h4>Table Diameter Kerongan</h4>
                <div class="flex gap-3 content-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">
                                <button class="btn btn-light btn-sm" wire:click="resetDiameterKerongan">Reset</button>
                            </th>
                            <th scope="col">Min N1-N2</th>
                            <th scope="col">Max N1-N2</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">n1</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="dk_min_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="dk_min_n1"
                                       placeholder="DK Min N1"
                                >
                                <div class="{{$errors->first('dk_min_n1') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="dk_max_n1"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="dk_max_n1"
                                       placeholder="DK Max N1"
                                >
                                <div class="{{$errors->first('dk_max_n1') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        @if($n == 2)
                            <th scope="row">n2</th>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="dk_min_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="dk_min_n2"
                                       placeholder="DK Min N2"
                                >
                                <div class="{{$errors->first('dk_min_n2') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="dk_max_n2"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="dk_max_n2"
                                       placeholder="DK Max N2"
                                >
                                <div class="{{$errors->first('dk_max_n2') ? 'error' : ''}}"/>
                            </td>
                        @endif
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Min</th>
                            <th scope="col">Max</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="dk_min"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="dk_min"
                                       placeholder="DK Min"
                                >
                                <div class="{{$errors->first('dk_min') ? 'error' : ''}}"/>
                            </td>
                            <td class="input--custom-group align-middle">
                                <input class="" type="number" wire:model="dk_max"
                                       id="input-number"
                                       min="0"
                                       aria-describedby="dk_max"
                                       placeholder="DK Max"
                                >
                                <div class="{{$errors->first('dk_max') ? 'error' : ''}}"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
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
                <button class="btn btn-secondary" type="button" wire:click="back(4)">Back</button>
                <button class="btn btn-success" wire:click="fifthStepSubmit" type="button">Finish</button>
                <div wire:loading wire:target="fifthStepSubmit">
                    Processing ...
                </div>
            </div>
        </div>
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

