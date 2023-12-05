<x-layout>
    <div class="sm:p-0 md:p-5  overflow-x-auto max-w-[100vw]">
        <div class="border border-solid border-black bg-white p-4 w-[600px] sm:w-full">
            <div class="grid grid-cols-2">
                <div class="border border-solid border-black p-4 text-center">
                    PT. PINDAD
                </div>
                <div class="grid grid-rows-2 border border-solid border-black text-center align-middle items-center">
                    <div class="border-b border-solid border-gray-300 h-full p-1">
                        KARTU PEMERIKSAAN AKHIR LONGSONG
                    </div>
                    <div class="text-left px-3">
                        KALIBER : 5.56 × 45 mm (TAJAM)
                    </div>
                </div>
            </div>
            <div class="border border-solid border-black px-4 py-2 text-center">
                DATA HASIL PEMERIKSAAN
            </div>
            <div class="grid grid-cols-2">
                <div class="grid grid-cols-2 border border-solid border-black px-4 py-2">
                    <div class="">
                        No. Order
                    </div>
                    <div class="">
                        : -
                    </div>
                </div>
                <div class="grid grid-cols-5 border border-solid border-black px-4 py-2">
                    <div class="">
                        Jml. Produk
                    </div>
                    <div class="">
                        : {{$mu5tj->visuil->jumlah}}
                    </div>
                    <div class="">

                    </div>
                    <div class="">

                    </div>
                    <div class="">
                        butir
                    </div>
                </div>
                <div class="grid grid-cols-2 border border-solid border-black px-4 py-2">
                    <div class="">
                        No. Gambar
                    </div>
                    <div class="">
                        : -
                    </div>
                </div>
                <div class="grid grid-cols-5 border border-solid border-black px-4 py-2">
                    <div class="">
                        Diperiksa
                    </div>
                    <div class="">
                        : 80
                    </div>
                    <div class="">
                        x
                    </div>
                    <div class="">
                        {{$mu5tj->visuil->n}}
                    </div>
                    <div class="">
                        butir
                    </div>
                </div>
                <div class="grid grid-cols-2 border border-solid border-black px-4 py-2">
                    <div class="">
                        No. Lot
                    </div>
                    <div class="">
                        : {{$mu5tj->kode_kirim}}
                    </div>
                </div>
                <div class="grid grid-cols-5 border border-solid border-black px-4 py-2">
                    <div class="">
                        Lulus
                    </div>
                    <div class="">
                        : 80
                    </div>
                    <div class="">
                        x
                    </div>
                    <div class="">
                        {{$mu5tj->visuil->n}}
                    </div>
                    <div class="">
                        butir
                    </div>
                </div>
                <div class="grid grid-cols-2 border border-solid border-black px-4 py-2">
                    <div class="">
                    </div>
                    <div class="">
                    </div>
                </div>
                <div class="grid grid-cols-5 border border-solid border-black px-4 py-2">
                    <div class="">
                        Reject
                    </div>
                    <div class="">
                        : {{$mu5tj->visuil->n1_visuil}}
                    </div>
                    <div class="">
                        +
                    </div>
                    <div class="">
                        {{$mu5tj->visuil->n2_visuil}}
                    </div>
                    <div class="">
                        butir
                    </div>
                </div>
            </div>
            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border border-black py-2">No</div>
                <div class="border border-black py-2">AQL</div>
                <div class="border border-black py-2">SAMPLE</div>
                <div class="border border-black py-2">KARAKTERISTIK</div>
                <div class="border border-black py-2">ALAT UKUR</div>
                <div class="border border-black py-2">DEFECT</div>
                <div class="border border-black py-2">KETERANGAN</div>
            </div>
            {{--row 1--}}
            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div>
                    1
                </div>
                <div class="grid grid-rows-2 border-l border-r border-gray-300">
                    <div class="border-b border-gray-300 py-2">1.5</div>
                    <div class="py-2">0.065</div>
                </div>
                <div class="grid grid-rows-2 border-l border-r border-gray-300">
                    <div class="border-b border-gray-300 py-2">{{$mu5tj->visuil->n * 80}}</div>
                    <div class="py-2">125</div>
                </div>
                <div class="grid grid-rows-2 border-l border-r border-gray-300">
                    <div class="border-b border-gray-300 py-2">VISUIL</div>
                    <div class="py-2">VISUIL LUBANG API</div>
                </div>
                <div class="border-l border-r border-gray-300 h-full w-full flex items-center justify-center">
                    <div>MATA TELANJANG</div>
                </div>
                <div class="grid grid-rows-2 border-l border-r border-gray-300">
                    <div class="border-b border-gray-300 py-2">-</div>
                    <div class="py-2">-</div>
                </div>
                <div class="grid grid-rows-2 border-l border-r border-gray-300">
                    <div class="border-b border-gray-300 py-2">B</div>
                    <div class="py-2">B</div>
                </div>
            </div>
            {{--row 2--}}
            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="py-2">2</div>
                <div class="border-x border-gray-300 py-2">0.25</div>
                <div class="border-x border-gray-300 py-2">{{$mu5tj->dimensi->n * 80}}</div>
                <div class="border-x border-gray-300 py-2">DIMENSI (mm)</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
            </div>
            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            1. Panjang Longsong
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center"></div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['p_min']}}
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['p_max']}} </div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">GO NO GO</div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->p_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            2. Diameter Mulut Dalam
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">Æ</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dmd_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dmd_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">GO NO GO</div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->dmd_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            3. Head Space
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center"></div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['hs_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['hs_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">
                        <div class="flex-2">{{$mu5tj->dimensi->hs_min}}</div>
                        <div class="mx-1">-</div>
                        <div class="flex-2">{{$mu5tj->dimensi->hs_max}}</div>
                    </div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->hs_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            4. Diameter Dasar
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">Æ</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dd_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dd_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">GO NO GO</div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->dd_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            5. Diameter Lubang Penggalak
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">Æ</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dlp_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dlp_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">GO NO GO</div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->dlp_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            6. Diameter Bor Lubang Api
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">Æ</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dla_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dla_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">GO NO GO</div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->dla_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            7. Tebal Dasar
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center"></div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['td_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['td_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">
                        <div class="flex-2">{{$mu5tj->dimensi->td_min}}</div>
                        <div class="mx-1">-</div>
                        <div class="flex-2">{{$mu5tj->dimensi->td_max}}</div>
                    </div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->td_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            8. Tinggi Anvil (Jarak Anvil)
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center"></div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['ta_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['ta_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">
                        <div class="flex-2">{{$mu5tj->dimensi->ta_min}}</div>
                        <div class="mx-1">-</div>
                        <div class="flex-2">{{$mu5tj->dimensi->ta_max}}</div>
                    </div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->ta_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            9. Kedalaman Lubang Penggalak
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center"></div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['klp_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['klp_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">
                        <div class="flex-2">{{$mu5tj->dimensi->klp_min}}</div>
                        <div class="mx-1">-</div>
                        <div class="flex-2">{{$mu5tj->dimensi->klp_max}}</div>
                    </div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->klp_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            10. Diameter Kerongan
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">Æ</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dk_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dk_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">
                        <div class="flex-2">{{$mu5tj->dimensi->dk_min}}</div>
                        <div class="mx-1">-</div>
                        <div class="flex-2">{{$mu5tj->dimensi->dk_max}}</div>
                    </div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->dk_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            11. Mal Bentuk
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">Æ</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center"></div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center"></div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">GO NO GO</div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->mb_result}}</div>
                </div>
            </div>

            <div class="grid--dimensi border border-black text-center align-middle items-center">
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 text-transparent py-2">-</div>
                <div class="border-x border-gray-300 h-full">
                    <div class="grid--detail-dimensi h-full items-center">
                        <div class="border-gray-300 text-left pl-2 h-full flex items-center">
                            12. Diameter Mulut Luar
                        </div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">Æ</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dml_min']}}</div>
                        <div class="border-l border-gray-300 h-full flex justify-center items-center">-</div>
                        <div
                            class="border-l border-gray-300 h-full flex justify-center items-center">{{$specDimensi[0]->spec->attribute['dml_max']}}</div>
                    </div>
                </div>
                <div class="border-l border-r border-gray-300 py-2">Kaliber Akhir</div>
                <div class="border-l border-r border-gray-300 py-2">-</div>
                <div class="grid grid-cols-2 text-center h-full text-center">
                    <div class="border-r border-gray-300 flex justify-center items-center">GO NO GO</div>
                    <div
                        class="border-r border-gray-300 flex justify-center items-center">{{$mu5tj->dimensi->dml_result}}</div>
                </div>
            </div>

            <div class="grid grid-cols-2 border border-gray-300">
                <div class="border-l border-gray-300 p-2">Kesimpulan:</div>
                <div class="border-r border-gray-300 p-2">DITERIMA</div>
            </div>

            <div class="grid grid-cols-2 border border-gray-300">
                <div class="border border-gray-300 p-2">
                    <div>
                        Catatan: {{$mu5tj->keterangan ?? '-'}}
                    </div>
                    <div>
                        No. Lot KUK: {{$mu5tj->no_lot}}
                    </div>
                </div>
                <div class="border border-gray-300 p-2">
                    <div>
                        Turen,{{$mu5tj->tgl_pengiriman->format('d M Y')}}
                    </div>
                    <div class="text-center">
                        INSPECTOR
                    </div>
                    <div class="text-center mt-14">
                        {{$mu5tj->user->name}}
                    </div>
                </div>
            </div>
        </div>

</x-layout>
