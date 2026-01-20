<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/a3c61f64a4.js" crossorigin="anonymous"></script>
</head>
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    @php
        $isDosen = session('userRole') == 'dosen';
        $isKaprodi = session('userRole') == 'kaprodi';

        $isPengembangRps = Auth::id() == $rps->mataKuliah->id_pengembang_rps;
        $isKoordinatorMk = Auth::id() == $rps->mataKuliah->id_koordinator_mk;
        
        $canDelete = $isDosen && $isPengembangRps;
        $canEdit = ($isDosen && $isPengembangRps) || $isKaprodi || $isKoordinatorMk;    
    @endphp
    
    <div class="py-8 px-16 sm:ml-64 mt-16 font-serif">

        <div class="flex justify-between items-center font-sans">

                <div class=" mb-4">
                    @if ($isDosen)
                        <a href="{{ route('matkul.index') }}" class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 mr-4">Kembali</a>
                    @elseif($isKaprodi)
                        {{-- <a href="/kaprodi/mata-kuliah">Kembali</a> --}}
                        <a href="{{ route('mata-kuliah.index') }}" class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">Kembali</a>
                    @endif
                    <a href="{{route('rps.generatePDF', $rps)}}" class="text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-5 py-3 text-center"><i class="fa-solid fa-download"></i> PDF</a>
                </div>


                <div class="flex items-center gap-x-4 mb-4">
                    @if ($canEdit)
                        <div>
                            <a href="{{route('rps.edit', $rps)}}" class="text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">Edit RPS</a>
                        </div>
                    @endif
                    @if ($canDelete)
                        <div >
                            <form action="{{route('rps.destroy', $rps)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="text-white bg-[#DA6C6C] hover:opacity-90 font-medium rounded-lg text-base px-6 py-[0.5rem] text-center">Hapus RPS</button>
                            </form>
                        </div>            
                    @endif
                </div>
        </div>

        {{-- SECTION 1: KOP SURAT & INFO MATA KULIAH  --}}
        <div class="border border-black bg-[#9cc2e4] ">
            <div class="flex  border-black">
                <div class="w-1/4  flex items-center justify-center border-r border-b border-black">
                    <img src="{{asset('images/LOGO_ULM.png')}}" alt="Logo Universitas" class="h-20">
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
                <div class="grid grid-cols-12 bg-gray-300 text-sm ">
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
                        <p class="italic text-sm text-biru-custom">{{ $rps->mataKuliah->nama_matkul_en }}</p>
                    </div>
                    <div class="col-span-1 px-2 border-r border-black">{{ $rps->mataKuliah->kode_mk }}</div>
                    <div class="col-span-2 px-2 border-r border-black">
                        @foreach ($rps->mataKuliah->bahanKajian as $bk)
                            <p>{{$bk->nama_bk_id}}</p>
                            <p class="italic text-sm text-biru-custom">{{$bk->nama_bk_en}}</p>
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
                <div class="col-span-4 px-2 border-r  border-t border-black grid items-end">{{$rps->mataKuliah->pengembangRps?->username ?? 'Pengembang RPS tidak ditemukan'}}</div>
                <div class="col-span-3 px-2 border-r border-t border-black grid items-end">{{ $rps->mataKuliah->koordinatorMk?->username ?? 'Koordinator MK tidak ditemukan'}}</div>
                <div class="col-span-4 px-2 border-t border-black grid items-end">{{$rps->kaprodi?->username ?? 'Kaprodi tidak ditemukan'}}</div>
            </div>
        </div>

        {{-- SECTION 3: CAPAIAN PEMBELAJARAN, CPL, CPMK, SUB-CPMK, TABEL KORELASI CPL-CPMK --}}
        <div class="border border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-1 px-2 border-r border-black flex font-bold ">Capaian Pembelaja<br>ran</div>
                <div class="col-span-11    border-black">
                    {{-- CPL --}}
                    <div class="  border-black border-b bg-gray-300 px-2 font-bold">Capaian Pembelajaran Lulusan (CPL) Prodi yang dibebankan pada MK</div>
                    <div class="  border-black">
                        @foreach($assocCpls as $cpl)
                            <div class="grid grid-cols-12  border-black">
                                <div class="col-span-1 px-2 border-b border-r border-black text-center ">{{ $cpl->nama_kode_cpl }}</div>
                                <div class="col-span-11 px-2 border-b  border-black text-sm/6">
                                    <p>{{ $cpl->desc_cpl_id }}</p>
                                    <p class="italic text-sm text-biru-custom">{{ $cpl->desc_cpl_en }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>  
                    {{-- CPMK --}}
                    <div class="grid grid-cols-12  border-black">
                        <div class="col-span-10  px-2 border-b  border-black bg-gray-300 font-bold">Capaian Pembelajaran Mata Kuliah (CPMK): melalui mata kuliah ini mahasiswa diharapkan mampu</div>
                        <div class="col-span-2  px-2 border-b border-l  border-black bg-gray-300 font-bold">CPL yang didukung</div>
                    </div>
                    {{-- Loop untuk CPMK --}}
                    @foreach($assocCpmk as $cpmk)
                        <div class="grid grid-cols-12  border-black">
                            <div class="col-span-1 px-2 border-b border-r border-black text-center ">{{ $cpmk->nama_kode_cpmk ?? 'CPL Tidak Memliki CPMK' }}</div>
                            <div class="col-span-9 px-2 border-b  border-black text-sm/6">
                                <p>{{ $cpmk->desc_cpmk_id ?? 'CPL Tidak Memliki CPMK' }} </p>
                                <p class="italic text-sm text-biru-custom">{{ $cpmk->desc_cpmk_en ?? 'CPL Tidak Memliki CPMK' }}</p>
                            </div>
                            <div class="col-span-2 px-2 border-l border-b border-black text-sm/6">
                                @foreach ($assocCpls as $cpl )
                                    @if (isset($correlationCpmkCplMap[$cpmk->id_cpmk ?? 0]) && in_array($cpl->id_cpl, $correlationCpmkCplMap[$cpmk->id_cpmk ?? 0]))
                                        <p class="text-center">{{$cpl->nama_kode_cpl}}</p>    
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    {{-- SubCPMK --}}
                    <div class="grid grid-cols-12  border-black">
                        <div class="col-span-10  px-2  border-b border-black bg-gray-300 font-bold">Kemampuan akhir tiap tahapan pembelajaran (Sub-Capaian Pembelajaran MK - Sub CPMK)  </div>
                        <div class="col-span-2  px-2  border-b border-l border-black bg-gray-300 font-bold">CPMK yang didukung</div>
                    </div>
                    {{-- Loop untuk Sub-CPMK --}}
                    @foreach ($assocSubCpmk as $sc)
                        <div class="grid grid-cols-12  border-black">
                            <div class="col-span-1 px-2 border-r border-b border-black text-center ">{{ $sc->nama_kode_sub_cpmk}}</div>
                                <div class="col-span-9 px-2  border-b border-black text-sm/6">
                                    <p>{{ $sc->desc_sub_cpmk_id }}</p>
                                </div>
                            <div class="col-span-2 px-2 border-l border-b  border-black text-center ">{{$sc->cpmk->nama_kode_cpmk}}</div>
                        </div>                        
                    @endforeach
                </div>
            </div>
        </div>

        {{-- SECTION 4: DESKRIPSI, PUSTAKA, BAHAN KAJIAN, PENILAIAN, MATAKULIAH SYARAT --}}
        <div class="border border-black border-t-0 text-sm">
            <div class="grid grid-cols-12">
                <div class="col-span-1 p-2 border-r border-black font-bold">Deskripsi Mata Kuliah</div>
                <div class="col-span-11 p-2">
                     <p>{{ $rps->mataKuliah->matkul_desc_id }}</p>
                     <p class="italic text-sm text-biru-custom">{{ $rps->mataKuliah->matkul_desc_en }}</p>
                </div>
            </div>
            <div class="grid grid-cols-12 border-t border-black">
                <div class="col-span-1 p-2 border-r border-black font-bold">Penilaian</div>
                <div class="col-span-11 p-2">
                    <table class="w-full text-center text-xs border-collapse border border-black">
                        <thead class="bg-gray-200">
                            <tr class="border border-black">
                                <th class="border border-black p-1" rowspan="3">CPL</th>
                                <th class="border border-black p-1 w-16" rowspan="3">Kode CPMK dan</th>
                                <th class="border border-black p-1 w-24" rowspan="3">Bobot tiap CPMK mendukung CPL (%)</th>
                                <th class="border border-black p-1" colspan="11">Bobot tiap bentuk penilaian</th>
                            </tr>
                            <tr class="border border-black ">
                                <th class="border border-black p-1" colspan="2">Kegiatan Partisipatif*</th>
                                <th class="border border-black p-1" colspan="2">Hasil Proyek*</th>
                                <th class="border border-black p-1" colspan="2">Tugas</th>
                                <th class="border border-black p-1" colspan="2">UTS</th>
                                <th class="border border-black p-1" colspan="2">UAS</th>
                                <th class="border border-black p-1" rowspan="2">Total %</th>
                            </tr>
                            <tr class="border border-black bg-[#f7cbac]">
                                <th class="border border-black p-1">(%)</th>
                                <th class="border border-black p-1">N-maks</th>
                                <th class="border border-black p-1">(%)</th>
                                <th class="border border-black p-1">N-maks</th>
                                <th class="border border-black p-1">(%)</th>
                                <th class="border border-black p-1">N-maks</th>
                                <th class="border border-black p-1">(%)</th>
                                <th class="border border-black p-1">N-maks</th>
                                <th class="border border-black p-1">(%)</th>
                                <th class="border border-black p-1">N-maks</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop utama berdasarkan CPL yang sudah dikelompokkan dari controller --}}
                            @forelse($bobotCplCpmk as $bobot)
                                <tr>
                                    <td class="border border-black p-1 align-middle" >{{ $bobot->cpl->nama_kode_cpl }}</td>
                                    <td class="border border-black p-1">{{ $bobot->cpmk->nama_kode_cpmk ?? 'N/A' }}</td>
                                    <td class="border border-black p-1">{{ number_format($bobot->bobot, 0) }}</td>

                                    
                                    {{-- Mengambil data penilaian (Tugas, UTS, UAS) untuk CPMK saat ini --}}
                                    @php
                                        $penilaian = $bobotPenilaian[$bobot->id_cpmk][$bobot->id_cpl] ?? null;
                                        // $rowVal = $bobotPenilaian[$mapping->id_cpmk][$mapping->id_cpl] ?? [];
                                    @endphp
                                    @php
                                        $totalCpmk = $bobot->bobot ?? 0;
                                    @endphp

                                    {{-- Kolom Kegiatan Partisipatif --}}
                                    {{-- <td class="border border-black p-1">
                                        {{ $penilaian ? number_format($penilaian['kegiatan_partisipatif'], 0) : '' }} 
                                    {{-- </td> --}}
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['kegiatan_partisipatif'] ?? 0) > 0)
                                            {{ number_format(($penilaian['kegiatan_partisipatif'] / $totalCpmk) * 100, 0) }}
                                        @endif
                                    </td>
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['kegiatan_partisipatif'] ?? 0) > 0)
                                            {{number_format(100/$countPenilaian['kegiatan_partisipatif'],0)}}
                                        @endif
                                    </td>




                                    {{-- Kolom Hasil Proyek --}}
                                    {{-- <td class="border border-black p-1">
                                       {{ $penilaian ? number_format($penilaian['hasil_proyek'], 0) : '' }} 
                                    </td> --}}
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['hasil_proyek'] ?? 0) > 0)
                                            {{ number_format(($penilaian['hasil_proyek'] / $totalCpmk) * 100, 0) }}
                                        @endif
                                    </td>
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['hasil_proyek'] ?? 0) > 0)
                                            {{number_format(100/$countPenilaian['hasil_proyek'],0)}}
                                        @endif
                                    </td>



                                    {{-- Kolom Tugas --}}
                                    {{-- <td class="border border-black p-1">
                                        {{ $penilaian ? number_format($penilaian['tugas'], 0) : '' }}
                                    </td> --}}
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['tugas'] ?? 0) > 0)
                                            {{ number_format(($penilaian['tugas'] / $totalCpmk) * 100, 0) }}
                                        @endif
                                    </td>
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['tugas'] ?? 0) > 0)
                                            {{number_format(100/$countPenilaian['tugas'],0)}}
                                        @endif
                                    </td>


                                            
                                    {{-- Kolom UTS --}}
                                    {{-- <td class="border border-black p-1">
                                        {{ $penilaian ? number_format($penilaian['uts'], 0) : '' }}
                                    </td> --}}
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['uts'] ?? 0) > 0)
                                            {{ number_format(($penilaian['uts'] / $totalCpmk) * 100, 0) }}
                                        @endif
                                    </td>
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['uts'] ?? 0) > 0)
                                            {{number_format(100/$countPenilaian['uts'],0)}}
                                        @endif
                                    </td>


                                            
                                    {{-- Kolom UAS --}}
                                    {{-- <td class="border border-black p-1">
                                        {{ $penilaian ? number_format($penilaian['uas'], 0) : '' }}
                                    </td> --}}
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['uas'] ?? 0) > 0)
                                            {{ number_format(($penilaian['uas'] / $totalCpmk) * 100, 0) }}
                                        @endif
                                    </td>
                                    <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        @if (($penilaian['uas'] ?? 0) > 0)
                                            {{number_format(100/$countPenilaian['uas'],0)}}
                                        @endif
                                    </td>


                                            
                                    {{-- Kolom Total % per baris --}}
                                    {{-- <td class="border border-black p-1 bg-[#f7cbac7d]">
                                        {{ number_format($penilaian['tugas'] + $penilaian['uts'] + $penilaian['uas'] + $penilaian['hasil_proyek'] + $penilaian['kegiatan_partisipatif'], 0) }}
                                    </td> --}}
                                    <td class="border border-black p-1 bg-[#f7cbac7d] font-bold">
                                        {{ number_format(
                                            (
                                                $penilaian['kegiatan_partisipatif'] +
                                                $penilaian['hasil_proyek'] +
                                                $penilaian['tugas'] +
                                                $penilaian['uts'] +
                                                $penilaian['uas']
                                            ) / $totalCpmk * 100,
                                            0
                                        ) }}%
                                    </td>

                                </tr>
                            @empty
                                {{-- Pesan jika tidak ada data sama sekali --}}
                                <tr class="border border-black">
                                    <td colspan="14" class="p-4">
                                        Data pembobotan CPL-CPMK  belum lengkap untuk ditampilkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="border border-black font-bold">
                                <td class="border border-black p-1" colspan="3"></td>
                                <td class="border border-black p-1 bg-black"></td>
                                <td class="border border-black p-1  bg-[#f7cbac7d]">{{ $countPenilaian['kegiatan_partisipatif'] > 0 ? 100 : 0 }}</td>
                                <td class="border border-black p-1 bg-black"></td>
                                <td class="border border-black p-1 bg-[#f7cbac7d] ">{{ $countPenilaian['hasil_proyek'] > 0 ? 100 : 0 }}</td>
                                <td class="border border-black p-1 bg-black"></td>
                                <td class="border border-black p-1 bg-[#f7cbac7d] ">{{ $countPenilaian['tugas'] > 0 ? 100 : 0 }}</td>
                                <td class="border border-black p-1 bg-black"></td>
                                <td class="border border-black p-1 bg-[#f7cbac7d] ">{{ $countPenilaian['uts'] > 0 ? 100 : 0 }}</td>
                                <td class="border border-black p-1 bg-black"></td>
                                <td class="border border-black p-1 bg-[#f7cbac7d] ">{{ $countPenilaian['uas'] > 0 ? 100 : 0 }}</td>
                                <td class="border border-black p-1 bg-black "></td>
                            </tr>
                        </tfoot>
                    </table>

                    <p class="text-xs mt-2 italic">*Keterangan: Kegiatan partisipatif dan atau hasil proyek wajib masuk dalam komponen penilaian dengan porsi nilai akhir minimal 50%</p>
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
                <div class="col-span-11 px-2 ">
                    @forelse($rps->mataKuliahSyarat as $mk_syarat)
                        {{ $mk_syarat->nama_matkul_id }} 
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
                    <div class="grid grid-cols-12 h-10">
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
                        <th class="p-2 border border-black text-[14px] w-[94px]" rowspan="2">Minggu Ke-</th>
                        <th class="p-2 border border-black text-[14px]" rowspan="2">CPMK</th>
                        <th class="p-2 border border-black text-[14px]" rowspan="2">Deskripsi Sub-CPMK</th>
                        <th class="p-2 border border-black text-[14px]" colspan="2">Penilaian</th>
                        <th class="p-2 border border-black text-[14px] " rowspan="2">Materi Pembelajaran</th>
                        <th class="p-2 border border-black text-[14px]" rowspan="2">Model Pembelajaran </th>
                        <th class="p-2 border border-black text-[14px]" colspan="2">Bentuk Pembelajaran <br>[Estimasi Waktu]</th>
                        <th class="p-2 border border-black text-[14px]" rowspan="2">Refrensi</th>
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
                                {{-- (2)  CPMK --}}
                                <td class="p-2 align-top text-center">
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

                                {{-- (7) Model Pembelajaran --}}
                                <td class="p-2 border border-black align-top">
                                    {{$rps->modelPembelajaran->nama_model_pembelajaran ?? "Model Pembelajaran Belum di Tentukan"}}
                                </td>

                                {{--  (8) Synchronous --}}
                                <td class="p-2 border border-black align-top">
                                    <div>
                                        <div>
                                            <ul class="list-disc list-outside pl-4">
                                                @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','TM')?->metodePembelajaran ?? [] as $metode)
                                                    <li>{{$metode->nama_metode_pembelajaran}}</li>
                                                @empty
                                                    <p>-</p> 
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div>
                                            <p>[TM: {{$topic->aktivitasPembelajaran->firstWhere('tipe','TM')->jumlah_pertemuan ?? '-'}} x ({{$topic->aktivitasPembelajaran->firstWhere('tipe','TM')->jumlah_sks ?? '-'}})]</p>  
                                        </div>
                                    </div>
                                </td>

                                {{--  (9) Asynchronous --}}
                                <td class="p-2 border border-black align-top">
                                    <div>                                       
                                        <div>
                                            <ul class="list-disc list-outside pl-4">
                                                @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','BM')?->metodePembelajaran ?? [] as $item)
                                                    <li>{{$item->nama_metode_pembelajaran}}</li>
                                                @empty
                                                    <p>-</p>
                                                @endforelse
                                            </ul>
                                        </div>

                                        <div>
                                            <p>[BM: {{$topic->aktivitasPembelajaran->firstWhere('tipe','BM')->jumlah_pertemuan ?? '-'}} x ({{$topic->aktivitasPembelajaran->firstWhere('tipe','BM')->jumlah_sks ?? '-'}})]</p>  
                                        </div>

                                        <br>
                                        
                                        <div>
                                            <ul class="list-disc list-inside">
                                                @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','BT')?->bentukPenugasan ?? [] as $item)
                                                    <li>{{$item->nama_bentuk_penugasan}}</li>
                                                @empty
                                                    <p>-</p>
                                                @endforelse                                            
                                            </ul>
                                        </div>

                                        <div>
                                            <p>[BT: {{$topic->aktivitasPembelajaran->firstWhere('tipe','BT')->jumlah_pertemuan ?? '-'}} x ({{$topic->aktivitasPembelajaran->firstWhere('tipe','BT')->jumlah_sks ?? '-'}})]</p>  
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