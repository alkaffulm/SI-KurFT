<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluasi Mahasiswa per Kelas</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

@include('layouts.navbar', ['userRole' => $userRole])
@include('layouts.sidebar', ['userRole' => $userRole])

<div class="py-8 px-4 sm:px-6 lg:px-10 sm:ml-64">
    <main class="mt-16 max-w-7xl mx-auto">

        {{-- Breadcrumb --}}
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Menu Utama</span>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Evaluasi Mahasiswa</span>
                    </div>
                </li>
            </ol>
        </nav>

        @php
            $mk = $biodata->mataKuliahModel ?? null;
            $ps = $mk?->programStudi ?? null;
            $dosen = $biodata->userModel ?? null;

            $sksTeori = (int) ($mk?->sks_teori ?? 0);
            $sksPrak = (int) ($mk?->sks_praktikum ?? 0);
            $jumlahSks = $mk?->jumlahSks ?? ($sksTeori + $sksPrak);
            $jumlahMhs = $biodata->jumlah_mhs ?? ($kelas->mahasiswa->count() ?? 0);
        @endphp

        {{-- Card wrapper --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            {{-- Bagian 1: Biodata MK --}}
            <div class="px-4 sm:px-6 pt-6 pb-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                            Evaluasi Mahasiswa per Kelas
                        </h1>
                        <p class="text-gray-500 text-base mt-1">
                            Rekap ketercapaian CPL untuk mahasiswa pada kelas ini. Ambang kelulusan minimal: <span class="font-semibold">{{ $threshold }}%</span>.
                        </p>
                    </div>

                    <a href="{{ route('evaluasi-mahasiswa.index') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        Kembali
                    </a>
                </div>

                <div class="mt-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Biodata Mata Kuliah</h2>
                    <p class="text-gray-500 text-sm">
                        Informasi mata kuliah, prodi, kelas, dan dosen pengampu.
                    </p>

                    <div class="mt-4 rounded-lg border border-gray-200 overflow-hidden">
                        <div class="grid grid-cols-1 sm:grid-cols-3">
                            <div class="px-4 py-3 bg-teks-biru-custom text-sm font-medium text-white border-b sm:border-b-0 sm:border-r border-gray-200">
                                Mata Kuliah
                            </div>
                            <div class="px-4 py-3 text-sm text-gray-800 sm:col-span-2 border-b border-gray-200">
                                <span class="font-semibold">{{ $mk?->kode_mk ?? '-' }}</span>
                                — {{ $mk?->nama_matkul_id ?? '-' }}
                            </div>

                            <div class="px-4 py-3 bg-teks-biru-custom text-sm font-medium text-white border-b sm:border-r border-gray-200">
                                Program Studi
                            </div>
                            <div class="px-4 py-3 text-sm text-gray-800 sm:col-span-2 border-b border-gray-200">
                                {{ $ps?->nama_prodi ?? '-' }}
                            </div>

                            <div class="px-4 py-3 bg-teks-biru-custom text-sm font-medium text-white border-b sm:border-r border-gray-200">
                                Semester
                            </div>
                            <div class="px-4 py-3 text-sm text-gray-800 sm:col-span-2 border-b border-gray-200">
                                {{ $mk?->semester ?? '-' }}
                            </div>

                            <div class="px-4 py-3 bg-teks-biru-custom text-sm font-medium text-white border-b sm:border-r border-gray-200">
                                SKS
                            </div>
                            <div class="px-4 py-3 text-sm text-gray-800 sm:col-span-2 border-b border-gray-200">
                                <span class="font-semibold">{{ $jumlahSks }} SKS</span>
                                <span class="text-gray-500">(Teori: {{ $sksTeori }}, Praktikum: {{ $sksPrak }})</span>
                            </div>

                            <div class="px-4 py-3 bg-teks-biru-custom text-sm font-medium text-white border-b sm:border-r border-gray-200">
                                Tahun Akademik
                            </div>
                            <div class="px-4 py-3 text-sm text-gray-800 sm:col-span-2 border-b border-gray-200">
                                {{ $biodata->tahun_akademik ?? '-' }}
                            </div>

                            <div class="px-4 py-3 bg-teks-biru-custom text-sm font-medium text-white border-b sm:border-r border-gray-200">
                                Kurikulum
                            </div>
                            <div class="px-4 py-3 text-sm text-gray-800 sm:col-span-2 border-b border-gray-200">
                                {{ $biodata->tahun_kurikulum ?? '-' }}
                            </div>

                            <div class="px-4 py-3 bg-teks-biru-custom text-sm font-medium text-white border-b sm:border-r border-gray-200">
                                Kelas Paralel
                            </div>
                            <div class="px-4 py-3 text-sm text-gray-800 sm:col-span-2 border-b border-gray-200">
                                {{ $biodata->paralel_ke ?? '-' }}
                            </div>

                            <div class="px-4 py-3 bg-teks-biru-custom text-sm font-medium text-white sm:border-r border-gray-200">
                                Jumlah Mahasiswa
                            </div>
                            <div class="px-4 py-3 text-sm text-gray-800 sm:col-span-2">
                                {{ $jumlahMhs }}
                            </div>

                            <div class="px-4 py-3 bg-teks-biru-custom text-sm font-medium text-white border-t sm:border-t sm:border-r border-gray-200">
                                Dosen Pengampu
                            </div>
                            <div class="px-4 py-3 text-sm text-gray-800 sm:col-span-2 border-t border-gray-200">
                                <span class="font-medium">{{ $dosen?->username ?? $dosen?->email ?? '-' }}</span>
                                @if($dosen?->NIP)
                                    <span class="text-gray-500"> (NIP: {{ $dosen->NIP }})</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-sm text-gray-600">
                        <p>
                            Halaman ini menampilkan ketercapaian CPL yang terkait dengan mata kuliah ini untuk setiap mahasiswa pada kelas.
                            Mahasiswa dinyatakan <span class="font-semibold text-green-700">Lulus</span> jika seluruh CPL yang terkait memiliki nilai minimal <span class="font-semibold">{{ $threshold }}%</span>.
                        </p>
                    </div>

                    {{-- bagian awalan pembagian penjelasan mapping antara cpl yang dicapai di matkul ini, cpmknya, bobot cpmk penyusun ke cpl di matkul ini aja --}}
                    <div class="flex items-center justify-between gap-3 flex-wrap mt-6">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">
                                Mapping CPL dan CPMK pada Mata Kuliah {{ $mk?->nama_matkul_id ?? '-' }}
                            </h2>
                            <p class="text-sm text-gray-500">
                                Tabel ini menunjukkan CPL yang dicapai oleh mata kuliah ini, CPMK penyusunnya, serta bobot kontribusi CPMK terhadap CPL.
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 overflow-x-auto rounded-lg border border-gray-200">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead class="bg-teks-biru-custom text-white">
                                <tr>
                                    <th class="px-4 py-3 w-[150px]">CPL yang disusun</th>
                                    <th class="px-4 py-3 w-[50px]">CPMK</th>
                                    <th class="px-4 py-3 text-center w-[100px]">Bobot CPMK → CPL</th>
                                    <th class="px-4 py-3 w-[100px]">Komponen Evaluasi</th>
                                    <th class="px-4 py-3 text-center w-[160px]">Bobot Komponen → CPMK</th>
                                    <th class="px-4 py-3 text-center w-[150px]">Maks Nilai Input</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @if(empty($mappingDetail) || (is_countable($mappingDetail) && count($mappingDetail) === 0))
                                    <tr class="border-t">
                                        <td colspan="6" class="px-4 py-4 text-gray-500 text-center">
                                            Belum ada mapping CPL–CPMK dan komponen asesmen untuk mata kuliah ini.
                                        </td>
                                    </tr>
                                @else
                                    @php
                                        // Group: CPL -> CPMK (di dalamnya banyak komponen)
                                        $grouped = collect($mappingDetail)
                                            ->groupBy(fn($r) => $r->id_cpl . '|' . $r->id_cpmk);
                                    @endphp

                                    @foreach($grouped as $key => $rows)
                                        @php
                                            $first = $rows->first();
                                            $rowspan = $rows->count();

                                            $idCpl = $first->id_cpl;
                                            $idCpmk = $first->id_cpmk;

                                            $bobotCpmkKeCpl = (float)($first->bobot_cpmk_ke_cpl ?? 0);
                                        @endphp

                                        @foreach($rows as $i => $r)
                                            @php
                                                $idRa = $r->id_rencana_asesmen;
                                                $totalBobotKomponen = (float)($totalBobotKomponenMap[$idRa] ?? 0);
                                                $bobotKomponenKeCpmk = (float)($r->bobot_komponen_ke_cpmk ?? 0);

                                                // format nama komponen (sesuai getter di model, tapi ini versi blade)
                                                $namaKomponen = in_array($r->tipe_komponen, ['tugas','kuis'])
                                                    ? ucfirst($r->tipe_komponen).' '.$r->nomor_komponen
                                                    : strtoupper($r->tipe_komponen);

                                                $maksNilai = $totalBobotKomponen > 0
                                                    ? round(($bobotKomponenKeCpmk / $totalBobotKomponen) * 100, 1)
                                                    : 0;
                                            @endphp

                                            <tr class="border-t hover:bg-gray-50 align-top">
                                                {{-- CPL --}}
                                                @if($i === 0)
                                                    <td class="px-4 py-4" rowspan="{{ $rowspan }}">
                                                        <div class="font-semibold text-gray-900">{{ $first->kode_cpl ?? '-' }}</div>
                                                    </td>

                                                    {{-- CPMK --}}
                                                    <td class="px-4 py-4" rowspan="{{ $rowspan }}">
                                                        <div class="font-semibold text-gray-900">{{ $first->kode_cpmk ?? '-' }}</div>
                                                    </td>

                                                    {{-- Bobot CPMK -> CPL --}}
                                                    <td class="px-4 py-4 text-center" rowspan="{{ $rowspan }}">
                                                        <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 text-gray-800">
                                                            {{ round($bobotCpmkKeCpl, 2) }}
                                                        </span>
                                                    </td>
                                                @endif

                                                {{-- Komponen --}}
                                                <td class="px-4 py-4">
                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-50 text-blue-700">
                                                        {{ $namaKomponen }}
                                                    </span>
                                                </td>

                                                {{-- Bobot Komponen -> CPMK --}}
                                                <td class="px-4 py-4 text-center">
                                                    <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 text-gray-800">
                                                        {{ round($bobotKomponenKeCpmk, 2) }}
                                                    </span>
                                                </td>

                                                {{-- Maks Nilai --}}
                                                <td class="px-4 py-4 text-center">
                                                    <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg text-xs font-semibold
                                                        {{ $maksNilai > 0 ? ' text-black' : ' text-black' }}">
                                                        {{ $maksNilai > 0 ? $maksNilai : '-' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-5 text-xs text-black">
                        <p>
                            Nilai Input dihitung dari (bobot CPMK pada komponen / total bobot komponen) × 100. Dosen tidak boleh menginput melebihi nilai maksimum ini.
                        </p>
                        <p>
                            Catatan: Bobot CPMK → CPL pada tabel ini adalah bobot kontribusi CPMK dalam mata kuliah ini untuk menyusun CPL terkait.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Bagian 2: Mahasiswa lulus --}}
            <div class="px-4 sm:px-6 py-6 border-b border-gray-200">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Mahasiswa yang telah mencapai ketercapaian CPL di Mata Kuliah ini</h2>
                        <p class="text-sm text-gray-500">Daftar mahasiswa dengan ketercapaian CPL minimal ≥ {{ $threshold }}%.</p>
                    </div>
                    <span class="text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg px-3 py-1">
                        Total: <span class="font-semibold">{{ is_countable($lulus) ? count($lulus) : 0 }}</span>
                    </span>
                </div>

                <div class="mt-4 overflow-x-auto rounded-lg">
                    <table class="w-full text-sm text-left text-black border border-black">
                        <thead class="bg-teks-biru-custom text-white">
                            <tr>
                                <th class="px-4 py-3">NIM</th>
                                <th class="px-4 py-3">Nama</th>
                                @foreach($cplList as $cpl)
                                    <th class="px-4 py-3 text-center whitespace-nowrap">{{ $cpl['kode_cpl'] }}</th>
                                @endforeach
                                <th class="px-4 py-3 text-center whitespace-nowrap">Ketercapaian CPL yang Didapat</th>
                                <th class="px-4 py-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($lulus as $row)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $row['nim'] }}</td>
                                    <td class="px-4 py-3">{{ $row['nama_lengkap'] }}</td>

                                    @foreach($cplList as $cpl)
                                        @php
                                            $idCpl = $cpl['id_cpl'];
                                            $p = $row['persen_cpl'][$idCpl] ?? null;
                                        @endphp
                                        <td class="px-4 py-3 text-center">
                                            {{ $p === null ? '-' : $p.'%' }}
                                        </td>
                                    @endforeach

                                    <td class="px-4 py-3 text-center font-semibold">
                                        {{ $row['min_persen'] === null ? '-' : $row['min_persen'].'%' }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                            Lulus
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-t">
                                    <td class="px-4 py-4 text-gray-500" colspan="{{ 5 + count($cplList) }}">
                                        Belum ada mahasiswa yang memenuhi batas minimal.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Bagian 3: Mahasiswa tidak lulus + update --}}
            <div class="px-4 sm:px-6 py-6">
                <div class="flex items-center justify-between gap-3 flex-wrap">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Mahasiswa yang belum mencapai ketercapaian CPL di Mata Kuliah ini</h2>
                        <p class="text-sm text-gray-500">Mahasiswa yang masih di bawah batas minimal & dapat diperbaiki nilainya.</p>
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-700 bg-gray-50 border border-gray-200 rounded-lg px-3 py-1">
                            Total: <span class="font-semibold">{{ is_countable($tidakLulus) ? count($tidakLulus) : 0 }}</span>
                        </span>

                        {{-- <a href="{{ route('dosen.kelas.penilaian', $kelas->id_kelas) }}"
                           class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-biru-custom rounded-lg hover:bg-blue-700">
                            Update Nilai (Masuk Halaman Penilaian)
                        </a> --}}
                    </div>
                </div>

                <div class="mt-4 overflow-x-auto rounded-lg">
                    <table class="w-full text-sm text-left text-black border border-black">
                        <thead class="bg-teks-biru-custom text-white border border-black">
                            <tr>
                                <th class="px-3 py-3">NIM</th>
                                <th class="px-3 py-3">Nama</th>
                                <th class="px-3 py-3 text-center">CPL</th>
                                <th class="px-3 py-3 text-center">CPMK</th>
                                <th class="px-3 py-3">Komponen</th>
                                <th class="px-3 py-3 text-center">Bobot (Mhs/Total)</th>
                                <th class="px-3 py-3 text-center">Nilai</th>
                                <th class="px-3 py-3 text-center">Input Baru</th>
                                <th class="px-3 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                        @php
                            $groupedByNim = collect($updateRows)->groupBy('nim');
                        @endphp

                        @forelse($groupedByNim as $nim => $rows)
                            @php $rowspan = $rows->count(); @endphp

                            @foreach($rows as $i => $r)
                                <tr class="border-t hover:bg-gray-50 align-top">
                                    @if($i === 0)
                                        <td class="px-3 py-3 font-medium" rowspan="{{ $rowspan }}">
                                            {{ $r['nim'] }}
                                        </td>
                                        <td class="px-3 py-3" rowspan="{{ $rowspan }}">
                                            {{ $r['nama_lengkap'] }}
                                        </td>
                                    @endif

                                    <td class="px-3 py-3 text-center">
                                        <span class="px-2 py-1 rounded bg-gray-100 text-xs font-semibold">{{ $r['kode_cpl'] }}</span>
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <span class="px-2 py-1 rounded bg-gray-100 text-xs font-semibold">{{ $r['kode_cpmk'] }}</span>
                                    </td>

                                    <td class="px-3 py-3">
                                        <span class="px-2 py-1 rounded bg-blue-50 text-blue-700 text-xs font-semibold">
                                            {{ $r['nama_komponen'] }}
                                        </span>
                                        <div class="text-[11px] text-gray-500 mt-1">
                                            Maks nilai: {{ $r['maks_nilai_input'] >= 0 ? $r['maks_nilai_input'] : '-' }}
                                        </div>
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <div class="font-semibold">{{ $r['bobot_mhs'] }}</div>
                                        <div class="text-[11px] text-gray-500">/ {{ $r['bobot_total'] }}</div>
                                    </td>

                                    <td class="px-3 py-3 text-center font-semibold">
                                        {{ $r['nilai_lama'] }}
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <form method="POST" action="{{ route('dosen.evaluasi.updateNilai', $kelas->id_kelas) }}" class="flex items-center justify-center gap-2">
                                            @csrf
                                            <input type="hidden" name="nim" value="{{ $r['nim'] }}">
                                            <input type="hidden" name="id_rencana_asesmen" value="{{ $r['id_rencana_asesmen'] }}">
                                            <input type="hidden" name="id_cpmk" value="{{ $r['id_cpmk'] }}">
                                            <input type="hidden" name="maks_nilai_input" value="{{ $r['maks_nilai_input'] }}">

                                            <input
                                                type="number"
                                                name="nilai_baru"
                                                step="0.1"
                                                min="0"
                                                max="{{ $r['maks_nilai_input'] }}"
                                                value="{{ $r['nilai_lama'] }}"
                                                class="w-24 border rounded px-2 py-1 text-center"
                                            />
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                            <button type="submit"
                                                class="px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr class="border-t">
                                <td colspan="9" class="px-4 py-4 text-gray-500 text-center">
                                    Tidak ada data update.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                @if(session('success'))
                    <div class="mt-3 text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg px-3 py-2">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mt-3 text-sm text-red-700 bg-red-50 border border-red-200 rounded-lg px-3 py-2">
                        {{ session('error') }}
                    </div>
                @endif


                <div class="mt-4 text-sm text-gray-500">
                    Catatan: Status “Lulus” ditentukan dari nilai minimum CPL terkait mata kuliah ini pada mahasiswa.
                </div>
            </div>

        </div>
    </main>
</div>

</body>
</html>
