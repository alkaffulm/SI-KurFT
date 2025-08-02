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




        {{-- SECTION 1: KOP SURAT & INFO UTAMA --}}
        <div class="border-2 border-black bg-[#ffd966]">
            {{-- Baris Header --}}
            <div class="flex border-b-2 border-black">
                <div class="w-1/4 p-4 flex items-center justify-center border-r-2 border-black">
                    {{-- Ganti dengan path logo Anda --}}
                    <img src="{{asset('images/logo ulm 1.png')}}" alt="Logo Universitas" class="h-20">
                </div>
                <div class="w-1/2 p-4 text-center">
                    <h1 class="font-bold text-lg">UNIVERSITAS LAMBUNG MANGKURAT</h1>
                    <h2 class="font-bold text-md">FAKULTAS TEKNIK</h2>
                    <h3 class="font-bold text-md">PROGRAM STUDI {{ strtoupper($rps->programStudi->nama_prodi) }}</h3>
                </div>
                <div class="w-1/4 p-4 border-l-2 border-black">
                    <p class="font-bold">Kode Dokumen</p>
                </div>
            </div>
            {{-- Baris Judul RPS --}}
            <div class="p-2 text-center  border-b-2 border-black">
                <h2 class="font-bold">RENCANA PEMBELAJARAN SEMESTER</h2>
            </div>
            {{-- Baris Info Detail MK --}}
            <div class="grid grid-cols-12 bg-[#9cc2e4] text-sm">
                <div class="col-span-3 p-2 border-r border-black"><strong>MATA KULIAH (MK)</strong><br>{{ $rps->mataKuliah->nama_matkul_id }}</div>
                <div class="col-span-1 p-2 border-r border-black"><strong>KODE</strong><br>{{ $rps->mataKuliah->kode_mk }}</div>
                <div class="col-span-3 p-2 border-r border-black"><strong>BAHAN KAJIAN (BK)</strong><br>{{ $rps->bahanKajian->nama_bk_id }}</div>
                <div class="col-span-2 p-2 border-r border-black"><strong>BOBOT (sks)</strong><br>T={{ $rps->mataKuliah->sks_teori }} P={{ $rps->mataKuliah->sks_praktikum }}</div>
                <div class="col-span-1 p-2 border-r border-black"><strong>SEMESTER</strong><br>{{ $rps->mataKuliah->semester }}</div>
                <div class="col-span-2 p-2"><strong>Tgl Penyusunan</strong><br>{{ $rps->tanggal_disusun }}</div>
            </div>
        </div>

        {{-- SECTION 2: PENGESAHAN --}}
        <div class="border-2 border-black  border-t-0 text-sm">
            <div class="grid grid-cols-12 bg-[#9cc2e4]">
                <div class="col-span-3 row-span-2 p-2 bg-white border-r border-black flex items-center"><strong>PENGESAHAN</strong></div>
                <div class="col-span-3 p-2 border-r border-black"><strong>Dosen Pengembang RPS</strong></div>
                <div class="col-span-3 p-2 border-r border-black"><strong>Koordinator BK</strong></div>
                <div class="col-span-3 p-2"><strong>Koordinator Program Studi</strong></div>
            </div>
            <div class="grid grid-cols-12 h-24">
                <div class="col-span-3 row-span-2 p-2 border-r border-black "></div>
                <div class="col-span-2 row-span-2 p-2 border-r  border-t border-black ">{{ $rps->dosenPenyusun->NIP }}</div>
                <div class="col-span-4 row-span-2 p-2 border-r border-t border-black">{{-- Data Koordinator BK --}}</div>
                <div class="col-span-3 row-span-2 p-2  border-black">KAP7001</div>
            </div>
        </div>

        {{-- SECTION 3: CAPAIAN PEMBELAJARAN --}}
        <div class="border-2 border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-2  p-2 border-r border-black flex items-center"><strong>CAPAIAN PEMBELAJARAN</strong></div>
                <div class="col-span-10 p-2 border-b bg-[#9cc2e4] border-black "><strong>CPL-PRODI yang dibebankan pada MK</strong></div>
            </div>
            {{-- Loop untuk CPL --}}
            @foreach($rps->cpls as $cpl)
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2 p-2 border-r border-black text-center font-bold"></div>
                <div class="col-span-1 p-2 border-b border-r border-black text-center font-bold">{{ $cpl->nama_kode_cpl }}</div>
                <div class="col-span-9 p-2 border-b  border-black">{{ $cpl->desc_cpl_id }}</div>
            </div>
            @endforeach
            
            {{-- Loop untuk CPMK --}}
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2 row-span-3 p-2 border-r border-black flex items-center"></div>
                <div class="col-span-10 col-start-3 p-2 border-b  border-black bg-[#9cc2e4]"><strong>Capaian Pembelajaran Mata Kuliah (CPMK)</strong></div>
            </div>
            @foreach($rps->mataKuliah->cpmks as $cpmk)
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2 p-2 border-r border-black text-center font-bold"></div>
                <div class="col-span-1 p-2 border-b border-r border-black text-center font-bold">{{ $cpmk->nama_kode_cpmk }}</div>
                <div class="col-span-9 p-2 border-b  border-black">{{ $cpmk->desc_cpmk_id }}</div>
            </div>
            @endforeach
            
            {{-- Loop untuk Sub-CPMK --}}
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2 row-span-3 p-2 border-r border-black flex items-center"></div>
                <div class="col-span-10 col-start-3 p-2 bg-[#9cc2e4]"><strong>Kemampuan akhir tiap tahapan belajar (Sub-CPMK)</strong></div>
            </div>
            @foreach($rps->mataKuliah->cpmks as $cpmk)
                @foreach ($cpmk->subCpmk as $sc )
                    <div class="grid grid-cols-12  border-black">
                        <div class="col-span-2 p-2 border-r border-black text-center font-bold"></div>
                        <div class="col-span-1 p-2 border-r border-b border-black text-center font-bold">{{ $sc->nama_kode_sub_cpmk }}</div>
                        <div class="col-span-9 p-2  border-b border-black">{{ $sc->desc_sub_cpmk_id }}</div>
                    </div>   
                @endforeach
            @endforeach
            
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2 row-span-3 p-2 border-r border-black flex items-center"></div>
                <div class="col-span-10 col-start-3 p-2 bg-[#9cc2e4]"><strong>Korelasi CPMK terhadap CPL</strong></div>
            </div>
            <div class="grid grid-cols-12  border-black">
                <div class="col-span-2 row-span-3 p-2 border-r border-black flex items-center"></div>
                <div class="col-span-10">
                    <table class="w-full text-sm">
                        <thead>
                            <tr>
                                <th class="p-2 border-r border-black">Kode CPMK</th>
                                <th class="p-2 row-span-1 border-r border-black">Kode CPL</th>
                                @foreach ($rps->cpls as $cpl )
                                    <th class="p-2 border-r border-black">{{ $cpl->nama_kode_cpl }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rps->mataKuliah->cpmks as $cpmk)
                                <tr class="border-t border-black">
                                    <td class="p-2 border-r border-black font-bold">{{$cpmk->nama_kode_cpmk}}</td>
                                    @foreach ($rps->cpls as $cpl )
                                        <td class="p-2 border-r border-black text-center">
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
            {{-- ... tambahkan bagian Sub-CPMK dan Korelasi di sini jika perlu ... --}}
        </div>

        {{-- SECTION 4: DESKRIPSI, PUSTAKA, DLL. --}}
        <div class="border-2 border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-2 p-2 border-r border-black"><strong>Deskripsi Singkat MK</strong></div>
                <div class="col-span-10 p-2">{{ $rps->mataKuliah->matkul_desc_id }}</div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 p-2 border-r border-black"><strong>Materi Pembelajaran</strong></div>
                <div class="col-span-10 p-2">{!! nl2br(e($rps->materi_pembelajaran)) !!}</div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 p-2 border-r border-black"><strong>Pustaka</strong></div>
                <div class="col-span-10 p-2">
                    <strong>Utama:</strong><br>
                    {!! nl2br(e($rps->pustaka_utama)) !!}<br><br>
                    <strong>Pendukung:</strong><br>
                    {!! nl2br(e($rps->pustaka_pendukung)) !!}
                </div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 p-2 border-r border-black"><strong>Dosen Pengampu</strong></div>
                <div class="col-span-10 p-2">{{ $rps->dosenPenyusun->NIP    }}</div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 p-2 border-r border-black"><strong>Matakuliah Syarat</strong></div>
                <div class="col-span-10 p-2">
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
            <table class="w-full text-sm border-2 border-black">
                <thead class="text-xs text-gray-700 uppercase bg-[#9cc2e4]">
                    <tr class="border-b-2 border-black">
                        <th class="p-2 border-x-2 border-black align-top">Minggu Ke-</th>
                        <th class="p-2 border-x-2 border-black align-top">Kemampuan akhir tiap tahapan belajar (Sub-CPMK)</th>
                        <th class="p-2 border-x-2 border-black align-top">Indikator</th>
                        <th class="p-2 border-x-2 border-black align-top">Kriteria & Teknik Penilaian</th>
                        <th class="p-2 border-x-2 border-black align-top">Bentuk Pembelajaran; Metode Pembelajaran; Penugasan Mahasiswa</th>
                        <th class="p-2 border-x-2 border-black align-top">Materi Pembelajaran [Pustaka/Referensi]</th>
                        <th class="p-2 border-x-2 border-black align-top">Bobot Penilaian (%)</th>
                    </tr>
                    <tr class="border-b-2 border-black text-center">
                        <th class="p-1 border-x-2 border-black">(1)</th>
                        <th class="p-1 border-x-2 border-black">(2)</th>
                        <th class="p-1 border-x-2 border-black">(3)</th>
                        <th class="p-1 border-x-2 border-black">(4)</th>
                        <th class="p-1 border-x-2 border-black">(5)</th>
                        <th class="p-1 border-x-2 border-black">(6)</th>
                        <th class="p-1 border-x-2 border-black">(7)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rps->topics as $topic)
                        <tr class="bg-white border-b border-black">
                            {{-- (1) Minggu Ke- --}}
                            {{-- Mengambil semua minggu dari relasi, mengurutkan, dan menggabungkannya dengan koma --}}
                            <td class="p-2 border-x-2 border-black text-center align-top font-semibold">
                                {{ $topic->weeks->pluck('minggu_ke')->sort()->implode(', ') }}
                            </td>
                            
                            {{-- (2) Sub-CPMK --}}
                            <td class="p-2 border-x-2 border-black align-top">
                                @if($topic->subCpmk)
                                    {{ $topic->subCpmk->desc_sub_cpmk_id }}
                                @else
                                    -
                                @endif
                            </td>

                            {{-- (3) Indikator --}}
                            <td class="p-2 border-x-2 border-black align-top">
                                {!! nl2br(e($topic->indikator)) !!}
                            </td>

                            {{-- (4) Kriteria & Teknik Penilaian --}}
                            <td class="p-2 border-x-2 border-black align-top">
                                {!! nl2br(e($topic->kriteria_teknik_penilaian)) !!}
                            </td>

                            {{-- (5) Metode Pembelajaran --}}
                            <td class="p-2 border-x-2 border-black align-top">
                                {!! nl2br(e($topic->metode_pembelajaran)) !!}
                            </td>

                            {{-- (6) Materi Pembelajaran --}}
                            <td class="p-2 border-x-2 border-black align-top">
                                {!! nl2br(e($topic->materi_pembelajaran)) !!}
                            </td>

                            {{-- (7) Bobot Penilaian --}}
                            <td class="p-2 border-x-2 border-black text-center align-top">
                                {{ $topic->bobot_penilaian }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center border-x-2 border-black">Rencana mingguan belum diisi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> 
</body>
</html>