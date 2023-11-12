<div class="pt-2">
    <div class="row py-3 bg-white">
        {{-- Step 1 --}}
        <h4 class="mb-4">Kode: {{$generateCode !== 'not valid' ? $generateCode : ''}}</h4>
        <h4 class="mb-4">Lot Kirim: {{$lot_kirim}}</h4>
        <h4 class="mb-4">Kode Kirim: {{$kode_kirim}}</h4>

        <div id="step1" class="needs-validation">
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
                <label for="tgl_pengiriman" class="form-label">Tanggal Pengiriman</label>
                <input type="date" wire:model="tgl_pengiriman"
                       class="form-control {{$errors->first('tgl_pengiriman') ? "is-invalid" : "" }}"
                       max="{{now()->format('Y-m-d')}}"
                       id="tgl_pengiriman">
                @error('tgl_pengiriman')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
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
            <button class="btn btn-primary" wire:click="submit"
                    @if($status_code !== 'success')
                        disabled
                    @endif
                    type="button">Next
            </button>
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

