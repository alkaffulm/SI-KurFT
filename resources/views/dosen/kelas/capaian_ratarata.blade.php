<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capaian Rata-Rata Mahasiswa</title>

    @vite('resources/css/app.css')

    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

@include('layouts.navbar')
@include('layouts.sidebar')

<div class="sm:ml-64 p-4 sm:p-6">
    <div class="mt-20 w-full space-y-6">

    <div class="bg-white rounded-xl shadow-lg w-full">
        <div class="flex items-center justify-between px-4 sm:px-6 pt-4">
            <a href="{{ route('dosen_kelas.index') }}"
            class="inline-block px-4 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                Kembali
            </a>
        </div>

        @php
            $mk = $biodata->mataKuliahModel;
            $ps = $mk?->programStudi;
            $dosen = $biodata->userModel;

            $sksTeori = (int) ($mk?->sks_teori ?? 0);
            $sksPrak = (int) ($mk?->sks_praktikum ?? 0);
            $jumlahSks = $mk?->jumlahSks ?? ($sksTeori + $sksPrak);
            $jumlahMhs = $biodata->jumlah_mhs ?? ($kelas->mahasiswa->count() ?? 0);
        @endphp

        <div class="px-4 sm:px-6 pt-4 pb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                Biodata Mata Kuliah
            </h1>
            <p class="text-gray-500 text-base mt-1">
                Informasi mata kuliah, prodi, kelas, dan dosen pengampu.
            </p>

            <div class="mt-5 rounded-lg border border-gray-200 overflow-hidden">
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
                        <span class="text-gray-500">(SKS Teori: {{ $sksTeori }}, SKS Praktikum: {{ $sksPrak }})</span>
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
        </div>
    </div>


        <div class="bg-white rounded-xl shadow-lg w-full">
            <div class="pt-6 px-4 sm:px-6">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-700">Capaian Rata-Rata Mahasiswa</h1>
                <p class="text-gray-500 text-base">
                    Grafik menampilkan rata-rata nilai tiap CPMK, dengan nilai maks CPMK.
                </p>
            </div>

            <div class="w-full px-2 sm:px-6 pb-6 pt-2">
                <div class="w-full h-[260px] sm:h-[320px]">
                    <canvas id="cpmkChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        {{-- <div class="bg-white rounded-xl shadow-lg w-full"> --}}
            <div class="px-4 sm:px-6 pt-4">
                <h2 class="text-xl font-bold text-biru-custom">Tabel Mahasiswa</h2>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-300 mt-4 mx-4 sm:mx-6 mb-6">
                <table class="w-full text-sm text-center text-black border border-gray-300">
                    <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                    <tr>
                        <th rowspan="2" class="text-center px-6 py-3 border-r border-gray-400 w-44">NIM</th>
                        <th rowspan="2" class="text-center px-6 py-3 border-r border-gray-400">Nama Lengkap</th>

                        @foreach($rencanaAsesmen as $ra)
                            @php
                                $cpmkForAsesmen = $cpmkByAsesmen[$ra->id_rencana_asesmen] ?? collect();
                            @endphp
                            <th colspan="{{ $cpmkForAsesmen->count() }}"
                                class="text-center px-8 py-3 border-r border-gray-400">
                                {{ strtoupper($ra->tipe_komponen) }}
                            </th>
                        @endforeach
                    </tr>

                    <tr>
                        @foreach($rencanaAsesmen as $ra)
                            @php
                                $cpmkForAsesmen = $cpmkByAsesmen[$ra->id_rencana_asesmen] ?? collect();
                            @endphp

                            @foreach($cpmkForAsesmen as $bc)
                                <th class="text-center px-6 py-3 border-r border-gray-400 whitespace-nowrap">
                                    {{ $bc->mkCpmkMap?->cpmk?->nama_kode_cpmk ?? '-' }}<br>
                                    <span class="font-normal">Maks: {{ (int) $bc->bobot }}</span>
                                </th>
                            @endforeach
                        @endforeach
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($kelas->mahasiswa as $mhs)
                        <tr class="text-black bg-white hover:bg-gray-50 border-t border-gray-200">
                            <td class="text-center px-6 py-3 font-medium border-r border-gray-200">
                                {{ $mhs->nim }}
                            </td>
                            <td class="text-center px-6 py-3 border-r border-gray-200">
                                {{ $mhs->nama_lengkap }}
                            </td>

                            @foreach($rencanaAsesmen as $ra)
                                @php
                                    $cpmkForAsesmen = $cpmkByAsesmen[$ra->id_rencana_asesmen] ?? collect();
                                @endphp

                                @foreach($cpmkForAsesmen as $bc)
                                    @php
                                        $idCpmk = $bc->mkCpmkMap?->id_cpmk;
                                        $nilaiBobot = $idCpmk
                                            ? ($nilaiBobotIndex[$mhs->nim][$ra->id_rencana_asesmen][$idCpmk] ?? null)
                                            : null;
                                    @endphp

                                    <td class="text-center px-6 py-2 border-r border-gray-200 whitespace-nowrap">
                                        @if($nilaiBobot === null || $nilaiBobot === '')
                                            <span class="text-gray-400">-</span> / {{ (float) $bc->bobot }}
                                        @else
                                            {{ $nilaiBobot }} / {{ (float) $bc->bobot }}
                                        @endif
                                    </td>
                                @endforeach
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        {{-- </div> --}}

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const el = document.getElementById('cpmkChart');
const ctx = el.getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($labels),
        datasets: [
            {
                label: 'Rata-rata Mahasiswa',
                data: @json($avgData),
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            },
            {
                label: 'Nilai Maks CPMK',
                data: @json($maxData),
                backgroundColor: 'rgba(75, 192, 192, 0.6)'
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'top' },
            tooltip: { mode: 'index', intersect: false }
        },
        scales: {
            x: {
                ticks: { maxRotation: 30, minRotation: 0 }
            },
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
