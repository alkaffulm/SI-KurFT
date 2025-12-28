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
            font-size: 18px;
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
        <td width="15%" class="center">
            <img src="{{ public_path('images/LOGO_ULM.png') }}" width="65">
        </td>
        <td width="70%" class="center bold">
            UNIVERSITAS LAMBUNG MANGKURAT<br>
            FAKULTAS TEKNIK<br>
            PROGRAM STUDI {{ strtoupper($rps->programStudi->nama_prodi) }}
        </td>
        <td width="15%"></td>
    </tr>
    <tr class="bg-orange">
        <td colspan="3" class="center bold">
            RENCANA PEMBELAJARAN SEMESTER
        </td>
    </tr>
</table>

{{-- ===================================================== --}}
{{-- IDENTITAS MATA KULIAH --}}
{{-- ===================================================== --}}
<table>
    <tr class="bg-gray bold center">
        <td>Identitas MK</td>
        <td>Nama Mata Kuliah</td>
        <td>Kode MK</td>
        <td>Rumpun MK</td>
        <td colspan="3">BOBOT (SKS)</td>
        <td>Semester</td>
        <td>Tgl Penyusunan</td>
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
    <tr class="bg-gray bold center">
        <td>Otoritas</td>
        <td>Pengembang RPS</td>
        <td>Koordinator MK</td>
        <td>Koordinator Prodi</td>
    </tr>
    <tr height="60">
        <td></td>
        <td>{{ $rps->mataKuliah->pengembangRps->username }}</td>
        <td>{{ $rps->mataKuliah->koordinatorMk->username }}</td>
        <td>{{ $rps->kaprodi->username }}</td>
    </tr>
</table>

{{-- ===================================================== --}}
{{-- CAPAIAN PEMBELAJARAN --}}
{{-- ===================================================== --}}
<table>
    <tr class="bg-gray bold">
        <td colspan="3">Capaian Pembelajaran Lulusan (CPL)</td>
    </tr>

    @foreach($assocCpls as $cpl)
    <tr>
        <td width="10%" class="center">{{ $cpl->nama_kode_cpl }}</td>
        <td colspan="2">
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
    <tr class="bg-gray bold">
        <td colspan="2">Capaian Pembelajaran Mata Kuliah (CPMK)</td>
        <td class="center">CPL yang didukung</td>
    </tr>

    @foreach($assocCpmk as $cpmk)
    <tr>
        <td width="10%" class="center">{{ $cpmk->nama_kode_cpmk }}</td>
        <td>
            {{ $cpmk->desc_cpmk_id }}<br>
            <span class="italic">{{ $cpmk->desc_cpmk_en }}</span>
        </td>
        <td class="center">
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
    <tr class="bg-gray bold">
        <td colspan="2">Sub-Capaian Pembelajaran (Sub CPMK)</td>
        <td class="center">CPMK</td>
    </tr>

    @foreach($assocSubCpmk as $sc)
    <tr>
        <td width="10%" class="center">{{ $sc->nama_kode_sub_cpmk }}</td>
        <td>{{ $sc->desc_sub_cpmk_id }}</td>
        <td class="center">{{ $sc->cpmk->nama_kode_cpmk }}</td>
    </tr>
    @endforeach
</table>

{{-- ===================================================== --}}
{{-- PENILAIAN --}}
{{-- ===================================================== --}}
<table class="small">
<thead>
<tr class="bg-gray bold center">
    <td rowspan="2">CPL</td>
    <td rowspan="2">CPMK</td>
    <td rowspan="2">Bobot CPMK</td>
    <td colspan="10">Bobot Tiap Bentuk Penilaian</td>
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
</table>

<p class="small italic">
*Kegiatan partisipatif dan/atau hasil proyek wajib masuk dalam komponen penilaian minimal 50%
</p>

<table>
    <tr>
        <td width="15%" class="bold">Bahan Kajian:<br>Materi Pembelajaran</td>
        <td>
            {!! nl2br(e($rps->materi_pembelajaran)) !!}
        </td>
    </tr>
</table>

<table>
    <tr class="bg-gray bold">
        <td width="15%">Pustaka</td>
        <td>Utama:</td>
    </tr>
    <tr>
        <td></td>
        <td>
            {!! nl2br(e($rps->pustaka_utama)) !!}
        </td>
    </tr>
    <tr class="bg-gray bold">
        <td></td>
        <td>Pendukung:</td>
    </tr>
    <tr>
        <td></td>
        <td>
            {!! nl2br(e($rps->pustaka_pendukung)) !!}
        </td>
    </tr>
</table>

<table>
    <tr>
        <td width="15%" class="bold">Mata Kuliah<br>Prasyarat</td>
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
    <tr class="bg-gray bold center">
        <td colspan="2">Media Pembelajaran</td>
    </tr>
    <tr class="bg-gray bold">
        <td width="50%">Perangkat Lunak:</td>
        <td width="50%">Perangkat Keras:</td>
    </tr>
    <tr>
        <td>{{ $rps->mediaPerangkatLunak }}</td>
        <td>{{ $rps->mediaPerangkatKeras }}</td>
    </tr>
</table>



{{-- ===================================================== --}}
{{-- RENCANA MINGGUAN --}}
{{-- ===================================================== --}}

<table class="small">
<thead>
<tr class="bg-gray bold center">
    <td>Minggu</td>
    <td>CPMK</td>
    <td>Sub-CPMK</td>
    <td>Indikator</td>
    <td>Kriteria</td>
    <td>Materi</td>
    <td>Model</td>
    <td>Synchronous</td>
    <td>Asynchronous</td>
    <td>Referensi</td>
</tr>
</thead>
<tbody>
@foreach($rps->topics as $topic)
<tr>
    <td class="center">{{ $topic->weeks->pluck('week')->implode(',') }}</td>

    @if($topic->tipe === 'topik')
        <td class="center">{{ $topic->subCpmk->cpmk->nama_kode_cpmk }}</td>
        <td>{{ $topic->subCpmk->nama_kode_sub_cpmk }}</td>
        <td>{{ $topic->indikator }}</td>
        <td>{{ $topic->teknikPenilaianFormatted }}</td>
        <td>{{ $topic->materi_pembelajaran }}</td>
        <td>{{ $rps->modelPembelajaran->nama_model_pembelajaran }}</td>
        <td>{{ $topic->aktivitasPembelajaran->firstWhere('tipe','TM')->jumlah_pertemuan ?? '-' }}</td>
        <td>{{ $topic->aktivitasPembelajaran->firstWhere('tipe','BM')->jumlah_pertemuan ?? '-' }}</td>
        <td>{{ $topic->refrensi }}</td>
    @else
        <td colspan="9" class="center bold bg-blue">
            {{ $topic->tipe === 'uts' ? 'UJIAN TENGAH SEMESTER' : 'UJIAN AKHIR SEMESTER' }}
        </td>
    @endif
</tr>
@endforeach
</tbody>
</table>

</body>
</html>