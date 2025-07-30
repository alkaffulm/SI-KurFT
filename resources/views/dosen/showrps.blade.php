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
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])
    <div class="py-8 px-16 sm:ml-64">

        {{-- Tombol Aksi di Kanan Atas --}}
        <div class="flex justify-end mb-4">
            <a href="{{-- route('rps.edit', $rps) --}}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                Edit RPS
            </a>
            {{-- Tambahkan tombol Download PDF di sini nanti --}}
        </div>

        {{-- SECTION 1: KOP SURAT & INFO UTAMA --}}
        <div class="border-2 border-black">
            {{-- Baris Header --}}
            <div class="flex border-b-2 border-black">
                <div class="w-1/4 p-4 flex items-center justify-center border-r-2 border-black">
                    {{-- Ganti dengan path logo Anda --}}
                    <img src="https://placehold.co/100x100?text=Logo" alt="Logo Universitas" class="h-20">
                </div>
                <div class="w-1/2 p-4 text-center">
                    <h1 class="font-bold text-lg">UNIVERSITAS LAMBUNG MANGKURAT</h1>
                    <h2 class="font-bold text-md">FAKULTAS TEKNIK</h2>
                    <h3 class="font-bold text-md">PROGRAM STUDI {{ strtoupper($rps->programStudi->nama_prodi) }}</h3>
                </div>
                <div class="w-1/4 p-4 border-l-2 border-black">
                    <div class="border border-black p-2">
                        <p class="font-bold">Kode Dokumen</p>
                        <p class="mt-2">-</p>
                    </div>
                </div>
            </div>
            {{-- Baris Judul RPS --}}
            <div class="p-2 text-center bg-gray-200 border-b-2 border-black">
                <h2 class="font-bold">RENCANA PEMBELAJARAN SEMESTER</h2>
            </div>
            {{-- Baris Info Detail MK --}}
            <div class="grid grid-cols-12 text-sm">
                <div class="col-span-3 p-2 border-r border-black"><strong>MATA KULIAH (MK)</strong><br>{{ $rps->mataKuliah->nama_matkul_id }}</div>
                <div class="col-span-1 p-2 border-r border-black"><strong>KODE</strong><br>{{ $rps->mataKuliah->kode_mk }}</div>
                <div class="col-span-3 p-2 border-r border-black"><strong>BAHAN KAJIAN (BK)</strong><br>{{ $rps->bahanKajian->nama_bk_id }}</div>
                <div class="col-span-2 p-2 border-r border-black"><strong>BOBOT (sks)</strong><br>T={{ $rps->mataKuliah->sks_teori }} P={{ $rps->mataKuliah->sks_praktikum }}</div>
                <div class="col-span-1 p-2 border-r border-black"><strong>SEMESTER</strong><br>{{ $rps->mataKuliah->semester }}</div>
                <div class="col-span-2 p-2"><strong>Tgl Penyusunan</strong><br>{{ $rps->tanggal_disusun->format('d M Y') }}</div>
            </div>
        </div>

        {{-- SECTION 2: PENGESAHAN --}}
        <div class="border-2 border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-2 row-span-2 p-2 border-r border-black flex items-center"><strong>PENGESAHAN</strong></div>
                <div class="col-span-3 p-2 border-r border-black"><strong>Dosen Pengembang RPS</strong></div>
                <div class="col-span-3 p-2 border-r border-black"><strong>Koordinator BK</strong></div>
                <div class="col-span-4 p-2"><strong>Koordinator Program Studi</strong></div>
            </div>
            <div class="grid grid-cols-12 h-24">
                <div class="col-span-3 p-2 border-r border-black border-t border-black">{{ $rps->dosenPenyusun->name }}</div>
                <div class="col-span-3 p-2 border-r border-black border-t border-black">{{-- Data Koordinator BK --}}</div>
                <div class="col-span-4 p-2 border-t border-black">{{-- Data Kaprodi --}}</div>
            </div>
        </div>

        {{-- SECTION 3: CAPAIAN PEMBELAJARAN --}}
        <div class="border-2 border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-2 row-span-3 p-2 border-r border-black flex items-center"><strong>CAPAIAN PEMBELAJARAN</strong></div>
                <div class="col-span-10 p-2 bg-gray-200"><strong>CPL-PRODI yang dibebankan pada MK</strong></div>
            </div>
            {{-- Loop untuk CPL --}}
            @foreach($rps->cpls as $cpl)
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 p-2 border-r border-black text-center font-bold">{{ $cpl->nama_kode_cpl }}</div>
                <div class="col-span-10 p-2">{{ $cpl->desc }}</div>
            </div>
            @endforeach
            
            {{-- Loop untuk CPMK --}}
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-10 col-start-3 p-2 bg-gray-200"><strong>Capaian Pembelajaran Mata Kuliah (CPMK)</strong></div>
            </div>
            @foreach($rps->mataKuliah->cpmks as $cpmk)
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-2 p-2 border-r border-black text-center font-bold">{{ $cpmk->nama_kode_cpmk }}</div>
                <div class="col-span-10 p-2">{{ $cpmk->desc_cpmk_id }}</div>
            </div>
            @endforeach
            
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
                <div class="col-span-10 p-2">{{ $rps->dosenPenyusun->name }}</div>
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
        <div class="mt-8">
            <h2 class="font-bold text-lg mb-2">Rencana Pembelajaran Mingguan</h2>
            <table class="w-full text-sm border-2 border-black">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr class="border-b-2 border-black">
                        <th class="p-2 border-x-2 border-black">Mg Ke-</th>
                        <th class="p-2 border-x-2 border-black">Kemampuan Akhir (Sub-CPMK)</th>
                        <th class="p-2 border-x-2 border-black">Materi Pembelajaran</th>
                        <th class="p-2 border-x-2 border-black">Metode Pembelajaran</th>
                        <th class="p-2 border-x-2 border-black">Bobot (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rps->details as $detail)
                        <tr class="bg-white border-b border-black">
                            <td class="p-2 border-x-2 border-black text-center">{{ $detail->minggu_ke }}</td>
                            <td class="p-2 border-x-2 border-black">
                                @if($detail->subCpmk)
                                    <strong>{{ $detail->subCpmk->nama_kode_sub_cpmk }}:</strong> {{ $detail->subCpmk->desc_sub_cpmk_id }}
                                @endif
                            </td>
                            <td class="p-2 border-x-2 border-black">{!! nl2br(e($detail->materi_pembelajaran)) !!}</td>
                            <td class="p-2 border-x-2 border-black">{!! nl2br(e($detail->metode_pembelajaran)) !!}</td>
                            <td class="p-2 border-x-2 border-black text-center">{{ $detail->bobot_penilaian }}%</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center">Rencana mingguan belum diisi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> 
</body>
</html>