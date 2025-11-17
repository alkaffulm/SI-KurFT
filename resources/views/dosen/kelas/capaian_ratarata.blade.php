<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Mahasiswa per Kelas</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

    {{-- Select2 --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .select2-container--default .select2-selection--multiple {
            border-radius: 0.5rem;
            border-color: #D1D5DB;
            padding: 0.35rem;
            min-height: 42px;
        }

        .select2-container {
            width: 100% !important;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-6 sm:p-8 sm:ml-64">
        <div class="mt-20 max-w-8xl ml-20">
            <div class="bg-white p-4 rounded-xl shadow-lg">
                <a href="{{ route('dosen_kelas.index') }}"
                    class="ml-10 mt-2 inline-block px-4 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    Kembali
                </a>
                <div class="mt-5 mb-20">
                    <h1 class="text-3xl font-bold text-gray-700">Capaian Rata-Rata Mahasiswa</h1>
                    <p class="text-gray-500 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, corporis.</p>
                </div>
                <div class="w-full h-96">
                    <canvas id="capaianRataRataChart" class="w-full h-full"></canvas>
                </div>
            </div>

            {{-- <div class="bg-white p-4 rounded-xl shadow-lg mt-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Grafik Capaian Rata-Rata Mahasiswa</h2>
                <div class="w-full h-80">
                    {{-- Area untuk merender Chart.js --}}
                    {{-- <canvas id="capaianRataRataChart"></canvas>
                </div>
            </div> --}}
            <div class="bg-white p-4 rounded-xl shadow-lg mt-10">
                <h2 class="text-xl font-bold text-biru-custom mt-2 mb-4">Tabel Mahasiswa</h2>

                <div class="overflow-x-auto rounded-lg border border-gray-400 mt-4">
                    <table class="w-full text-sm text-center text-black border">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom w-40">
                            <tr>
                                <th rowspan="2" class="text-center px-6 py-3 border-r border-gray-400 w-40">NIM</th>
                                <th rowspan="2" class="text-center px-6 py-3">Nama Lengkap</th>

                                @foreach($rencanaAsesmen as $ra)
                                    @php
                                        $cpmkForAsesmen = $rencanaAsesmenCPMK->where('id_rencana_asesmen', $ra->id_rencana_asesmen);
                                    @endphp
                                    <th colspan="{{ $cpmkForAsesmen->count() }}" class="text-center px-12 py-3 border-r border-gray-400">
                                        {{ strtoupper($ra->tipe_komponen) }}
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach($rencanaAsesmen as $ra)
                                    @php
                                        $cpmkForAsesmen = $rencanaAsesmenCPMK->where('id_rencana_asesmen', $ra->id_rencana_asesmen);
                                    @endphp
                                    @foreach($cpmkForAsesmen as $bc)
                                        <th class="text-center px-6 py-3 border-r border-gray-400">
                                            {{ $bc->cpmk?->nama_kode_cpmk ?? '-' }}<br>
                                            <span class="font-normal">Maks: {{ (int) $bc->bobot }}</span>
                                        </th>
                                    @endforeach
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelas->mahasiswa as $mhs)
                                <tr class="text-black bg-white hover:bg-gray-100 border-t border-gray-400">
                                    <td class="text-center px-6 py-3 font-medium border-r border-gray-400">{{ $mhs->nim }}</td>
                                    <td class="text-center px-6 py-3">{{ $mhs->nama_lengkap }}</td>

                                    @foreach($rencanaAsesmen as $ra)
                                        @php
                                            $cpmkForAsesmen = $rencanaAsesmenCPMK->where('id_rencana_asesmen', $ra->id_rencana_asesmen);
                                        @endphp
                                        @foreach($cpmkForAsesmen as $bc)
                                            @php
                                                $nilai = $penilaian_mahasiswa
                                                    ->where('nim', $mhs->nim)
                                                    ->where('id_ren--cana_asesmen', $ra->id_rencana_asesmen)
                                                    ->where('id_cpmk', $bc->id_cpmk)
                                                    ->first()?->nilai ?? 0;
                                            @endphp
                                            <td class="text-center px-24 py-2 w-full">
                                                {{ $nilai }} / {{ (int) $bc->bobot }}
                                            </td>
                                        @endforeach
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('capaianRataRataChart').getContext('2d');

    const data = {
        labels: @json($chartLabels),
        datasets: [
            {
                label: 'Nilai Mahasiswa',
                data: @json($chartData),
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Rata-Rata Kelas',
                data: @json($chartRataRataKelas),
                type: 'line',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 2,
                fill: false,
                tension: 0.2
            },
            // {
            //     label: 'Nilai Target',
            //     data: Array(@json($chartLabels).length).fill(@json($nilaiTarget)),
            //     type: 'line',
            //     borderColor: 'rgba(255, 99, 132, 1)',
            //     borderWidth: 2,
            //     borderDash: [5,5],
            //     fill: false,
            //     tension: 0
            // }
        ]
    };

    const options = {
        maintainAspectRatio: false,
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            },
            tooltip: {
                mode: 'index',
                intersect: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        }
    };

    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>

</body>
</html>
