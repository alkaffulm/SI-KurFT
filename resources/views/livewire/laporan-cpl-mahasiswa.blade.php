<div>
    {{-- ================= FILTER ================= --}}
    <div class="flex gap-6 mb-6 flex-wrap">

        {{-- MODE --}}
        <div class="w-56">
            <label class="block text-sm font-medium text-gray-700">Mode Laporan</label>
            <select wire:model.live="mode"
                class="mt-1 block w-full rounded-md border-gray-300 p-2">
                <option value="mahasiswa">Per Mahasiswa</option>
                <option value="angkatan">Per Angkatan</option>
            </select>
        </div>

        {{-- TAHUN AKADEMIK (ANGKATAN MODE) --}}
        {{-- @if($mode === 'angkatan')
            <div class="w-64">
                <label class="block text-sm font-medium text-gray-700">Tahun Akademik</label>
                <select wire:model.live="tahunAkademikId"
                    class="mt-1 block w-full rounded-md border-gray-300 p-2">
                    <option value="">-- Pilih Tahun Akademik --</option>
                    @foreach($tahunAkademikList as $ta)
                        <option value="{{ $ta->id_tahun_akademik }}">
                            {{ $ta->tahun_akademik }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif --}}

        

        {{-- ANGKATAN --}}
        <div class="w-56">
            <label class="block text-sm font-medium text-gray-700">Angkatan</label>
            <select wire:model.live="angkatan"
                class="mt-1 block w-full rounded-md border-gray-300 p-2">
                <option value="">Pilih Angkatan Mahasiswa</option>
                @foreach($angkatanList as $a)
                    <option value="{{ $a }}">{{ $a }}</option>
                @endforeach
            </select>
        </div>

        {{-- MAHASISWA --}}
        @if($mode === 'mahasiswa')
            <div class="w-80">
                <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                <select wire:model.live="nim"
                    class="mt-1 block w-full rounded-md border-gray-300 p-2"
                    {{ empty($daftarMahasiswa) ? 'disabled' : '' }}>
                    <option value="">Pilih Nama Mahasiswa</option>
                    @foreach($daftarMahasiswa as $m)
                        <option value="{{ $m->nim }}">
                            {{ $m->nama_lengkap }} ({{ $m->nim }})
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

    </div>


    {{-- ================= MODE MAHASISWA ================= --}}
    @if($mode === 'mahasiswa')

        {{-- ===== EDGE CASE: BELUM PILIH ANGKATAN ===== --}}
        @if(empty($angkatan))
            <div class="mt-8 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                <p class="text-sm text-yellow-700">
                    Silakan pilih angkatan terlebih dahulu untuk menampilkan daftar mahasiswa.
                </p>
            </div>
        @endif

        {{-- ===== EDGE CASE: BELUM PILIH MAHASISWA ===== --}}
        @if(!empty($angkatan) && empty($nim))
            <div class="mt-8 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                <p class="text-sm text-yellow-700">
                    Silakan pilih mahasiswa untuk menampilkan laporan CPL per tahun akademik.
                </p>
            </div>
        @endif

        {{-- ===== EDGE CASE: DATA LAPORAN KOSONG ===== --}}
        @if(!empty($nim) && empty($laporanPerTahun))
            <div class="mt-8 bg-red-50 border-l-4 border-red-400 p-4 rounded">
                <p class="text-sm text-red-700">
                    Tidak ditemukan data CPL untuk mahasiswa dengan NIM
                    <strong>{{ $nim }}</strong>.
                    <br>
                    Pastikan mahasiswa sudah memiliki data kelas dan penilaian.
                </p>
            </div>
        @endif

        {{-- ===== EDGE CASE: TAHUN AKADEMIK < 4 ===== --}}
        @if(!empty($laporanPerTahun) && count($laporanPerTahun) < 4)
            <div class="mt-8 bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                <p class="text-sm text-blue-700">
                    Mahasiswa ini hanya memiliki data tahun akademik dari
                    <strong>{{ $laporanPerTahun[0]['tahun_akademik'] }}</strong>
                    sampai
                    <strong>{{ end($laporanPerTahun)['tahun_akademik'] }}</strong>.
                    <br>
                    Hubungi admin program studi jika data tahun akademik belum lengkap.
                </p>
            </div>
        @endif

        {{-- ===== LOOP PER TAHUN AKADEMIK ===== --}}
        @foreach($laporanPerTahun as $index => $laporan)

            <div class="mt-10 space-y-6">

                {{-- TITLE --}}
                <h2 class="text-xl font-bold text-gray-800">
                    Tahun Akademik {{ $laporan['tahun_akademik'] }}
                </h2>

                {{-- ================= TABLE MK ================= --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">
                        Daftar Kelas & Mata Kuliah
                    </h3>

                    @if(empty($laporan['kelas']) || count($laporan['kelas']) === 0)
                        <p class="text-sm text-gray-500">
                            Tidak ada data kelas pada tahun akademik ini.
                        </p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border">
                                <thead class="bg-teks-biru-custom text-white text-center">
                                    <tr>
                                        <th class="px-3 py-2">Kode MK</th>
                                        <th class="px-3 py-2">Mata Kuliah</th>
                                        <th class="px-3 py-2">Kelas</th>
                                        <th class="px-3 py-2">% Rata-rata Bobot</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($laporan['kelas'] as $k)
                                        <tr class="border-t">
                                            <td class="px-3 py-2">{{ $k->kode_mk }}</td>
                                            <td class="px-3 py-2">{{ $k->nama_mk }}</td>
                                            <td class="px-3 py-2">{{ $k->nama_kelas }}</td>
                                            <td class="px-3 py-2">
                                                {{ $k->rata_rata_bobot !== null
                                                    ? number_format($k->rata_rata_bobot, 2).'%'
                                                    : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- ================= TABLE CPL ================= --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">
                        Ketercapaian CPL
                    </h3>

                    @if(empty($laporan['cpl']))
                        <p class="text-sm text-gray-500">
                            Tidak ada data CPL pada tahun akademik ini.
                        </p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border">
                                <thead class="bg-teks-biru-custom text-white">
                                    <tr>
                                        <th class="px-3 py-2">Kode CPL</th>
                                        <th class="px-3 py-2">Deskripsi</th>
                                        <th class="px-3 py-2 text-center">% Ketercapaian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($laporan['cpl'] as $row)
                                        <tr class="border-t">
                                            <td class="px-3 py-2">{{ $row['kode_cpl'] }}</td>
                                            <td class="px-3 py-2">{{ $row['deskripsi'] }}</td>
                                            <td class="px-3 py-2 text-center">
                                                {{ $row['nilai_akhir_cpl'] !== null
                                                    ? number_format($row['nilai_akhir_cpl'], 2).'%'
                                                    : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- ================= CHART ================= --}}
                @if(!empty($laporan['chart']['data']))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-lg font-semibold mb-3">
                                Grafik Bar CPL
                            </h3>
                            <canvas id="barChart-{{ $index }}"
                                data-labels='@json($laporan["chart"]["labels"])'
                                data-data='@json($laporan["chart"]["data"])'>
                            </canvas>
                        </div>

                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-lg font-semibold mb-3">
                                Grafik Radar CPL
                            </h3>
                            <canvas id="radarChart-{{ $index }}"></canvas>
                        </div>

                    </div>
                @endif

            </div>

        @endforeach

    @endif



    {{-- ================= MODE ANGKATAN ================= --}}
    {{-- @if($mode === 'angkatan' && !empty($cplReportsAngkatan))

        <div class="mt-8 bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-3">
                Laporan CPL Angkatan
            </h3>

            <div class="overflow-x-auto mb-6">
                <table class="w-full text-sm border">
                    <thead class="bg-teks-biru-custom text-white">
                        <tr>
                            <th class="px-3 py-2">Kode CPL</th>
                            <th class="px-3 py-2">Deskripsi</th>
                            <th class="px-3 py-2 text-center">% Ketercapaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cplReportsAngkatan as $row)
                            <tr class="border-t">
                                <td class="px-3 py-2">{{ $row['kode_cpl'] }}</td>
                                <td class="px-3 py-2">{{ $row['deskripsi'] }}</td>
                                <td class="px-3 py-2 text-center">
                                    {{ $row['nilai_akhir_cpl'] !== null
                                        ? number_format($row['nilai_akhir_cpl'], 2).'%'
                                        : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">
                        Grafik Bar CPL Angkatan
                    </h3>
                    <canvas id="barChartAngkatan"
                        data-labels='@json(array_column($cplReportsAngkatan,"kode_cpl"))'
                        data-data='@json(array_map(fn($r)=>$r["nilai_akhir_cpl"] ?? 0,$cplReportsAngkatan))'>
                    </canvas>

                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">
                        Grafik Radar CPL Angkatan
                    </h3>
                    <canvas id="radarChartAngkatan"></canvas>
                </div>

            </div>

        </div>

    @endif --}}

    {{-- @if($mode === 'angkatan' && !empty($laporanAngkatanPerTahun))

        @foreach($laporanAngkatanPerTahun as $i => $laporan)

            <div class="mt-10 space-y-6">

                <h2 class="text-xl font-bold">
                    Tahun Akademik {{ $laporan['tahun_akademik'] }}
                </h2>

                <table class="w-full border text-sm">
                    @foreach($laporan['cpl'] as $row)
                        <tr>
                            <td>{{ $row['kode_cpl'] }}</td>
                            <td>{{ $row['deskripsi'] }}</td>
                            <td>{{ $row['nilai_akhir_cpl'] }}%</td>
                        </tr>
                    @endforeach
                </table>

                <canvas id="barChartAngkatan-{{ $i }}"
                    data-labels='@json($laporan["chart"]["labels"])'
                    data-data='@json($laporan["chart"]["data"])'>
                </canvas>

                <canvas id="radarChartAngkatan-{{ $i }}"></canvas>

            </div>

        @endforeach 
    @endif --}}
    {{-- ================= MODE ANGKATAN ================= --}}
    @if($mode === 'angkatan')

        {{-- ===== EDGE CASE: BELUM PILIH ANGKATAN ===== --}}
        @if(empty($angkatan))
            <div class="mt-8 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                <p class="text-sm text-yellow-700">
                    Silakan pilih angkatan terlebih dahulu untuk menampilkan laporan CPL.
                </p>
            </div>
        @endif

        {{-- ===== EDGE CASE: TIDAK ADA DATA SAMA SEKALI ===== --}}
        @if(!empty($angkatan) && empty($laporanAngkatanPerTahun))
            <div class="mt-8 bg-red-50 border-l-4 border-red-400 p-4 rounded">
                <p class="text-sm text-red-700">
                    Tidak ditemukan data CPL untuk angkatan {{ $angkatan }}.
                    <br>
                    Pastikan data kelas dan penilaian sudah lengkap.
                </p>
            </div>
        @endif

        {{-- ===== EDGE CASE: TAHUN < 4 ===== --}}
        @if(!empty($laporanAngkatanPerTahun) && count($laporanAngkatanPerTahun) < 4)
            <div class="mt-8 bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                <p class="text-sm text-blue-700">
                    Untuk angkatan {{ $angkatan }} hanya memiliki data tahun akademik dari
                    <strong>{{ $laporanAngkatanPerTahun[0]['tahun_akademik'] }}</strong>
                    sampai
                    <strong>{{ end($laporanAngkatanPerTahun)['tahun_akademik'] }}</strong>.
                    <br>
                    Hubungi admin program studi untuk melengkapi data tahun akademik angkatan ini.
                </p>
            </div>
        @endif

        {{-- ===== LOOP PER TAHUN ===== --}}
        @foreach($laporanAngkatanPerTahun as $i => $laporan)

            <div class="mt-10 space-y-6">

                {{-- TITLE --}}
                <h2 class="text-xl font-bold text-gray-800">
                    Tahun Akademik {{ $laporan['tahun_akademik'] }}
                </h2>

                {{-- ================= TABLE CPL ================= --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">
                        Ketercapaian CPL Angkatan
                    </h3>

                    @if(empty($laporan['cpl']))
                        <p class="text-sm text-gray-500">
                            Tidak ada data CPL pada tahun akademik ini.
                        </p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border">
                                <thead class="bg-teks-biru-custom text-white">
                                    <tr>
                                        <th class="px-3 py-2">Kode CPL</th>
                                        <th class="px-3 py-2">Deskripsi</th>
                                        <th class="px-3 py-2 text-center">% Ketercapaian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($laporan['cpl'] as $row)
                                        <tr class="border-t">
                                            <td class="px-3 py-2">{{ $row['kode_cpl'] }}</td>
                                            <td class="px-3 py-2">{{ $row['deskripsi'] }}</td>
                                            <td class="px-3 py-2 text-center">
                                                {{ $row['nilai_akhir_cpl'] !== null
                                                    ? number_format($row['nilai_akhir_cpl'],2).'%'
                                                    : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- ================= CHART ================= --}}
                @if(!empty($laporan['chart']['data']))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-lg font-semibold mb-3">
                                Grafik Bar CPL Angkatan
                            </h3>
                            <canvas id="barChartAngkatan-{{ $i }}"
                                data-labels='@json($laporan["chart"]["labels"])'
                                data-data='@json($laporan["chart"]["data"])'>
                            </canvas>
                        </div>

                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="text-lg font-semibold mb-3">
                                Grafik Radar CPL Angkatan
                            </h3>
                            <canvas id="radarChartAngkatan-{{ $i }}"></canvas>
                        </div>

                    </div>
                @endif

            </div>

        @endforeach

    @endif

   <script>
        document.addEventListener("livewire:init", () => {

            let charts = {};
            const warnaBiru = "#264450";

            function renderChart(canvasId, radarId) {

                const canvas = document.getElementById(canvasId);
                const radarCanvas = document.getElementById(radarId);

                if (!canvas || !radarCanvas) return;

                const labels = JSON.parse(canvas.dataset.labels);
                const data   = JSON.parse(canvas.dataset.data);

                if (charts[canvasId]) charts[canvasId].destroy();
                if (charts[radarId]) charts[radarId].destroy();

                charts[canvasId] = new Chart(canvas, {
                    type: "bar",
                    data: {
                        labels,
                        datasets: [{
                            label: "CPL (%)",
                            data,
                            backgroundColor: warnaBiru
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            annotation: {
                                annotations: {
                                    batas60: {
                                        type: "line",
                                        yMin: 60,
                                        yMax: 60,
                                        borderColor: "red",
                                        borderWidth: 2,
                                        borderDash: [6, 6],
                                        label: {
                                            display: true,
                                            content: "",
                                            position: "end",
                                            backgroundColor: "red",
                                            color: "white"
                                        }
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });

                const batas60 = labels.map(() => 60);

                charts[radarId] = new Chart(radarCanvas, {
                    type: "radar",
                    data: {
                        labels,
                        datasets: [

                            {
                                label: "CPL (%)",
                                data,
                                backgroundColor: "rgba(38,68,80,0.2)",
                                borderColor: warnaBiru,
                                borderWidth: 2
                            },

                            {
                                label: "Batas Minimum (60%)",
                                data: batas60,
                                borderColor: "red",
                                borderWidth: 2,
                                borderDash: [6, 6],
                                pointRadius: 0,
                                fill: false
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            r: {
                                beginAtZero: true,
                                max: 100,
                                ticks: {
                                    stepSize: 20
                                }
                            }
                        }
                    }
                });
            }

            function renderAllCharts() {

                document.querySelectorAll("canvas[id^='barChart-']").forEach((canvas) => {
                    let index = canvas.id.replace("barChart-", "");
                    renderChart("barChart-" + index, "radarChart-" + index);
                });

                document.querySelectorAll("canvas[id^='barChartAngkatan-']").forEach((canvas) => {
                    let index = canvas.id.replace("barChartAngkatan-", "");
                    renderChart("barChartAngkatan-" + index, "radarChartAngkatan-" + index);
                });
            }

            Livewire.on("renderCharts", () => {
                setTimeout(() => {
                    renderAllCharts();
                }, 200);
            });

        });
    </script>


</div>
