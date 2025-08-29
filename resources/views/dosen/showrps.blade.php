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

        <div>
            <a href="/dosen/matkul">Kembali</a>
            <div class="flex justify-end gap-4">
                {{-- Tombol Aksi di Kanan Atas --}}
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
        <div class="border border-black bg-[#ffd966]">
            <div class="flex  border-black">
                <div class="w-1/4  flex items-center justify-center border-r border-b border-black">
                    <img src="{{asset('images/logo ulm 1.png')}}" alt="Logo Universitas" class="h-20">
                </div>
                <div class="w-1/2  text-center border-b border-black">
                    <h1 class="font-bold text-lg">UNIVERSITAS LAMBUNG MANGKURAT</h1>
                    <h2 class="font-bold text-md">FAKULTAS TEKNIK</h2>
                    <h3 class="font-bold text-md">PROGRAM STUDI {{ strtoupper($rps->programStudi->nama_prodi) }}</h3>
                </div>
                <div class="w-1/4 text-center border-l border-b border-black">
                    <p class="font-bold">Kode Dokumen</p>
                    @if($rps->jumlah_revisi > 0)
                        <p>Revisi ke-{{$rps->jumlah_revisi}}</p>
                        <p>Tanggal: {{$rps->tanggal_revisi}}</p>
                    @else
                        <p>Belum ada revisi</p>
                    @endif
                </div>
            </div>
            {{-- Baris Judul RPS --}}
            <div class=" text-center  border-b border-black">
                <h2 class="font-bold">RENCANA PEMBELAJARAN SEMESTER</h2>
            </div>
            {{-- Baris Info Detail MK --}}
            <div>
                <div class="grid grid-cols-12 bg-[#9cc2e4] text-sm">
                    <div class="col-span-3 px-2 border-r border-black font-bold">MATA KULIAH (MK)</div>
                    <div class="col-span-1 px-2 border-r border-black font-bold">KODE</div>
                    <div class="col-span-3 px-2 border-r border-black font-bold">BAHAN KAJIAN (BK)</div>
                    <div class="col-span-2 px-2 border-r border-b border-black font-bold">BOBOT (sks)<br></div>
                    <div class="col-span-1 px-2 border-r border-b border-black font-bold">SEMESTER</div>
                    <div class="col-span-2 px-2 border-b border-black font-bold">Tgl Penyusunan</div>
                </div>
                <div class="grid grid-cols-12 bg-[#9cc2e4]">
                    <div class="col-span-3 px-2 border-r border-black">{{ $rps->mataKuliah->nama_matkul_id }}</div>
                    <div class="col-span-1 px-2 border-r border-black">{{ $rps->mataKuliah->kode_mk }}</div>
                    <div class="col-span-3 px-2 border-r border-black">
                        @foreach ($rps->mataKuliah->bahanKajian as $bk)
                            {{$bk->nama_bk_id}}
                        @endforeach
                    </div>
                    <div class="col-span-2 border-r border-black">
                        <div class="grid grid-cols-2  bg-white">
                            <div class="pb-6 text-center border-r border-black">T={{ $rps->mataKuliah->sks_teori }}</div>
                            <div class="pb-6 text-center">P={{ $rps->mataKuliah->sks_praktikum }}</div>
                        </div>
                    </div>
                    <div class="col-span-1 px-2 text-center border-r border-black bg-white">{{ $rps->mataKuliah->semester }}</div>
                    <div class="col-span-2 px-2 text-center border-black bg-white">{{ $rps->tanggal_disusun->translatedFormat('d F Y') }}</div>
                </div>
            </div>
        </div>

        {{-- SECTION 2: PENGESAHAN, DOSEN PENGEMBANG, BAHAN KAJIAN, BOBOT, SEMESTER, TGL PENYUSUNAN --}}
        <div class="border border-black  border-t-0 text-sm">
            <div class="grid grid-cols-12 bg-[#9cc2e4]">
                <div class="col-span-3 px-2 bg-white border-r border-black flex items-center font-bold">PENGESAHAN</div>
                <div class="col-span-3 px-2 border-r border-black font-bold">Dosen Pengembang RPS</div>
                <div class="col-span-3 px-2 border-r border-black font-bold">Koordinator BK</div>
                <div class="col-span-3 px-2 font-bold">Koordinator Program Studi</div>
            </div>
            <div class="grid grid-cols-12 h-24">
                <div class="col-span-3 row-span-2 px-2 border-r border-black "></div>
                <div class="col-span-3 row-span-2 px-2 border-r  border-t border-black grid items-end">{{ $rps->dosenPenyusun->username }}</div>
                <div class="col-span-3 row-span-2 px-2 border-r border-t border-black"></div>
                <div class="col-span-3 row-span-2 px-2  border-black grid items-end">{{$rps->kaprodi?->username ?? 'Kaprodi tidak ditemukan'}}</div>
            </div>
        </div>

        {{-- SECTION 3: CAPAIAN PEMBELAJARAN, CPL, CPMK, SUB-CPMK, TABEL KORELASI CPLCPMK --}}
        <div class="border border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-2 px-2 border-r border-black flex items-center font-bold">CAPAIAN PEMBELAJARAN</div>
                <div class="col-span-4 px-2 border-b border-r bg-[#9cc2e4] border-black font-bold">CPL-PRODI yang dibebankan pada MK</div>
                <div class="col-span-6 px-2 border-b  border-black "></div>
            </div>
            {{-- Loop untuk CPL --}}
            @foreach($assocCpls as $cpl)
                <div class="grid grid-cols-12  border-black">
                    <div class="col-span-2 px-2 border-r border-black text-center font-bold"></div>
                    <div class="col-span-1 px-2 border-b border-r border-black text-center ">{{ $cpl->nama_kode_cpl }}</div>
                    <div class="col-span-9 px-2 border-b  border-black text-sm/6">{{ $cpl->desc_cpl_id }}</div>
                </div>
            @endforeach
            
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2  px-2 border-r border-black"></div>
                <div class="col-span-4  px-2 border-b border-r border-black bg-[#9cc2e4] font-bold">Capaian Pembelajaran Mata Kuliah (CPMK)</div>
                <div class="col-span-6  px-2 border-b  border-black "></div>
            </div>
            {{-- Loop untuk CPMK --}}
            @foreach($rps->mataKuliah->cpmks as $cpmk)
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2 px-2 border-r border-black text-center font-bold"></div>
                <div class="col-span-1 px-2 border-b border-r border-black text-center ">{{ $cpmk->nama_kode_cpmk }}</div>
                <div class="col-span-9 px-2 border-b  border-black text-sm/6">{{ $cpmk->desc_cpmk_id }}</div>
            </div>
            @endforeach
            
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2 row-span-3 px-2 border-r border-black flex items-center"></div>
                <div class="col-span-4 col-start-3 px-2 border-r border-b border-black bg-[#9cc2e4] font-bold">Kemampuan akhir tiap tahapan belajar (Sub-CPMK)</div>
                <div class="col-span-6  px-2 border-b  border-black "></div>            
            </div>
            {{-- Loop untuk Sub-CPMK --}}
            @foreach($rps->mataKuliah->cpmks as $cpmk)
                @foreach ($cpmk->subCpmk as $sc )
                    <div class="grid grid-cols-12  border-black">
                        <div class="col-span-2 px-2 border-r border-black text-center font-bold"></div>
                        <div class="col-span-1 px-2 border-r border-b border-black text-center ">{{ $sc->nama_kode_sub_cpmk }}</div>
                        <div class="col-span-9 px-2  border-b border-black text-sm/6">{{ $sc->desc_sub_cpmk_id }}</div>
                    </div>   
                @endforeach
            @endforeach
            
            <div class="grid grid-cols-12  border-black">
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
                                @foreach ($assocCpls as $cpl )
                                    <th class="px-2 border-r border-black">{{ $cpl->nama_kode_cpl }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rps->mataKuliah->cpmks as $cpmk)
                                <tr class="border-t border-black">
                                    <td class="px-2 border-r border-black ">{{$cpmk->nama_kode_cpmk}}</td>
                                    @foreach ($rps->cpls as $cpl )
                                        <td class="px-2 border-r border-black text-center">
                                            @if ($cpmk->cpl->contains($cpl))
                                                ✓
                                            @endif
                                        </td>
                                    @endforeach
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- SECTION 4: DESKRIPSI, PUSTAKA, BAHAN KAJIAN, DOSEN PENGAMPU, MATAKULIAH SYARAT --}}
        <div class="border border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-2 p-2 border-r border-black font-bold">Deskripsi Singkat MK</div>
                <div class="col-span-10 p-2">{{ $rps->mataKuliah->matkul_desc_id }}</div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 p-2 border-r border-black font-bold">Bahan Kajian: <br>Materi Pembelajaran</div>
                <div class="col-span-10 p-2">{!! nl2br(e($rps->materi_pembelajaran)) !!}</div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 px-2 border-r border-black font-bold">Pustaka</div>
                <div class="col-span-1 px-2 font-bold bg-[#e7e6e6] border-b border-r border-black">Utama:</div>
                <div class="col-span-9 px-2 border-b border-black"></div>
            </div>
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2  border-r border-black"></div>
                <div class="col-span-10 px-2">{!! nl2br(e($rps->pustaka_utama)) !!}</div>
            </div>
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2 px-2 border-r border-black font-bold"></div>
                <div class="col-span-1 px-2 font-bold bg-[#e7e6e6] border-b border-r border-t border-black">Pendukung:</div>
                <div class="col-span-9 px-2 border-b border-black"></div>
            </div>
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2  border-r border-black"></div>
                <div class="col-span-10 px-2">{!! nl2br(e($rps->pustaka_pendukung)) !!}</div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 px-2 border-r border-black font-bold">Dosen Pengampu</div>
                <div class="col-span-10 px-2">{{ $rps->dosenPenyusun->username    }}</div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 px-2 border-r border-black font-bold">Matakuliah Syarat</div>
                <div class="col-span-10 px-2">
                    @forelse($rps->mataKuliahSyarat as $mk_syarat)
                        {{ $mk_syarat->nama_matkul_id }} <br>
                    @empty
                        -
                    @endforelse
                </div>
            </div>
        </div>

        {{-- SECTION 5: RENCANA MINGGUAN --}}
        <div>
            <table class="w-full text-sm border border-black">
                <thead class="text-xs text-gray-700  bg-[#9cc2e4]">
                    <tr class="border border-black">
                        <th class="p-2 border border-black align-top text-[14px]">Minggu Ke-</th>
                        <th class="p-2 border border-black align-top text-[14px]">Kemampuan akhir tiap tahapan belajar (Sub-CPMK)</th>
                        <th class="p-2 border border-black align-top text-[14px]">Indikator</th>
                        <th class="p-2 border border-black align-top text-[14px]">Kriteria & Teknik </th>
                        <th class="p-2 border border-black align-top text-[14px]" colspan="2">Bentuk Pembelajaran; Metode Pembelajaran; Penugasan Mahasiswa [Estimasi Waktu]</th>
                        <th class="p-2 border border-black align-top text-[14px]">Materi Pembelajaran [Pustaka/Referensi]</th>
                        <th class="p-2 border border-black align-top text-[14px]">Bobot Penilaian (%)</th>
                    </tr>
                    <tr class="border border-black text-center">
                        <th class="p-1 border border-black">(1)</th>
                        <th class="p-1 border border-black">(2)</th>
                        <th class="p-1 border border-black">(3)</th>
                        <th class="p-1 border border-black">(4)</th>
                        <th class="p-1 border border-black">Luring (5)</th>
                        <th class="p-1 border border-black">Daring (6)</th>
                        <th class="p-1 border border-black">(7)</th>
                        <th class="p-1 border border-black">(8)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rps->topics as $topic)
                        <tr class="bg-white border-b border-black">
                            {{-- (1) Minggu Ke- --}}
                            {{-- Mengambil semua minggu dari relasi, mengurutkan, dan menggabungkannya dengan koma --}}
                            <td class="p-2 border border-black text-center align-top font-semibold">
                                {{ $topic->weeks->pluck('minggu_ke')->sort()->implode(', ') }}
                            </td>
                            @if ($topic->tipe == 'topik')
                                {{-- (2) Sub-CPMK --}}
                                <td class="p-2 border border-black align-top">
                                    @if($topic->subCpmk)
                                        <p class="font-bold">{{ $topic->subCpmk->nama_kode_sub_cpmk}}</p>
                                        {{ $topic->subCpmk->desc_sub_cpmk_id }}
                                    @else
                                        -
                                    @endif
                                </td>

                                {{-- (3) Indikator --}}
                                <td class="p-2 border border-black align-top">
                                    {!! nl2br(e($topic->indikator)) !!}
                                </td>

                                {{-- (4) Kriteria & Teknik Penilaian --}}
                                <td class="p-2 border border-black align-top">
                                    <p class="font-bold text-xs mb-1">Kriteria Penilaian:</p>
                                    {!! nl2br(e($topic->kriteriaPenilaian->pluck('nama_kriteria_penilaian')->implode(', '))) !!}
                                    <p class="font-bold text-xs mt-6 mb-1">Teknik Penilaian:</p>
                                    {!! nl2br(e($topic->teknikPenilaianFormatted)) !!}
                                </td>

                                {{-- Luring (5) Metode Pembelajaran --}}
                                <td class="p-2 border border-black align-top">
                                    {!! nl2br(e($topic->metode_pembelajaran)) !!}
                                </td>

                                {{-- Daring (6) Metode Pembelajaran --}}
                                <td></td>

                                {{-- (7) Materi Pembelajaran --}}
                                <td class="p-2 border border-black align-top">
                                    {!! nl2br(e($topic->materi_pembelajaran)) !!}
                                </td>
                            @else
                                <td colspan="6" class="text-center bg-[#9cc2e4] font-bold">{{$topic->tipe == 'uts' ? 'UJIAN TENGAH SEMESTER' : 'UJIAN AKHIR SEMESTER'}}</td>
                            @endif
                            {{-- (8) Bobot Penilaian --}}
                            <td class="p-2 border border-black text-center align-top">
                                {{ $topic->bobot_penilaian }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-4 text-center border border-black">Rencana mingguan belum diisi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> 
</body>
</html>