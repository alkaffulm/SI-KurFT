<div>
    {{-- ================= FILTER ================= --}}
    <div class="flex gap-6 mb-6 flex-wrap">

        {{-- MODE --}}
        <div class="w-56">
            <label class="block text-sm font-medium text-gray-700">Mode Laporan</label>
            <select wire:model.live="mode"
                class="mt-1 block w-full rounded-md border-gray-300 p-2">
                <option value="mahasiswa">Per Mahasiswa</option>
                <option value="angkatan">Per Angkatan (Tahun Akademik)</option>
            </select>
        </div>

        {{-- TAHUN AKADEMIK (ANGKATAN MODE) --}}
        @if($mode === 'angkatan')
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
        @endif

        {{-- ANGKATAN --}}
        <div class="w-56">
            <label class="block text-sm font-medium text-gray-700">Angkatan</label>
            <select wire:model.live="angkatan"
                class="mt-1 block w-full rounded-md border-gray-300 p-2">
                <option value="">-- Pilih Angkatan --</option>
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
                    <option value="">-- Pilih Mahasiswa --</option>
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
    @if($mode === 'mahasiswa' && !empty($laporanPerTahun))

        @foreach($laporanPerTahun as $index => $laporan)

            <div class="mt-10 space-y-6">

                {{-- TITLE --}}
                <h2 class="text-xl font-bold text-gray-800">
                    Tahun Akademik {{ $laporan['tahun_akademik'] }}
                </h2>

                {{-- ================= TABLE MK ================= --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">Daftar Kelas & Mata Kuliah</h3>

                    @if(count($laporan['kelas']) === 0)
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
                    <h3 class="text-lg font-semibold mb-3">Ketercapaian CPL</h3>

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
                </div>


                {{-- ================= CHART ================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-white rounded-lg shadow p-4">
                        <h3 class="text-lg font-semibold mb-3">Grafik Bar CPL</h3>
                        <canvas id="barChart-{{ $index }}"
                            data-labels='@json($laporan["chart"]["labels"])'
                            data-data='@json($laporan["chart"]["data"])'>
                        </canvas>
                    </div>

                    <div class="bg-white rounded-lg shadow p-4">
                        <h3 class="text-lg font-semibold mb-3">Grafik Radar CPL</h3>
                        <canvas id="radarChart-{{ $index }}"></canvas>
                    </div>

                </div>

            </div>

        @endforeach

    @endif



    {{-- ================= MODE ANGKATAN ================= --}}
    @if($mode === 'angkatan' && !empty($cplReportsAngkatan))

        <div class="mt-8 bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-3">
                Laporan CPL Angkatan
            </h3>

            {{-- ===== TABLE ===== --}}
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

            {{-- ===== CHART ===== --}}
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

    @endif

<script>
document.addEventListener("livewire:init", () => {

    let charts = {};

    const warnaBiru = "#264450"; // sesuai teks-biru-custom

    function renderChart(canvasId, radarId) {

        let canvas = document.getElementById(canvasId);
        let radarCanvas = document.getElementById(radarId);

        if (!canvas || !radarCanvas) return;

        let labels = JSON.parse(canvas.dataset.labels);
        let data   = JSON.parse(canvas.dataset.data);

        // destroy old chart biar ga numpuk
        if (charts[canvasId]) charts[canvasId].destroy();
        if (charts[radarId]) charts[radarId].destroy();

        // ================= BAR =================
        charts[canvasId] = new Chart(canvas, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "CPL (%)",
                    data: data,
                    backgroundColor: warnaBiru
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    annotation: {
                        annotations: {
                            line60: {
                                type: 'line',
                                yMin: 60,
                                yMax: 60,
                                borderColor: 'red',
                                borderWidth: 3
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

        // Radar
        let safeData = data.map(v => v === 0 ? 1 : v);
        charts[radarId] = new Chart(radarCanvas, {
            type: "radar",
            data: {
                labels: labels,
                datasets: [{
                    label: "CPL (%)",
                    data: safeData,
                    backgroundColor: "rgba(38,68,80,0.2)",
                    borderColor: warnaBiru,
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    r: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });


    }

    function renderAllCharts() {

        // MODE MAHASISWA
        document.querySelectorAll("canvas[id^='barChart-']").forEach((canvas) => {
            let index = canvas.id.replace("barChart-", "");
            renderChart("barChart-" + index, "radarChart-" + index);
        });

        // MODE ANGKATAN
        if (document.getElementById("barChartAngkatan")) {
            renderChart("barChartAngkatan", "radarChartAngkatan");
        }
    }

    // Render ulang setiap Livewire selesai update DOM
    Livewire.hook("commit", ({ succeed }) => {
        succeed(() => {
            renderAllCharts();
        });
    });

});
</script>



</div>
