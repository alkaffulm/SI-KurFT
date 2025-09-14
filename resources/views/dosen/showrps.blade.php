<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body class="font-serif">

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])
    
    <div class="py-8 px-16 sm:ml-64 mt-16">

        <div class="flex justify-between items-center">
            <a href="/dosen/matkul">Kembali</a>
            <div class="flex justify-end items-center gap-4">
                <div class="flex justify-end mb-4">
                    <a href="{{route('rps.edit', $rps)}}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Edit RPS
                    </a>
                </div>

                <div class="flex justify-end mb-4">
                    <form action="{{route('rps.destroy', $rps)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Hapus RPS</button>
                    </form>
                </div>            
            </div>  
        </div>

        {{-- SECTION 1: KOP SURAT & INFO MATA KULIAH  --}}
        <div class="border border-black bg-[#9cc2e4]">
            <div class="flex  border-black">
                <div class="w-1/4  flex items-center justify-center border-r border-b border-black">
                    <img src="{{asset('images/LOGO ULM.png')}}" alt="Logo Universitas" class="h-20">
                </div>
                <div class="w-1/2  text-center border-b border-black">
                    <h1 class="font-bold text-lg">UNIVERSITAS LAMBUNG MANGKURAT</h1>
                    <h2 class="font-bold text-md">FAKULTAS TEKNIK</h2>
                    <h3 class="font-bold text-md">PROGRAM STUDI {{ strtoupper($rps->programStudi->nama_prodi) }}</h3>
                </div>
                <div class="w-1/4 text-center  border-b border-black">
                    {{-- <p class="font-bold">Kode Dokumen</p>
                    @if($rps->jumlah_revisi > 0)
                        <p>Revisi ke-{{$rps->jumlah_revisi}}</p>
                        <p>Tanggal: {{$rps->tanggal_revisi}}</p>
                    @else
                        <p>Belum ada revisi</p>
                    @endif --}}
                </div>
            </div>
            {{-- Baris Judul RPS --}}
            <div class=" text-center  border-b border-black bg-[#f7cbac]">
                <h2 class="font-bold">RENCANA PEMBELAJARAN SEMESTER</h2>
            </div>
            {{-- Baris Info Detail MK --}}
            <div>
                <div class="grid grid-cols-12 bg-gray-300 text-sm">
                    <div class="col-span-1 px-2 border-r border-black font-bold">Identitas Mata Kuliah</div>
                    <div class="col-span-3 px-2 border-r border-black font-bold">Nama Mata Kuliah</div>
                    <div class="col-span-1 px-2 border-r border-black font-bold">Kode MK</div>
                    <div class="col-span-2 px-2 border-r border-black font-bold">Rumpun MK</div>
                    <div class="col-span-2 px-2 border-r border-b border-black font-bold">BOBOT (sks)<br></div>
                    <div class="col-span-1 px-2 border-r border-b border-black font-bold">SEMESTER</div>
                    <div class="col-span-2 px-2 border-b border-black font-bold">Tgl Penyusunan</div>
                </div>
                <div class="grid grid-cols-12 bg-white">
                    <div class="col-span-1 px-2 border-r border-black"></div>
                    <div class="col-span-3 px-2 border-r border-black">
                        <p>{{ $rps->mataKuliah->nama_matkul_id }}</p>
                        <p class="italic text-sm text-[#7397b6]">{{ $rps->mataKuliah->nama_matkul_en }}</p>
                    </div>
                    <div class="col-span-1 px-2 border-r border-black">{{ $rps->mataKuliah->kode_mk }}</div>
                    <div class="col-span-2 px-2 border-r border-black">
                        @foreach ($rps->mataKuliah->bahanKajian as $bk)
                            <p>{{$bk->nama_bk_id}}</p>
                            <p class="italic text-sm text-[#7397b6]">{{$bk->nama_bk_en}}</p>
                        @endforeach
                    </div>
                    <div class="col-span-2 border-r border-black">
                        <div class="grid grid-cols-3  bg-white">
                            <div class="pb-6 text-center border-r border-black">T ={{ $rps->mataKuliah->sks_teori }}</div>
                            <div class="pb-6 text-center border-r border-black">P ={{ $rps->mataKuliah->sks_praktikum }}</div>                            
                            <div class="pb-6 text-center">Lap. = 0</div>

                        </div>
                    </div>
                    <div class="col-span-1 px-2 text-center border-r border-black bg-white">{{ $rps->mataKuliah->semester }}</div>
                    <div class="col-span-2 px-2 text-center border-black bg-white">{{ $rps->tanggal_disusun->translatedFormat('d F Y') }}</div>
                </div>
            </div>
        </div>

        {{-- SECTION 2: PENGESAHAN, DOSEN PENGEMBANG, BAHAN KAJIAN, BOBOT, SEMESTER, TGL PENYUSUNAN --}}
        <div class="border border-black  border-t-0 text-sm">
            <div class="grid grid-cols-12 bg-gray-300">
                <div class="col-span-1 px-2 bg-white border-r border-black flex items-center font-bold">Otoritas</div>
                <div class="col-span-4 px-2 border-r border-black font-bold">Pengembang RPS</div>
                <div class="col-span-3 px-2 border-r border-black font-bold">Koordinator Mata Kuliah</div>
                <div class="col-span-4 px-2 font-bold">Koordinator Program Studi</div>
            </div>
            <div class="grid grid-cols-12 h-24">
                <div class="col-span-1 px-2 border-r border-black "></div>
                <div class="col-span-4 px-2 border-r  border-t border-black grid items-end">{{ $rps->dosenPenyusun->username }}</div>
                <div class="col-span-3 px-2 border-r border-t border-black"></div>
                <div class="col-span-4 px-2  border-black grid items-end">{{$rps->kaprodi?->username ?? 'Kaprodi tidak ditemukan'}}</div>
            </div>
        </div>

        {{-- SECTION 3: CAPAIAN PEMBELAJARAN, CPL, CPMK, SUB-CPMK, TABEL KORELASI CPLCPMK --}}
        <div class="border border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-1 px-2 border-r border-black flex font-bold ">Capaian Pembelaja<br>ran</div>
                <div class="col-span-11 border-b border-r  border-black">
                    {{-- CPL --}}
                    <div class="  border-black border-b bg-gray-300 px-2 font-bold">Capaian Pembelajaran Lulusan (CPL) Prodi yang dibebankan pada MK</div>
                    <div class="  border-black">
                        @foreach($assocCpls as $cpl)
                            <div class="grid grid-cols-12  border-black">
                                <div class="col-span-1 px-2 border-b border-r border-black text-center ">{{ $cpl->nama_kode_cpl }}</div>
                                <div class="col-span-11 px-2 border-b  border-black text-sm/6">
                                    <p>{{ $cpl->desc_cpl_id }}</p>
                                    <p class="italic text-sm text-[#7397b6]">{{ $cpl->desc_cpl_en }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>  
                    {{-- CPMK --}}
                    <div class="grid grid-cols-12  border-black">
                        <div class="col-span-10  px-2 border-b border-r border-black bg-gray-300 font-bold">Capaian Pembelajaran Mata Kuliah (CPMK): melalui mata kuliah ini mahasiswa diharapkan mampu</div>
                        <div class="col-span-2  px-2 border-b border-r border-black bg-gray-300 font-bold">CPL yang didukung</div>
                    </div>
                    {{-- Loop untuk CPMK --}}
                    @foreach($assocCpmk as $cpmk)
                        <div class="grid grid-cols-12  border-black">
                            <div class="col-span-1 px-2 border-b border-r border-black text-center ">{{ $cpmk->nama_kode_cpmk }}</div>
                            <div class="col-span-9 px-2 border-b  border-black text-sm/6">
                                <p>{{ $cpmk->desc_cpmk_id }} </p>
                                <p class="italic text-sm text-[#7397b6]">{{ $cpmk->desc_cpmk_en }}</p>
                            </div>
                            <div class="col-span-2 px-2 border-l border-b border-black text-sm/6">
                                @foreach ($assocCpls as $cpl )
                                    @if (isset($correlationCpmkCplMap[$cpmk->id_cpmk]) && in_array($cpl->id_cpl, $correlationCpmkCplMap[$cpmk->id_cpmk]))
                                        <p class="text-center">{{$cpl->nama_kode_cpl}}</p>    
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    {{-- SubCPMK --}}
                    <div class="grid grid-cols-12  border-black">
                        <div class="col-span-10  px-2 border-r border-b border-black bg-gray-300 font-bold">Kemampuan akhir tiap tahapan pembelajaran (Sub-Capaian Pembelajaran MK - Sub CPMK)  </div>
                        <div class="col-span-2  px-2 border-r border-b border-black bg-gray-300 font-bold">CPMK yang didukung</div>
                    </div>
                    {{-- Loop untuk Sub-CPMK --}}
                    @foreach($assocCpmk as $cpmk)
                        @foreach ($cpmk->subCpmk as $sc )
                            <div class="grid grid-cols-12  border-black">
                                <div class="col-span-1 px-2 border-r border-b border-black text-center ">{{ $sc->nama_kode_sub_cpmk }}</div>
                                <div class="col-span-9 px-2  border-b border-black text-sm/6">
                                     <p>{{ $sc->desc_sub_cpmk_id }}</p>
                                     <p class="italic text-sm text-[#7397b6]">{{ $sc->desc_sub_cpmk_en }}</p>
                                </div>
                                <div class="col-span-2 px-2 border-l border-b  border-black text-center ">{{$sc->cpmk->nama_kode_cpmk}}</div>
                            </div>   
                        @endforeach
                    @endforeach
                </div>
            </div>

            
            
            
            {{-- <div class="grid grid-cols-12  border-black">
                <div class="col-span-2  px-2 border-r border-black flex items-center"></div>
                <div class="col-span-4  px-2 bg-[#9cc2e4] font-bold">Korelasi CPMK terhadap CPL</div>
                <div class="col-span-6  px-2 border-b  border-black "></div>
            </div>
            <div class="grid grid-cols-12   border-black">
                <div class="col-span-2 row-span-3 p-2 border-r border-black flex items-center"></div>
                <div class="col-span-10 p-2">
                    <table class="w-full text-sm border border-black">
                        <thead>
                            <tr>
                                <th class="px-2 border-r border-black" rowspan="2">Kode CPMK</th>
                                <th class="px-2  border-b border-black" colspan="{{count($assocCpls)}}"  >CPL yang didukung</th>
                            </tr>
                            <tr>                                
                                @forelse ($assocCpls as $cpl )
                                    <th class="px-2 border-r border-black">{{ $cpl->nama_kode_cpl }}</th>
                                @empty
                                    <th class="px-2 border-r border-black">-</th>
                                @endforelse
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($assocCpmk as $cpmk)
                                <tr class="border-t border-black">
                                    <td class="px-2 border-r border-black ">{{$cpmk->nama_kode_cpmk}}</td>
                                    @foreach ($assocCpls as $cpl )
                                        <td class="px-2 border-r border-black text-center">
                                            @if (isset($correlationCpmkCplMap[$cpmk->id_cpmk]) && in_array($cpl->id_cpl, $correlationCpmkCplMap[$cpmk->id_cpmk]))
                                                 ✔    
                                            @endif
                                        </td>
                                    @endforeach
                                </tr> 
                            @empty
                                <tr class="border-t border-black">
                                    <td class="px-2 border-r border-black" colspan="{{ count($assocCpls) }}">
                                        Belum ada pemetaan CPMK.
                                    </td>
                                </tr>                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>

        {{-- SECTION 4: DESKRIPSI, PUSTAKA, BAHAN KAJIAN, DOSEN PENGAMPU, MATAKULIAH SYARAT --}}
        <div class="border border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-1 p-2 border-r border-black font-bold">Deskripsi Mata Kuliah</div>
                <div class="col-span-11 p-2">
                     <p>{{ $rps->mataKuliah->matkul_desc_id }}</p>
                     <p class="italic text-sm text-[#7397b6]">{{ $rps->mataKuliah->matkul_desc_en }}</p>
                </div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-1 p-2 border-r border-black font-bold">Penilaian</div>
                <div class="col-span-11 p-2">

                </div>
            </div>
            <div class="grid grid-cols-12 border-t border-black ">
                <div class="col-span-1 p-2 border-r border-black font-bold break-words">Bahan Kajian: Materi Pembelajaran</div>
                <div class="col-span-11 p-2">{!! nl2br(e($rps->materi_pembelajaran)) !!}</div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-1 px-2 border-r border-black font-bold">Pustaka</div>
                <div class="col-span-11 px-2 font-bold bg-gray-300 border-b border-r border-black">Utama:</div>
            </div>
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-1  border-r border-black"></div>
                <div class="col-span-11 px-2">{!! nl2br(e($rps->pustaka_utama)) !!}</div>
            </div>
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-1 px-2 border-r border-black font-bold"></div>
                <div class="col-span-11 px-2 font-bold bg-gray-300 border-b border-r border-t border-black">Pendukung:</div>
            </div>
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-1  border-r border-black"></div>
                <div class="col-span-11 px-2">{!! nl2br(e($rps->pustaka_pendukung)) !!}</div>
            </div>
            {{-- <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-1 px-2 border-r border-black font-bold">Dosen Pengampu</div>
                <div class="col-span-11 px-2">{{ $rps->dosenPenyusun->username    }}</div>
            </div> --}}
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-1 px-2 border-r border-black font-bold">Mata kuliah PraSyarat</div>
                <div class="col-span-11 px-2">
                    @forelse($rps->mataKuliahSyarat as $mk_syarat)
                        {{ $mk_syarat->nama_matkul_id }} <br>
                    @empty
                        -
                    @endforelse
                </div>
            </div>

            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-1 px-2 border-r border-black font-bold break-words">Media Pembelajaran</div>
                <div class="col-span-11  border-r border-black ">
                    <div class="grid grid-cols-12">
                        <div class="col-span-6 px-2 border-r border-black font-bold bg-gray-300">Perangkat Lunak:</div>
                        <div class="col-span-6 px-2  border-black font-bold bg-gray-300">Perangkat Keras:</div>
                    </div>
                    <div class="grid grid-cols-12">
                        <div class="col-span-6 px-2  border-black border-r ">{{$rps->mediaPerangkatLunak}}</div>
                        <div class="col-span-6 px-2  border-black ">{{$rps->mediaPerangkatKeras}}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION 5: RENCANA MINGGUAN --}}
        <div>
            <table class="w-full text-sm border border-black table-fixed">
                <thead class="text-xs text-gray-700  bg-gray-300">
                    <tr class="border border-black">
                        <th class="p-2 border border-black align-top text-[14px] w-[94px]" rowspan="2">Minggu Ke-</th>
                        <th class="p-2 border border-black align-top text-[14px]" rowspan="2">ID CPMK</th>
                        <th class="p-2 border border-black align-top text-[14px]" rowspan="2">Deskripsi Sub-CPMK</th>
                        <th class="p-2 border border-black align-top text-[14px]" colspan="2">Penilaian</th>
                        <th class="p-2 border border-black align-top text-[14px] " rowspan="2">Pokok Bahasan</th>
                        <th class="p-2 border border-black align-top text-[14px]" rowspan="2">Model Pembelajaran </th>
                        <th class="p-2 border border-black align-top text-[14px]" colspan="2">Bentuk Pembelajaran <br>[Estimasi Waktu]</th>
                        <th class="p-2 border border-black align-top text-[14px]" rowspan="2">Refrensi</th>
                    </tr>
                    <tr class="border border-black text-center bg-[#f7cbac]">
                        <th class="p-1 border border-black ">Indikator</th>
                        <th class="p-1 border border-black">Kriteria & Bentuk</th>
                        <th class="p-1 border border-black">Synchronous</th>
                        <th class="p-1 border border-black">Asynchoronous</th>
                    </tr>
                    <tr class="border border-black text-center bg-white">
                        <th class="p-1 border border-black">(1)</th>
                        <th class="p-1 border border-black">(2)</th>
                        <th class="p-1 border border-black">(3)</th>
                        <th class="p-1 border border-black">(4)</th>
                        <th class="p-1 border border-black">(5)</th>
                        <th class="p-1 border border-black">(6)</th>
                        <th class="p-1 border border-black">(7)</th>
                        <th class="p-1 border border-black">(8)</th>
                        <th class="p-1 border border-black">(9)</th>
                        <th class="p-1 border border-black">(10)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rps->topics as $topic)
                        <tr class="bg-white border-b border-black">
                            {{-- (1) Minggu Ke- --}}
                            <td class="p-2 border border-black text-center align-top font-semibold">
                                {{ $topic->weeks->pluck('week')->sort()->implode(', ') }} {{-- Mengambil semua minggu dari relasi, mengurutkan, dan menggabungkannya dengan koma --}}
                            </td>
                            @if ($topic->tipe == 'topik')
                                {{-- (2) ID CPMK --}}
                                <td class="align-top text-center">
                                    {{$topic->subCpmk->cpmk->nama_kode_cpmk}}
                                </td>
                                {{-- (3) Sub-CPMK --}}
                                <td class="p-2 border border-black align-top">
                                    @if($topic->subCpmk)
                                        <p class="font-bold">{{ $topic->subCpmk->nama_kode_sub_cpmk}}</p>
                                        <p>{{ $topic->subCpmk->desc_sub_cpmk_id }}</p>
                                    @else
                                        -
                                    @endif
                                </td>

                                {{-- (4) Indikator --}}
                                <td class="p-2 border border-black align-top break-words">
                                    {!! nl2br(e($topic->indikator)) !!}
                                </td>

                                {{-- (5) Kriteria & Teknik Penilaian --}}
                                <td class="p-2 border border-black align-top">
                                    <p class="font-bold text-xs mb-1">Kriteria Penilaian:</p>
                                    {!! nl2br(e($topic->kriteriaPenilaian->pluck('nama_kriteria_penilaian')->implode(', '))) !!}
                                    <p class="font-bold text-xs mt-6 mb-1">Teknik Penilaian:</p>
                                    {!! nl2br(e($topic->teknikPenilaianFormatted)) !!}
                                </td>

                                {{-- (6) Pokok Bahasan --}}
                                <td class="p-2 border border-black align-top break-words">
                                    {!! nl2br(e($topic->materi_pembelajaran)) !!}
                                </td>

                                <td class="align-top">Case Based Learnin (CBL) hardcoded</td>

                                {{-- Luring (5) Metode Pembelajaran --}}
                                <td class="p-2 border border-black align-top">
                                    <div>
                                        <p class="font-bold">TM</p>
                                        {{-- <div>
                                            <p class="underline underline-offset-2">Bentuk Pembelajaran</p>
                                            <p>Kuliah</p>
                                        </div> --}}

                                        <div>
                                            <p class="underline underline-offset-2">Metode Pembelajaran</p>
                                            <ul class="list-disc list-inside">
                                                @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','TM')?->metodePembelajaran ?? [] as $metode)
                                                    <li>{{$metode->nama_metode_pembelajaran}}</li>
                                                @empty
                                                    <p>-</p> 
                                                @endforelse
                                            </ul>
                                        </div>
                                        
                                        <div>
                                            <p class="underline underline-offset-2">Penugasan Mahasiswa</p>
                                             @if ($topic->aktivitasPembelajaran->firstWhere('tipe','TM'))
                                                <p>{{$topic->aktivitasPembelajaran->firstWhere('tipe','TM')?->penugasan_mahasiswa}}</p>
                                            @else
                                                <p>-</p>
                                            @endif
                                        </div>
                                    </div>

                                    <br>


                                </td>

                                {{-- Daring (6) Metode Pembelajaran --}}
                                <td class="p-2 border border-black align-top">
                                    {{-- <div>
                                        <p class="font-bold">PT</p>
                                        <p class="underline underline-offset-2">Bentuk Pembelajaran</p>
                                        <p>Penugasan Terstruktur</p>

                                        <p class="underline underline-offset-2">Metode Pembelajaran</p>
                                            <ul class="list-disc list-inside">
                                                @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','PT')?->metodePembelajaran ?? [] as $item)
                                                    <li>{{$item->nama_metode_pembelajaran}}</li>
                                                @empty
                                                    <p>-</p>
                                                @endforelse
                                            </ul>

                                        <p class="underline underline-offset-2">Penugasan Mahasiswa</p>
                                        @if ($topic->aktivitasPembelajaran->firstWhere('tipe','PT'))
                                            <p>{{$topic->aktivitasPembelajaran->firstWhere('tipe','PT')?->penugasan_mahasiswa}}</p>
                                        @else
                                            <p>-</p>
                                        @endif
                                    </div> --}}
                                    <div>
                                        <p class="font-bold">BM</p>
                                        {{-- <div>
                                            <p class="underline underline-offset-2">Bentuk Pembelajaran</p>
                                            <p>Belajar Mandiri</p>
                                        </div> --}}
                                        
                                        <div>
                                            <p class="underline underline-offset-2">Metode Pembelajaran</p>
                                            <ul class="list-disc list-inside">
                                                @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','BM')?->metodePembelajaran ?? [] as $item)
                                                    <li>{{$item->nama_metode_pembelajaran}}</li>
                                                @empty
                                                    <p>-</p>
                                                @endforelse
                                            </ul>
                                        </div>

                                        <div>
                                            <p class="underline underline-offset-2">Penugasan Mahasiswa</p>
                                            @if ($topic->aktivitasPembelajaran->firstWhere('tipe','BM'))
                                                <p>{{$topic->aktivitasPembelajaran->firstWhere('tipe','BM')?->penugasan_mahasiswa}}</p>
                                            @else
                                                <p>-</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                
                                {{-- (10) Refrensi --}}
                                <td class="p-2 border border-black text-center align-top">
                                    {{$topic->refrensi}}
                                </td>

                            @else
                                <td colspan="9" class="text-center bg-[#9cc2e4] font-bold">{{$topic->tipe == 'uts' ? 'UJIAN TENGAH SEMESTER' : 'UJIAN AKHIR SEMESTER'}}</td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="p-4 text-center border border-black">Rencana mingguan belum diisi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> 
</body>
</html>