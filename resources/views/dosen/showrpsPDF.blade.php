<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>RPS {{ $rps->mataKuliah->nama_matkul_id }}</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid #000;
            padding: 4px;
            vertical-align: top;
        }

        .center { text-align: center; }
        .bold { font-weight: bold; }
        .italic { font-style: italic; color: #2f6fa3; }
        .small { font-size: 10px; }

        .bg-blue { background: #a9cbe8; }
        .bg-orange { background: #f6c8a8; }
        .bg-gray { background: #e0e0e0; }

        .no-border { border: none; }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>

{{-- ===================================================== --}}
{{-- HEADER --}}
{{-- ===================================================== --}}
<table>
    <tr class="bg-blue">
        <td width="25%" class="center">
            <img src="{{ public_path('images/LOGO_ULM.png') }}" width="65">
        </td>
        <td width="70%" class="center bold">
            <span style="font-size: 18px">UNIVERSITAS LAMBUNG MANGKURAT</span> <br>
            <span style="font-size: 16px">FAKULTAS TEKNIK</span><br>
            <span style="font-size: 16px">PROGRAM STUDI {{ strtoupper($rps->programStudi->nama_prodi) }}</span>
        </td>
        <td width="15%"></td>
    </tr>
    <tr class="bg-orange">
        <td colspan="3" class="center bold" style="font-size: 16px">
            RENCANA PEMBELAJARAN SEMESTER
        </td>
    </tr>
</table>

{{-- ===================================================== --}}
{{-- IDENTITAS MATA KULIAH --}}
{{-- ===================================================== --}}
<table>
    <tr class="bg-gray bold ">
        <td width="10%">Identitas <br>Mata <br>Kuliah</td>
        <td width="25%">Nama Mata Kuliah</td>
        <td width="10%">Kode MK</td>
        <td width="15%">Rumpun MK</td>
        <td width="15%" colspan="3">BOBOT (SKS)</td>
        <td width="10%">Semester</td>
        <td width="15%">Tgl Penyusunan</td>
    </tr>
    <tr>
        <td></td>
        <td>
            {{ $rps->mataKuliah->nama_matkul_id }}<br>
            <span class="italic">{{ $rps->mataKuliah->nama_matkul_en }}</span>
        </td>
        <td class="center">{{ $rps->mataKuliah->kode_mk }}</td>
        <td>
            @foreach($rps->mataKuliah->bahanKajian as $bk)
                {{ $bk->nama_bk_id }}<br>
                <span class="italic">{{ $bk->nama_bk_en }}</span><br>
            @endforeach
        </td>
        <td class="center">T={{ $rps->mataKuliah->sks_teori }}</td>
        <td class="center">P={{ $rps->mataKuliah->sks_praktikum }}</td>
        <td class="center">Lap=0</td>
        <td class="center">{{ $rps->mataKuliah->semester }}</td>
        <td class="center">{{ $rps->tanggal_disusun->translatedFormat('d F Y') }}</td>
    </tr>
</table>

{{-- ===================================================== --}}
{{-- OTORITAS --}}
{{-- ===================================================== --}}
<table>
    <tr class="bold">
        <td style="border-bottom: 1px solid white;" width="10%">Otoritas</td>
        <td width="35%" class="bg-gray">Pengembang RPS</td>
        <td width="20%" class="bg-gray">Koordinator Mata Kuliah</td>
        <td width="35%" class="bg-gray">Koordinator Program Studi</td>
    </tr>
    <tr>
        <td height="50"></td>
        <td height="50">{{ $rps->mataKuliah->pengembangRps->username }}</td>
        <td height="50">{{ $rps->mataKuliah->koordinatorMk->username }}</td>
        <td height="50">{{ $rps->kaprodi->username }}</td>
    </tr>
</table>

{{-- ===================================================== --}}
{{-- CAPAIAN PEMBELAJARAN --}}
{{-- ===================================================== --}}
<table>
    <tr >
        <td style="border-bottom: 1px solid white;" class="bold" width="10%">Capaian Pembelajaran </td>
        <td class="bg-gray bold" width="90%" colspan="2">Capaian Pembelajaran Lulusan (CPL) Prodi yang dibebankan pada MK</td>
    </tr>

    @foreach($assocCpls as $cpl)
    <tr>
        <td style="border-top: 1px solid white; border-bottom: 1px solid white;" width="10%"></td>
        <td width="7%" class="center">{{ $cpl->nama_kode_cpl }}</td>
        <td width="83%" >
            {{ $cpl->desc_cpl_id }}<br>
            <span class="italic">{{ $cpl->desc_cpl_en }}</span>
        </td>
    </tr>
    @endforeach
</table>

{{-- ===================================================== --}}
{{-- CPMK --}}
{{-- ===================================================== --}}
<table>
    <tr >
        <td style="border-top: 1px solid white; border-bottom: 1px solid white;" width="10%"></td>
        <td class="bg-gray bold"  colspan="2" width="76%">Capaian Pembelajaran Mata Kuliah (CPMK): melalui mata kuliah ini mahasiswa diharapkan mampu</td>
        <td class="bg-gray bold" width="14%">CPL yang didukung</td>
    </tr>

    @foreach($assocCpmk as $cpmk)
    <tr>
        <td style="border-top: 1px solid white; border-bottom: 1px solid white;" width="10%"></td>
        <td width="7%" class="center">{{ $cpmk->nama_kode_cpmk }}</td>
        <td width="69%">
            {{ $cpmk->desc_cpmk_id }}<br>
            <span class="italic">{{ $cpmk->desc_cpmk_en }}</span>
        </td>
        <td class="center" width="14%">
            @foreach($assocCpls as $cpl)
                @if(isset($correlationCpmkCplMap[$cpmk->id_cpmk]) &&
                    in_array($cpl->id_cpl, $correlationCpmkCplMap[$cpmk->id_cpmk]))
                    {{ $cpl->nama_kode_cpl }}<br>
                @endif
            @endforeach
        </td>
    </tr>
    @endforeach
</table>

{{-- ===================================================== --}}
{{-- SUB CPMK --}}
{{-- ===================================================== --}}
<table>
    <tr >
        <td style="border-top: 1px solid white; border-bottom: 1px solid white;" width="10%"></td>
        <td class="bg-gray bold" colspan="2">Kemampuan akhir tiap tahapan pembelajaran (Sub-Capaian Pembelajaran MK - Sub CPMK)</td>
        <td class="bg-gray bold center">CPMK yang didukung</td>
    </tr>

    @foreach($assocSubCpmk as $sc)
    <tr>
        <td style="border-top: 1px solid white; border-bottom: 1px solid white;" width="10%"></td>
        <td width="7%" class="center">{{ $sc->nama_kode_sub_cpmk }}</td>
        <td width="69%">{{ $sc->desc_sub_cpmk_id }}</td>
        <td width="14%" class="center">{{ $sc->cpmk->nama_kode_cpmk }}</td>
    </tr>
    @endforeach
</table>

<table>
    <tr>
        <td width="10%" class="bold">Deskripsi Mata Kuliah</td>
        <td width="90%">
            {!! nl2br(e($rps->mataKuliah->matkul_desc_id)) !!}
        </td>
    </tr>
</table>

{{-- ===================================================== --}}
{{-- PENILAIAN --}}
{{-- ===================================================== --}}
{{-- <table class="small">
<thead>
<tr >
    <td style="border-top: 1px solid white; ">Penilaian</td>
    <td class="bg-gray bold center" rowspan="2">CPL</td>
    <td class="bg-gray bold center" rowspan="2">CPMK</td>
    <td class="bg-gray bold center" rowspan="2">Bobot CPMK</td>
    <td class="bg-gray bold center" colspan="10">Bobot Tiap Bentuk Penilaian</td>
</tr>
<tr class="bg-orange center">
    <td colspan="2">Partisipatif</td>
    <td colspan="2">Proyek</td>
    <td colspan="2">Tugas</td>
    <td colspan="2">UTS</td>
    <td colspan="2">UAS</td>
</tr>
</thead>
<tbody>
@forelse($bobotCplCpmk as $bobot)
<tr>
    <td class="center">{{ $bobot->cpl->nama_kode_cpl }}</td>
    <td class="center">{{ $bobot->cpmk->nama_kode_cpmk }}</td>
    <td class="center">{{ $bobot->bobot }}</td>

    @php $p = $bobotPenilaian[$bobot->id_cpmk] ?? null; @endphp

    <td class="center">{{ $p['kegiatan_partisipatif'] ?? '' }}</td><td></td>
    <td class="center">{{ $p['hasil_proyek'] ?? '' }}</td><td></td>
    <td class="center">{{ $p['tugas'] ?? '' }}</td><td></td>
    <td class="center">{{ $p['uts'] ?? '' }}</td><td></td>
    <td class="center">{{ $p['uas'] ?? '' }}</td><td></td>
</tr>
@empty
<tr>
    <td colspan="13" class="center">Data pembobotan belum lengkap</td>
</tr>
@endforelse
</tbody>
</table> --}}
<table>
    <tr>
        <td class="bold" style="border-top: 1px solid white; border-bottom: 1px solid white;" width="10%">Penilaian</td>
        <td width="90%">
            <table class="w-full text-center text-xs border border-black pdf-table">
                <thead style="background-color:#e5e7eb">
                    <tr>
                        <th width="6%"  rowspan="3">CPL</th>
                        <th width="7%"  rowspan="3">Kode CPMK</th>
                        <th width="7%" rowspan="3">Bobot tiap CPMK mendukung CPL (%)</th>
                        <th width="80%" colspan="11">Bobot tiap bentuk penilaian</th>
                    </tr>
                    <tr>
                        <th colspan="2">Kegiatan Partisipatif*</th>
                        <th colspan="2">Hasil Proyek*</th>
                        <th colspan="2">Tugas</th>
                        <th colspan="2">UTS</th>
                        <th colspan="2">UAS</th>
                        <th width="10%" rowspan="2">Total %</th>
                    </tr>
                    <tr style="background-color: #f7cbac">
                        <th width="5%" class="border-r border-black p-1">(%)</th>
                        <th width="13%" class="border-r border-black p-1">N-maks</th>
                        <th width="5%" class="border-r border-black p-1">(%)</th>
                        <th width="10%" class="border-r border-black p-1">N-maks</th>
                        <th width="5%" class="border-r border-black p-1">(%)</th>
                        <th width="9%" class="border-r border-black p-1">N-maks</th>
                        <th width="5%" class="border-r border-black p-1">(%)</th>
                        <th width="9%" class="border-r border-black p-1">N-maks</th>
                        <th width="5%" class="border-r border-black p-1">(%)</th>
                        <th width="9%" class="border-r border-black p-1">N-maks</th> 
                    </tr>
                </thead>
                    <tbody>
                        {{-- Loop utama berdasarkan CPL yang sudah dikelompokkan dari controller --}}
                       @forelse($bobotCplCpmk as $bobot)
                             <tr class="center">
                                <td class="border-r border-b border-black p-1 align-middle" >{{ $bobot->cpl->nama_kode_cpl }}</td>
                                <td class="border-r border-b border-black p-1">{{ $bobot->cpmk->nama_kode_cpmk ?? 'N/A' }}</td>
                                <td class="border-r border-b border-black p-1">{{ number_format($bobot->bobot, 0) }}</td>
         
                                {{-- Mengambil data penilaian (Tugas, UTS, UAS) untuk CPMK saat ini --}}
                                @php
                                    $penilaian = $bobotPenilaian[$bobot->id_cpmk][$bobot->id_cpl] ?? null;
                                    $totalCpmk = $bobot->bobot ?? 0;
                                @endphp
                                                
                                {{-- <td >{{ $penilaian ? number_format($penilaian['kegiatan_partisipatif'], 0) : '' }} </td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['kegiatan_partisipatif'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['kegiatan_partisipatif'],0)}}
                                    @endif
                                </td>
    
                                <td >{{ $penilaian ? number_format($penilaian['hasil_proyek'], 0) : '' }} </td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['hasil_proyek'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['hasil_proyek'],0)}}
                                    @endif
                                </td>
    
                                        {{-- Kolom Tugas --}}
                                {{-- <td >{{ $penilaian ? number_format($penilaian['tugas'], 0) : '' }}</td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['tugas'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['tugas'],0)}}
                                    @endif                                    
                                </td> --}}
                                                
                                        {{-- Kolom UTS --}}
                                {{-- <td >{{ $penilaian ? number_format($penilaian['uts'], 0) : '' }}</td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['uts'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['uts'],0)}}
                                    @endif
                                </td> --}}
                                                
                                        {{-- Kolom UAS --}}
                                {{-- <td >{{ $penilaian ? number_format($penilaian['uas'], 0) : '' }}</td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['uas'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['uas'],0)}}
                                    @endif
                                </td> --}}

                                <td >
                                    @if (($penilaian['kegiatan_partisipatif'] ?? 0) > 0)
                                        {{ number_format(($penilaian['kegiatan_partisipatif'] / $totalCpmk) * 100, 0) }}
                                    @endif
                                </td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['kegiatan_partisipatif'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['kegiatan_partisipatif'],0)}}
                                    @endif
                                </td>
    
                                <td >
                                    @if (($penilaian['hasil_proyek'] ?? 0) > 0)
                                        {{ number_format(($penilaian['hasil_proyek'] / $totalCpmk) * 100, 0) }}
                                    @endif 
                                </td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['hasil_proyek'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['hasil_proyek'],0)}}
                                    @endif
                                </td>
    
                                        {{-- Kolom Tugas --}}
                                <td >
                                    @if (($penilaian['tugas'] ?? 0) > 0)
                                        {{ number_format(($penilaian['tugas'] / $totalCpmk) * 100, 0) }}
                                    @endif        
                                </td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['tugas'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['tugas'],0)}}
                                    @endif                                    
                                </td>
                                                
                                        {{-- Kolom UTS --}}
                                <td >
                                    @if (($penilaian['uts'] ?? 0) > 0)
                                        {{ number_format(($penilaian['uts'] / $totalCpmk) * 100, 0) }}
                                    @endif
                                </td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['uts'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['uts'],0)}}
                                    @endif
                                </td>
                                                
                                        {{-- Kolom UAS --}}
                                <td >
                                    @if (($penilaian['uas'] ?? 0) > 0)
                                        {{ number_format(($penilaian['uas'] / $totalCpmk) * 100, 0) }}
                                    @endif
                                </td>
                                <td style="background-color: #f7cbac7d">
                                    @if (($penilaian['uas'] ?? 0) > 0)
                                        {{number_format(100/$countPenilaian['uas'],0)}}
                                    @endif
                                </td>
                                                
                                        {{-- Kolom Total % per baris --}}
                                <td style="background-color: #f7cbac7d">{{ number_format(($penilaian['tugas'] + $penilaian['uts'] + $penilaian['uas']) / $totalCpmk * 100, 0) }}</td>
                            </tr>
                        @empty
                            {{-- Pesan jika tidak ada data sama sekali --}}
                             <tr class="">
                                <td colspan="14" class="center" style="padding: 8px">Data pembobotan CPL-CPMK  belum lengkap untuk ditampilkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr class="font-bold">
                            <td  colspan="3" ></td>
                            <td style="background-color: #000"></td>
                            <td class="bold center" style="background-color: #f7cbac7d">{{ $countPenilaian['kegiatan_partisipatif'] > 0 ? 100 : 0 }}</td>
                            <td style="background-color: #000"></td>
                            <td class="bold center" style="background-color: #f7cbac7d">{{ $countPenilaian['hasil_proyek'] > 0 ? 100 : 0 }}</td>
                            <td style="background-color: #000"></td>
                            <td class="bold center" style="background-color: #f7cbac7d">{{ $countPenilaian['tugas'] > 0 ? 100 : 0 }}</td>
                            <td style="background-color: #000"></td>
                            <td class="bold center" style="background-color: #f7cbac7d">{{ $countPenilaian['uts'] > 0 ? 100 : 0 }}</td>
                            <td style="background-color: #000"></td>
                            <td class="bold center" style="background-color: #f7cbac7d">{{ $countPenilaian['uas'] > 0 ? 100 : 0 }}</td>
                            <td class="p-1 bg-black"></td>
                        </tr>
                    </tfoot>
            </table>
            <san style="font-style: italic">*Kegiatan partisipatif dan/atau hasil proyek wajib masuk dalam komponen penilaian minimal 50%</span>
        </td>
    </tr>
</table>



<table>
    <tr>
        <td width="10%" class="bold" style="border-bottom: 1px solid white;">Bahan Kajian:<br>Materi Pembelajaran</td>
        <td>
            {!! nl2br(e($rps->materi_pembelajaran)) !!}
        </td>
    </tr>
</table>

<table>
    <tr >
        <td width="10%" class="bold" style="border-bottom: 1px solid white;">Pustaka</td>
        <td class="bg-gray bold">Utama:</td>
    </tr>
    <tr>
        <td style="border-top: 1px solid white; border-bottom: 1px solid white;"></td>
        <td>
            {!! nl2br(e($rps->pustaka_utama)) !!}
        </td>
    </tr>
    <tr>
        <td style="border-top: 1px solid white; border-bottom: 1px solid white;"></td>
        <td class="bg-gray bold">Pendukung:</td>
    </tr>
    <tr>
        <td style="border-top: 1px solid white; border-bottom: 1px solid white;"></td>
        <td>
            {!! nl2br(e($rps->pustaka_pendukung)) !!}
        </td>
    </tr>
</table>

<table>
    <tr>
        <td width="10%" class="bold" style="border-bottom: 1px solid white;">Mata Kuliah<br>Prasyarat</td>
        <td>
            @forelse($rps->mataKuliahSyarat as $mk)
                {{ $mk->nama_matkul_id }}<br>
            @empty
                -
            @endforelse
        </td>
    </tr>
</table>

<table>
    <tr >
        <td width="10%" class="bold" style="border-bottom: 1px solid white;">Media Pembelajaran</td>
        <td width="45%" class="bg-gray bold">Perangkat Lunak:</td>
        <td width="45%" class="bg-gray bold">Perangkat Keras:</td>
    </tr>
    <tr>
        <td></td>
        <td>{{ $rps->mediaPerangkatLunak }}</td>
        <td>{{ $rps->mediaPerangkatKeras }}</td>
    </tr>
</table>



{{-- ===================================================== --}}
{{-- RENCANA MINGGUAN --}}
{{-- ===================================================== --}}

<table >
<thead>
<tr class="bg-gray bold center">
    <td width="10%" rowspan="2">Minggu Ke-</td>
    <td width="10%" rowspan="2">CPMK</td>
    <td width="10%" rowspan="2">Deskripsi Sub-CPMK</td>
    <td width="25%" colspan="2">Penilaian</td>
    <td width="10%" rowspan="2">Materi Pembelajaran</td>
    <td width="10%" rowspan="2">Model Pembelajaran</td>
    <td width="25%" colspan="2">Bentuk Pembelajaran <br> [Estimasi Waktu]</td>
    <td width="10%" rowspan="2">Referensi</td>
</tr>
 <tr class="center" style="background-color: #f7cbac">
    <th class="p-1 border border-black ">Indikator</th>
    <th class="p-1 border border-black">Kriteria & Bentuk</th>
    <th class="p-1 border border-black">Synchronous</th>
    <th class="p-1 border border-black">Asynchoronous</th>
</tr>
 <tr class="center " style="background-color: white">
    <th>(1)</th>
    <th>(2)</th>
    <th>(3)</th>
    <th>(4)</th>
    <th>(5)</th>
    <th>(6)</th>
    <th>(7)</th>
    <th>(8)</th>
    <th>(9)</th>
    <th>(10)</th>
</tr> 
</thead>
<tbody>
@forelse($rps->topics as $topic)
<tr style="padding: 4px">
    <td class="center">{{ $topic->weeks->pluck('week')->implode(',') }}</td>

    @if($topic->tipe === 'topik')
        <td class="center">{{ $topic->subCpmk->cpmk->nama_kode_cpmk }}</td>
        <td class="center">{{ $topic->subCpmk->nama_kode_sub_cpmk }}</td>
        <td>{{ $topic->indikator }}</td>
        <td>{{ $topic->teknikPenilaianFormatted }}</td>
        <td>{{ $topic->materi_pembelajaran }}</td>
        <td>{{ $rps->modelPembelajaran->nama_model_pembelajaran }}</td>
        <td>
            <ul style="margin-left: -25px; margin-top: 0">
                @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','TM')?->metodePembelajaran ?? [] as $metode)
                    <li>{{$metode->nama_metode_pembelajaran}}</li>
                @empty
                    <p>-</p> 
                @endforelse
            </ul>            
            <p>[TM: {{$topic->aktivitasPembelajaran->firstWhere('tipe','TM')->jumlah_pertemuan ?? '-'}} x ({{$topic->aktivitasPembelajaran->firstWhere('tipe','TM')->jumlah_sks ?? '-'}})]</p>  
        </td>
        <td>
            <ul style="margin-left: -25px; margin-top: 0">
                @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','BM')?->metodePembelajaran ?? [] as $item)
                    <li>{{$item->nama_metode_pembelajaran}}</li>
                @empty
                    <p>-</p>
                @endforelse
            </ul>
            <p>[BM: {{$topic->aktivitasPembelajaran->firstWhere('tipe','BM')->jumlah_pertemuan ?? '-'}} x ({{$topic->aktivitasPembelajaran->firstWhere('tipe','BM')->jumlah_sks ?? '-'}})]</p>  
       
            <br>

            <ul style="margin-left: -25px; margin-top: 0">
                @forelse ($topic->aktivitasPembelajaran->firstWhere('tipe','BT')?->bentukPenugasan ?? [] as $item)
                    <li>{{$item->nama_bentuk_penugasan}}</li>
                @empty
                    <p>-</p>
                @endforelse                                            
            </ul>       
            <p>[BT: {{$topic->aktivitasPembelajaran->firstWhere('tipe','BT')->jumlah_pertemuan ?? '-'}} x ({{$topic->aktivitasPembelajaran->firstWhere('tipe','BT')->jumlah_sks ?? '-'}})]</p>       
        </td>   
        <td class="center">{{ $topic->refrensi }}</td>
    @else
        <td colspan="9" class="center bold bg-blue">
            {{ $topic->tipe === 'uts' ? 'UJIAN TENGAH SEMESTER' : 'UJIAN AKHIR SEMESTER' }}
        </td>
    @endif
</tr>
@empty
    <tr>
         <td colspan="10" class="center">Rencana mingguan belum diisi.</td>
    </tr>
@endforelse
</tbody>
</table>

</body>
</html>