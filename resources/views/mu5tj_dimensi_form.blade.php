<x-layout>
    <div class="p-5">
        <div class="border border-solid border-black bg-white p-4">
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
                {{$mu5tj->kodeLini->nama}} + {{$mu5tj->no_lot}}
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
                    {{$mu5tj->kode_mesin_bakar}}
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
                    max-1.1
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    max-2.1
                </div>
            </div>
            <div class="grid grid-cols-3">
                <div class="border border-solid border-black px-4 py-2">
                    Minimum
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    min-1.1
                </div>
                <div class="border border-solid border-black px-4 py-2">
                    min-2.1
                </div>
            </div>
            <div class="border border-solid border-black px-4 py-2 grid--dari">
                <div>Kesimpulan</div>
                <div>:</div>
                <div class="mb-4">{{$mu5tj->mato}}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="border border-solid border-black px-4 py-2">
                    <div class="mb-2">Keterangan:</div>
                    <div class="mb-10">{{$mu5tj->status}}</div>
                </div>
                <div class="border border-solid border-black ">
                    <div class="border border-solid border-black text-center">DIPERIKSA OLEH</div>
                    <div class="grid grid-cols-2">
                        <div class="border border-solid border-black px-4 py-2">Jabatan</div>
                        <div class="border border-solid border-black px-4 py-2">{{auth()->user()->jabatan}}</div>
                        <div class="border border-solid border-black px-4 py-2">Nama</div>
                        <div class="border border-solid border-black px-4 py-2">{{auth()->user()->name}}</div>
                        <div class="border border-solid border-black px-4 py-2">Tanda Tangan</div>
                        <div class="border border-solid border-black px-4 pt-2 pb-10">[Jabatan]</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
