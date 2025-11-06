@php
    // --- (1) UNTUK MEMUAT CSS VITE (TAILWIND) SECARA INLINE ---
    $manifestPath = public_path('build/manifest.json');
    $cssFile = '';

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);
        if (isset($manifest['resources/css/app.css']['file'])) {
            $cssFilePath = public_path('build/' . $manifest['resources/css/app.css']['file']);
            if (file_exists($cssFilePath)) {
                $cssFile = file_get_contents($cssFilePath);
            }
        }
    }

    // --- (2) UNTUK MEMUAT GAMBAR LOGO SECARA BASE64 ---
    $logoPath = public_path('images/LOGO ULM.png');
    $logoType = pathinfo($logoPath, PATHINFO_EXTENSION);
    $logoData = file_get_contents($logoPath);
    $logoBase64 = 'data:image/' . $logoType . ';base64,' . base64_encode($logoData);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPS {{ $rps->mataKuliah?->nama_matkul_id ?? 'Error' }}</title>
    
    <style>
        {!! $cssFile !!}

        /* ===== PERBAIKAN  KUSTOM UNTUK PDF ===== */
        .pdf-table {
            -collapse: separate !important; /* Memaksa mode  terpisah */
            -spacing: 0 !important; /* Menghilangkan celah antar sel */
        }
        
        /* Memaksa SETIAP sel untuk memiliki  1px solid hitam di semua sisi */
        .pdf-table th,
        .pdf-table td {
            : 1px solid #000 !important; 
        }
        /* ===== AKHIR PERBAIKAN  ===== */
    </style>
</head>
<body class="font-serif">
    
    {{-- KONTEN PDF DIMULAI DARI SINI --}}
    <div class="border border-black">
        {{-- SECTION 1: KOP SURAT & INFO MATA KULIAH  --}}
        <div class=" bg-[#9cc2e4]">
            <div class="flex border-b border-black">
                <div class="w-1/4 flex items-center justify-center ">
                    <img src="{{ $logoBase64 }}" alt="Logo Universitas" class="h-20">
                </div>
                <div class="w-1/2 text-center border-l border-black ">
                    <h1 class="font-bold text-lg ">UNIVERSITAS LAMBUNG MANGKURAT</h1>
                    <h2 class="font-bold text-md">FAKULTAS TEKNIK</h2>
                    <h3 class="font-bold text-md">PROGRAM STUDI {{ strtoupper($rps->programStudi->nama_prodi) }}</h3>
                </div>
                <div class="w-1/4 text-center ">
                    {{-- Info revisi --}}
                </div>
            </div>
            {{-- Baris Judul RPS --}}
            <div class="text-center  bg-[#f7cbac] border-b border-black">
                <h2 class="font-bold">RENCANA PEMBELAJARAN SEMESTER</h2>
            </div>
            {{-- Baris Info Detail MK --}}
            <div>
                <div class="grid grid-cols-12 bg-gray-300 text-[13px] border-b border-black">
                    <div class="col-span-1 px-2 border-r border-black  font-bold">Identitas Mata Kuliah</div>
                    <div class="col-span-3 px-2 border-r border-black  font-bold">Nama Mata Kuliah</div>
                    <div class="col-span-1 px-2 border-r border-black  font-bold">Kode MK</div>
                    <div class="col-span-2 px-2 border-r border-black font-bold">Rumpun MK</div>
                    <div class="col-span-2 px-2 border-r border-black font-bold">BOBOT (sks)<br></div>
                    <div class="col-span-1 px-2 border-r border-black font-bold">SEMESTER</div>
                    <div class="col-span-2 px-2  font-bold">Tgl Penyusunan</div>
                </div>
                <div class="grid grid-cols-12 bg-white text-[14px] border-b border-black">
                    <div class="col-span-1 px-2  border-r border-black"></div>
                    <div class="col-span-3 px-2  border-r border-black">
                        <p>{{ $rps->mataKuliah?->nama_matkul_id }}</p>
                        <p class="italic text-[#7397b6]">{{ $rps->mataKuliah?->nama_matkul_en }}</p>
                    </div>
                    <div class="col-span-1 px-2  border-r border-black">{{ $rps->mataKuliah?->kode_mk }}</div>
                    <div class="col-span-2 px-2  border-r border-black">
                        @foreach ($rps->mataKuliah?->bahanKajian ?? [] as $bk)
                            <p>{{$bk->nama_bk_id}}</p>
                            <p class="italic text-[#7397b6]">{{$bk->nama_bk_en}}</p>
                        @endforeach
                    </div>
                    <div class="col-span-2  border-r border-black">
                        <div class=" grid grid-cols-3 bg-white ">
                            <div class="pb-6 text-center  ">T ={{ $rps->mataKuliah?->sks_teori }}</div>
                            <div class="pb-6 border-l border-r border-black text-center  ">P ={{ $rps->mataKuliah?->sks_praktikum }}</div>
                            <div class="pb-6 text-center  ">Lap. = 0</div>
                        </div>
                    </div>
                    <div class="col-span-1 px-2 text-center border-r border-black bg-white">{{ $rps->mataKuliah?->semester }}</div>
                    <div class="col-span-2 px-2 text-center   bg-white">{{ $rps->tanggal_disusun?->translatedFormat('d F Y') }}</div>
                </div>
            </div>
        </div>
    
        {{-- SECTION 2: PENGESAHAN --}}
        <div class="border-b border-black text-[13px]">
            <div class="grid grid-cols-12 bg-gray-300">
                <div class="col-span-1 px-2 border-r border-b border-black bg-white    flex items-center font-bold">Otoritas</div>
                <div class="col-span-4 px-2 border-r border-b border-black   font-bold">Pengembang RPS</div>
                <div class="col-span-3 px-2 border-r border-b border-black   font-bold">Koordinator Mata Kuliah</div>
                <div class="col-span-4 px-2 border-b border-black  font-bold">Koordinator Program Studi</div>
            </div>
            <div class="border-b border-black grid grid-cols-12 h-24">
                <div class="col-span-1 px-2 border-r border-black "></div>
                <div class="col-span-4 px-2 border-r border-black    grid items-end">{{$rps->mataKuliah?->pengembangRps?->username ?? '...'}}</div>
                <div class="col-span-3 px-2 border-r border-black    grid items-end">{{ $rps->mataKuliah?->koordinatorMk?->username ?? '...'}}</div>
                <div class="col-span-4 px-2    grid items-end">{{$rps->kaprodi?->username ?? '...'}}</div>
            </div>
        </div>
    
        {{-- SECTION 3: CAPAIAN PEMBELAJARAN --}}
        <div class="border-b border-black text-[13px]">
            <div class="grid grid-cols-12">
                <div class="col-span-1 px-2 border-r border-black   flex font-bold ">Capaian Pembelaja<br>ran</div>
                <div class="col-span-11 ">
                    {{-- CPL --}}
                    <div class="  bg-gray-300 px-2 font-bold border-b border-black">Capaian Pembelajaran Lulusan (CPL) Prodi yang dibebankan pada MK</div>
                    <div class="">
                        @foreach($assocCpls ?? [] as $cpl)
                            <div class="grid grid-cols-12 border-b border-black">
                                <div class="col-span-1 px-2 border-r border-black   text-center ">{{ $cpl->nama_kode_cpl }}</div>
                                <div class="col-span-11 px-2  text-sm/6">
                                    <p>{{ $cpl->desc_cpl_id }}</p>
                                    <p class="italic text-[#7397b6]">{{ $cpl->desc_cpl_en }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>  
                    {{-- CPMK --}}
                    <div class="grid grid-cols-12 ">
                        <div class="col-span-10  px-2 border-b border-r border-t border-black bg-gray-300 font-bold">Capaian Pembelajaran Mata Kuliah (CPMK): melalui mata kuliah ini mahasiswa diharapkan mampu</div>
                        <div class="col-span-2  px-2  border-b border-t border-black  bg-gray-300 font-bold">CPL yang didukung</div>
                    </div>
                    {{-- Loop untuk CPMK --}}
                    @foreach($assocCpmk ?? [] as $cpmk)
                        <div class="grid grid-cols-12 border-b border-black">
                            <div class="col-span-1 px-2 border-r border-black   text-center ">{{ $cpmk->nama_kode_cpmk ?? 'N/A' }}</div>
                            <div class="col-span-9 px-2 border-r border-black text-sm/6">
                                <p>{{ $cpmk->desc_cpmk_id ?? 'N/A' }} </p>
                                <p class="italic text-sm text-[#7397b6]">{{ $cpmk->desc_cpmk_en ?? 'N/A' }}</p>
                            </div>
                            <div class="col-span-2 px-2   text-sm/6">
                                @foreach ($assocCpls as $cpl )
                                    @if (isset($correlationCpmkCplMap[$cpmk->id_cpmk ?? 0]) && in_array($cpl->id_cpl, $correlationCpmkCplMap[$cpmk->id_cpmk ?? 0]))
                                        <p class="text-center">{{$cpl->nama_kode_cpl}}</p>    
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    {{-- SubCPMK --}}
                    <div class="grid grid-cols-12 ">
                        <div class="col-span-10  px-2  border-b border-r border-black bg-gray-300 font-bold">Kemampuan akhir tiap tahapan pembelajaran (Sub-Capaian Pembelajaran MK - Sub CPMK)  </div>
                        <div class="col-span-2  px-2   border-b border-black  bg-gray-300 font-bold">CPMK yang didukung</div>
                    </div>
                    {{-- Loop untuk Sub-CPMK --}}
                    @foreach($assocCpmk ?? [] as $cpmk)
                        @foreach ($cpmk->subCpmk ?? [] as $sc )
                            <div class="grid grid-cols-12 border-b border-black ">
                                <div class="col-span-1 px-2 border-r border-black text-center ">{{ $sc->nama_kode_sub_cpmk}}</div>
                                <div class="col-span-9 px-2  border-r border-black text-sm/6">
                                     <p>{{ $sc->desc_sub_cpmk_id }}</p>
                                </div>
                                <div class="col-span-2 px-2     text-center ">{{$sc->cpmk->nama_kode_cpmk}}</div>
                            </div>  
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    
        {{-- SECTION 4: DESKRIPSI, PUSTAKA, BAHAN KAJIAN, PENILAIAN, MATAKULIAH SYARAT --}}
        <div class=" border-b border-black  text-[13px]">
            <div class="grid grid-cols-12 border-b border-black">
                <div class="col-span-1 p-2 border-r border-black  font-bold">Deskripsi Mata Kuliah</div>
                <div class="col-span-11 p-2 ">
                     <p>{{ $rps->mataKuliah?->matkul_desc_id }}</p>
                     <p class="italic text-sm text-[#7397b6]">{{ $rps->mataKuliah?->matkul_desc_en }}</p>
                </div>
            </div>
            <div class="grid grid-cols-12 border-b border-black">
                <div class="col-span-1 p-2 border-r border-black font-bold">Penilaian</div>
                <div class="col-span-11 p-2 ">
                    
                    <!-- ===== TABEL PENILAIAN ===== -->
                    <!-- Menambahkan class 'pdf-table' -->
                    <table class="w-full text-center text-xs border border-black pdf-table">
                        <thead class="bg-gray-200 font-semibold border-b border-black">
                            <tr>
                                <th class="border-r border-black p-1" rowspan="3">CPL</th>
                                <th class="border-r border-black p-1 w-16" rowspan="3">Kode CPMK</th>
                                <th class="border-r border-black p-1 w-24" rowspan="3">Bobot tiap CPMK mendukung CPL (%)</th>
                                <th class="border-b border-black p-1" colspan="11">Bobot tiap bentuk penilaian</th>
                            </tr>
                            <tr>
                                <th class="border-r border-b border-black p-1" colspan="2">Kegiatan Partisipatif*</th>
                                <th class="border-r border-b border-black p-1" colspan="2">Hasil Proyek*</th>
                                <th class="border-r border-b border-black p-1" colspan="2">Tugas</th>
                                <th class="border-r border-b border-black p-1" colspan="2">UTS</th>
                                <th class="border-r border-b border-black p-1" colspan="2">UAS</th>
                                <th class="p-1" rowspan="2">Total %</th>
                            </tr>
                            <tr class="bg-[#f7cbac]">
                                <th class="border-r border-black p-1">(%)</th>
                                <th class="border-r border-black p-1">N-maks</th>
                                <th class="border-r border-black p-1">(%)</th>
                                <th class="border-r border-black p-1">N-maks</th>
                                <th class="border-r border-black p-1">(%)</th>
                                <th class="border-r border-black p-1">N-maks</th>
                                <th class="border-r border-black p-1">(%)</th>
                                <th class="border-r border-black p-1">N-maks</th>
                                <th class="border-r border-black p-1">(%)</th>
                                <th class="border-r border-black p-1">N-maks</th>
                            </tr>
                        </thead>
                            <tbody>
                                {{-- Loop utama berdasarkan CPL yang sudah dikelompokkan dari controller --}}
                                @forelse($bobotCplCpmk as $bobot)
                                    <tr>
                                        <td class="border-r border-b border-black p-1 align-middle" >{{ $bobot->cpl->nama_kode_cpl }}</td>
                                        <td class="border-r border-b border-black p-1">{{ $bobot->cpmk->nama_kode_cpmk ?? 'N/A' }}</td>
                                        <td class="border-r border-b border-black p-1">{{ number_format($bobot->bobot, 0) }}</td>
    
                                        
                                        {{-- Mengambil data penilaian (Tugas, UTS, UAS) untuk CPMK saat ini --}}
                                        @php
                                            $penilaian = $bobotPenilaian[$bobot->id_cpmk] ?? null;
                                        @endphp
                                                
                                        <td class="border-r border-b border-black p-1">
                                           {{ $penilaian ? number_format($penilaian['hasil_proyek'], 0) : '' }} 
                                        </td>
                                        <td class="border-r border-b border-black p-1 bg-[#f7cbac7d]"></td>
    
                                        <td class="border-r border-b border-black p-1">
                                            {{ $penilaian ? number_format($penilaian['kegiatan_partisipatif'], 0) : '' }} 
                                        </td>
                                        <td class="border-r border-b border-black p-1 bg-[#f7cbac7d]"></td>
    
                                        {{-- Kolom Tugas --}}
                                        <td class="border-r border-b border-black p-1">
                                            {{ $penilaian ? number_format($penilaian['tugas'], 0) : '' }}
                                        </td>
                                        <td class="border-r border-b border-black p-1 bg-[#f7cbac7d]">{{-- N-Maka Tugas --}}</td>
                                                
                                        {{-- Kolom UTS --}}
                                        <td class="border-r border-b border-black p-1">
                                            {{ $penilaian ? number_format($penilaian['uts'], 0) : '' }}
                                        </td>
                                        <td class="border-r border-b border-black p-1 bg-[#f7cbac7d]">{{-- N-Maka UTS --}}</td>
                                                
                                        {{-- Kolom UAS --}}
                                        <td class="border-r border-b border-black p-1">
                                            {{ $penilaian ? number_format($penilaian['uas'], 0) : '' }}
                                        </td>
                                        <td class="border-r border-b border-black p-1 bg-[#f7cbac7d]">{{-- N-Maka UAS --}}</td>
                                                
                                        {{-- Kolom Total % per baris --}}
                                        <td class="border-b border-black p-1 bg-[#f7cbac7d]">
                                            {{ number_format($penilaian['tugas'] + $penilaian['uts'] + $penilaian['uas'], 0) }}
                                        </td>
                                    </tr>
                                @empty
                                    {{-- Pesan jika tidak ada data sama sekali --}}
                                    <tr class="">
                                        <td colspan="14" class="p-4">
                                            Data pembobotan CPL-CPMK  belum lengkap untuk ditampilkan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        <tfoot>
                            <tr class="font-bold">
                                <td class="border-r border-black p-1" colspan="3"></td>
                                <td class="border-r border-black p-1 bg-black"></td>
                                <td class="border-r border-black p-1 bg-[#f7cbac7d]">100</td>
                                <td class="border-r border-blackp-1 bg-black"></td>
                                <td class="border-r border-black p-1 bg-[#f7cbac7d]">100</td>
                                <td class="border-r border-black p-1 bg-black"></td>
                                <td class="border-r border-black p-1 bg-[#f7cbac7d]">100</td>
                                <td class="border-r border-black p-1 bg-black"></td>
                                <td class="border-r border-black p-1 bg-[#f7cbac7d]">100</td>
                                <td class="border-r border-black p-1 bg-black"></td>
                                <td class="border-r border-black p-1 bg-[#f7cbac7d]">100</td>
                                <td class="p-1 bg-black"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <p class="text-xs mt-2 italic">*Keterangan: Kegiatan partisipatif dan atau hasil proyek wajib masuk dalam komponen penilaian dengan porsi nilai akhir minimal 50%</p>
                </div>
            </div>
            <div class="grid grid-cols-12    ">
                <div class="col-span-1 p-2 border-b border-r border-black font-bold break-words">Bahan Kajian: Materi Pembelajaran</div>
                <div class="col-span-11 p-2 ">{!! nl2br(e($rps->materi_pembelajaran)) !!}</div>
            </div>
            <div class="border-b border-black">
                <div class="grid grid-cols-12  ">
                    <div class="col-span-1 px-2 border-r border-black font-bold">Pustaka</div>
                    <div class="col-span-11 px-2 border-b border-t border-black font-bold bg-gray-300 ">Utama:</div>
                </div>
                <div class="grid grid-cols-12 ">
                    <div class="col-span-1 border-r border-black "></div>
                    <div class="col-span-11 px-2 ">{!! nl2br(e($rps->pustaka_utama)) !!}</div>
                </div>
                <div class="grid grid-cols-12">
                    <div class="col-span-1 px-2 border-r border-black font-bold"></div>
                    <div class="col-span-11 border-b border-t border-black px-2 font-bold bg-gray-300   ">Pendukung:</div>
                </div>
                <div class="grid grid-cols-12 ">
                    <div class="col-span-1 border-r border-black "></div>
                    <div class="col-span-11 px-2 ">{!! nl2br(e($rps->pustaka_pendukung)) !!}</div>
                </div>
            </div>
            
            <div class="grid grid-cols-12 border-b border-black">
                <div class="col-span-1 px-2 border-r border-black  font-bold">Mata kuliah PraSyarat</div>
                <div class="col-span-11 px-2 ">
                    @forelse($rps->mataKuliahSyarat as $mk_syarat)
                        {{ $mk_syarat->nama_matkul_id }} 
                    @empty
                        -
                    @endforelse
                </div>
            </div>
    
            <div class="grid grid-cols-12">
                <div class="col-span-1 px-2 border-r border-black   font-bold break-words">Media Pembelajaran</div>
                <div class="col-span-11 ">
                    <div class="grid grid-cols-12">
                        <div class="col-span-6 px-2 border-r border-black   font-bold bg-gray-300">Perangkat Lunak:</div>
                        <div class="col-span-6 px-2 font-bold bg-gray-300">Perangkat Keras:</div>
                    </div>
                    <div class="grid grid-cols-12 h-10">
                        <div class="col-span-6 px-2  border-r border-black ">{{$rps->mediaPerangkatLunak}}</div>
                        <div class="col-span-6 px-2">{{$rps->mediaPerangkatKeras}}</div>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- SECTION 5: RENCANA MINGGUAN --}}
        <!-- Menambahkan class 'pdf-table' -->
        <table class="w-full text-sm table-fixed -separate -spacing-0 pdf-table">
            <thead class="border-b border-black  text-xs text-gray-700 bg-gray-300">
                <tr >
                    <th class="border-r border-b border-black  p-2 w-[86px]" rowspan="2">Minggu Ke-</th>
                    <th class="border-r border-b border-black p-2" rowspan="2">CPMK</th>
                    <th class="border-r border-b border-black p-2" rowspan="2">Deskripsi Sub-CPMK</th>
                    <th class="border-r border-b border-black p-2" colspan="2">Penilaian</th>
                    <th class="border-r border-b border-black p-2" rowspan="2">Materi Pembelajaran</th>
                    <th class="border-r border-b border-black p-2" rowspan="2">Model Pembelajaran </th>
                    <th class="border-r border-b border-black p-2" colspan="2">Bentuk Pembelajaran <br>[Estimasi Waktu]</th>
                    <th class=" border-b border-blackp-2" rowspan="2">Refrensi</th>
                </tr>
                <tr class="text-center bg-[#f7cbac]">
                    <th class="border-r border-b border-black p-1">Indikator</th>
                    <th class="border-r border-b border-black p-1">Kriteria & Bentuk</th>
                    <th class="border-r border-b border-black p-1">Synchronous</th>
                    <th class="border-r border-b border-black p-1">Asynchoronous</th>
                </tr>
                <tr class="text-center bg-white">
                    <th class="border-r border-black p-1">(1)</th>
                    <th class="border-r border-black p-1">(2)</th>
                    <th class="border-r border-black p-1">(3)</th>
                    <th class="border-r border-black p-1">(4)</th>
                    <th class="border-r border-black p-1">(5)</th>
                    <th class="border-r border-black p-1">(6)</th>
                    <th class="border-r border-black p-1">(7)</th>
                    <th class="border-r border-black p-1">(8)</th>
                    <th class="border-r border-black p-1">(9)</th>
                    <th class="p-1">(10)</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rps->topics as $topic)
                    <tr class="bg-white border-b border-black">
                        {{-- (1) Minggu Ke- --}}
                        <td class="border-r border-black p-2 text-center align-top font-semibold">
                            {{ $topic->weeks->pluck('week')->sort()->implode(', ') }}
                        </td>
                        @if ($topic->tipe == 'topik')
                            {{-- (2)  CPMK --}}
                            <td class="border-r border-black p-2 align-top text-center">
                                {{$topic->subCpmk?->cpmk?->nama_kode_cpmk}}
                            </td>
                            {{-- (3) Sub-CPMK --}}
                            <td class="border-r border-black p-2 align-top">
                                @if($topic->subCpmk)
                                    <p class="font-bold">{{ $topic->subCpmk->nama_kode_sub_cpmk}}</p>
                                    <p>{{ $topic->subCpmk->desc_sub_cpmk_id }}</p>
                                @else
                                    -
                                @endif
                            </td>
    
                            {{-- (4) Indikator --}}
                            <td class="border-r border-black p-2 align-top break-words">
                                {!! nl2br(e($topic->indikator)) !!}
                            </td>
    
                            {{-- (5) Kriteria & Teknik Penilaian --}}
                            <td class="border-r border-black p-2 align-top">
                                <p class="font-bold text-xs mb-1">Kriteria Penilaian:</p>
                                {!! nl2br(e($topic->kriteriaPenilaian->pluck('nama_kriteria_penilaian')->implode(', '))) !!}
                                <p class="font-bold text-xs mt-6 mb-1">Teknik Penilaian:</p>
                                {!! nl2br(e($topic->teknikPenilaianFormatted)) !!}
                            </td>
    
                            {{-- (6) Pokok Bahasan --}}
                            <td class="border-r border-black p-2 align-top break-words">
                                {!! nl2br(e($topic->materi_pembelajaran)) !!}
                            </td>
    
                            {{-- (7) Model Pembelajaran --}}
                            <td class="border-r border-black p-2 align-top">
                                {{$topic->rps?->modelPembelajaran?->nama_model_pembelajaran ?? "..."}}
                            </td>
    
                            {{--  (8) Synchronous --}}
                            <td class="border-r border-black p-2 align-top">
                                <div>
                                    <div>
                                        <ul class="list-disc list-inside">
                                            @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','TM')?->metodePembelajaran ?? [] as $metode)
                                                <li>{{$metode->nama_metode_pembelajaran}}</li>
                                            @empty
                                                <p>-</p> 
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div>
                                        <p>[TM: {{$topic->aktivitasPembelajaran->firstWhere('tipe','TM')?->jumlah_pertemuan}} x ({{$topic->aktivitasPembelajaran->firstWhere('tipe','TM')?->jumlah_sks}})]</p>  
                                    </div>
                                </div>
                            </td>
    
                            {{--  (9) Asynchronous --}}
                            <td class="border-r border-black p-2 align-top">
                                <div>
                                    <div>
                                        <ul class="list-disc list-inside">
                                            @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','BM')?->metodePembelajaran ?? [] as $item)
                                                <li>{{$item->nama_metode_pembelajaran}}</li>
                                            @empty
                                                <p>-</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div>
                                        <p>[BM: {{$topic->aktivitasPembelajaran->firstWhere('tipe','BM')?->jumlah_pertemuan}} x ({{$topic->aktivitasPembelajaran->firstWhere('tipe','BM')?->jumlah_sks}})]</p>  
                                    </div>
                                    <br>
                                    <div>
                                        <ul class="list-disc list-inside">
                                            @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','PT')?->bentukPenugasan ?? [] as $item)
                                                <li>{{$item->nama_bentuk_penugasan}}</li>
                                            @empty
                                                <p>-</p>
                                            @endforelse                                        
                                        </ul>
                                    </div>
                                    <div>
                                        <p>[BT: {{$topic->aktivitasPembelajaran->firstWhere('tipe','PT')?->jumlah_pertemuan}} x ({{$topic->aktivitasPembelajaran->firstWhere('tipe','PT')?->jumlah_sks}})]</p>  
                                    </div>
                                </div>
                            </td>
                            
                            {{-- (10) Refrensi --}}
                            <td class="p-2 text-center align-top">
                                {{$topic->refrensi}}
                            </td>
                        @else
                            <td colspan="9" class="text-center bg-[#9cc2e4] font-bold">{{$topic->tipe == 'uts' ? 'UJIAN TENGAH SEMESTER' : 'UJIAN AKHIR SEMESTER'}}</td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="p-4 text-center">Rencana mingguan belum diisi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>