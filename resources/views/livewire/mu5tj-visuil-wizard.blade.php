<div class="pt-5">
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
                <label for="n" class="form-label">N (Kelipatan)</label>
                <div class="flex gap-3 mb-2">
                    {{$n}}
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
                {{$status_visuil}}

                <h3 class="mb-4">Visuil</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            <button class="btn btn-light btn-sm" wire:click="resetVisuil">Reset</button>
                        </th>
                        <th scope="col">N1</th>
                        @if($n == 2)
                            <th scope="col">N2</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">N</th>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="n1_visuil"
                                   min="0"
                                   aria-describedby="n1_visuil"
                                   placeholder="N1 Visuil"
                            >
                            <div class="{{$errors->first('n1_visuil') ? 'error' : ''}}"/>
                        </td>
                        @if($n == 2)
                            <td class="input--custom-group">
                                <input class="numeric" type="number" wire:model="n2_visuil"
                                       min="0"
                                       aria-describedby="n2_visuil"
                                       placeholder="N2 Visuil"
                                >
                                <div class="{{$errors->first('n2_visuil') ? 'error' : ''}}"/>
                            </td>
                        @endif
                    </tr>
                    </tbody>
                </table>
                <h3 class="mb-4">Lubang Api</h3>
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
                            <input class="numeric" type="number" wire:model="la_0lb"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="la_0lb"
                                   placeholder="LA 0 LB"
                            >
                            <div class="{{$errors->first('la_0lb') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="la_1lb"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="la_1lb"
                                   placeholder="LA 1 LB"
                            >
                            <div class="{{$errors->first('la_1lb') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="la_3lb"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="la_3lb"
                                   placeholder="LA 3 LB"
                            >
                            <div class="{{$errors->first('la_3lb') ? 'error' : ''}}"/>
                        </td>
                        <td class="input--custom-group">
                            <input class="numeric" type="number" wire:model="la_4lb"
                                   id="input-number"
                                   min="0"
                                   aria-describedby="la_4lb"
                                   placeholder="LA 4 LB"
                            >
                            <div class="{{$errors->first('la_4lb') ? 'error' : ''}}"/>
                        </td>
                    </tr>
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

