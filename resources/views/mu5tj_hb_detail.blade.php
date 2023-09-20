<x-layout>
    <div class="sm:p-0 md:p-5  overflow-x-auto max-w-[100vw]">
        <div class="border border-solid border-black bg-white p-4 w-[600px] sm:w-full">
            <div class="border border-solid border-black  p-4 text-center">
                PT. PINDAD (PERSERO)<br/>
                DEP. PROD KOMPONEN MKK
            </div>
            <div class="border border-solid border-black  py-2 text-center">
                LEMBAR PEMERIKSAAN HB
            </div>
            <div class="border border-solid border-black px-4 py-2 grid--dari">
                <div>Dari</div>
                <div>:</div>
                <div>Regang Potong Bakar Longsong MU5-TJ<br/>
                    ( Status: {{$mu5tj->status_bakar}} )
                </div>
            </div>
            <div class="border border-solid border-black px-4 py-2 text-right">
                {{$mu5tj->kodeLini->nama}} {{$mu5tj->no_lot}}
            </div>
            <div class="grid grid-cols-4">
                <div class="border border-solid border-black px-4 py-2">
                    Nama Prod Komp
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    Longsong
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    Kode Dal Msn Bakar
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    {{$mu5tj->mesin_bakar}}
                </div>
            </div>
            <div class="grid grid-cols-4">
                <div class="border border-solid border-black px-4 py-2">
                    Kaliber
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    5.56 mm
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    Temp. Pembakaran
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    {{$mu5tj->temperature}}
                </div>
            </div>
            <div class="border border-solid border-black px-4 py-2 text-center">
                HASIL PEMERIKSAAN
            </div>
            @for($i=1;$i<=5;$i++)
                <div class="grid grid-cols-3">
                    <div class="border border-solid border-black px-4 py-2">
                        {{$i}}
                    </div>
                    <div class="border border-solid border-black px-4 py-2">
                        {{ $mu5tj->{"titik_1".$i} }}
                    </div>
                    <div class="border border-solid border-black px-4 py-2">
                        {{ $mu5tj->{"titik_2".$i} }}
                    </div>
                </div>
            @endfor
            <div class="border border-solid border-black p-4 text-center">
            </div>
            <div class="border border-solid border-black px-4 py-2 text-left">
                Persyaratan
            </div>
            <div class="grid grid-cols-3">
                <div class="border border-solid border-black px-4 py-2">
                    Maximum
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    {{$mu5tj->spec->attribute['5mm_max']}}
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    {{$mu5tj->spec->attribute['40mm_max']}}
                </div>
            </div>
            <div class="grid grid-cols-3">
                <div class="border border-solid border-black px-4 py-2">
                    Minimum
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    {{$mu5tj->spec->attribute['5mm_min']}}
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    {{$mu5tj->spec->attribute['40mm_min']}}
                </div>
            </div>
            <div class="border border-solid border-black px-4 py-2 grid--dari">
                <div>Kesimpulan</div>
                <div>:</div>
                <div class="mb-4">
                    <x-mu5tj-pill-status :mato="$mu5tj->mato" :status="$mu5tj->status"/>
                </div>
            </div>
            <div class="grid grid-cols-2">
                <div class="border border-solid border-black px-4 py-2">
                    <div class="mb-2">Keterangan:</div>
                    <div class="mb-10">{{$mu5tj->keterangan}}</div>
                </div>
                <div class="border border-solid border-black ">
                    <div class="border border-solid border-black text-center">DIPERIKSA OLEH</div>
                    <div class="grid grid-cols-2">
                        <div class="border border-solid border-black px-4 py-2">Jabatan</div>
                        <div class="border border-solid border-black px-4 py-2">{{$mu5tj->user->jabatan}}</div>
                        <div class="border border-solid border-black px-4 py-2">Nama</div>
                        <div class="border border-solid border-black px-4 py-2">{{$mu5tj->user->name}}</div>
                        <div class="border border-solid border-black px-4 py-2">Tanda Tangan</div>
                        <div
                            class="border border-solid border-black px-4 py-2">
                            {{$mu5tj->tanggal_create->format('d/m/Y')}}
                            <br/><br/>
                            {{$mu5tj->user->codename}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
