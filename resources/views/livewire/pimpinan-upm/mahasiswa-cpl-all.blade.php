<div>
    {{-- ================= FILTER UTAMA ================= --}}
    <div class="grid grid-cols-1 mb-10 md:grid-cols-2 gap-4">
        {{-- 1. PILIH PRODI (Wajib) --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
            <select wire:model.live="selectedProdi" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 bg-gray-50 border">
                <option value="">-- Pilih Program Studi --</option>
                @foreach($prodiList as $prodi)
                    <option value="{{ $prodi->id_ps }}">{{ $prodi->nama_prodi }}</option>
                @endforeach
            </select>
        </div>

        {{-- 2. PILIH KURIKULUM (Wajib setelah Prodi) --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kurikulum</label>
            <select wire:model.live="selectedKurikulum" @if(empty($kurikulumList)) disabled class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @endif class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 bg-gray-50 border">
                <option value="">
                    @if(empty($selectedProdi))
                        -- Pilih Prodi Terlebih Dahulu --
                    @else
                        -- Pilih Kurikulum --
                    @endif
                </option>
                @foreach($kurikulumList as $kur)
                    <option value="{{ $kur->id_kurikulum }}">{{ $kur->tahun }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    {{-- ================= SUB FILTER ================= --}}
    
    @if($selectedProdi && $selectedKurikulum)
    <div class="grid grid-cols-1 mb-8 md:grid-cols-3 gap-4">
        
        {{-- 3. MODE LAPORAN (Muncul jika Prodi & Kurikulum dipilih) --}}        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Mode Laporan</label>
            <select wire:model.live="mode" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 bg-gray-50 border">
                <option value="mahasiswa">Per Mahasiswa</option>
                <option value="angkatan">Per Angkatan (Tahun Akademik)</option>
            </select>
        </div>

            {{-- LOGIKA: Jika Mode ANGKATAN --}}
        @if($mode === 'angkatan')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Akademik</label>
                <select wire:model.live="tahunAkademikId" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 bg-gray-50 border">
                    <option value="">-- Pilih Tahun Akademik --</option>
                    @foreach($tahunAkademikList as $ta)
                        <option value="{{ $ta->id_tahun_akademik }}">{{ $ta->tahun_akademik }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        {{-- LOGIKA: Angkatan selalu butuh --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Angkatan Mahasiswa</label>
            <select wire:model.live="angkatan" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 bg-gray-50 border">
                <option value="">-- Pilih Angkatan --</option>
                @foreach($angkatanList as $a)
                    <option value="{{ $a }}">{{ $a }}</option>
                @endforeach
            </select>
        </div>

        {{-- LOGIKA: Jika Mode MAHASISWA --}}
        @if($mode === 'mahasiswa')
            <div class="w-80 animate-fade-in">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Mahasiswa</label>
                <select wire:model.live="nim" @if(empty($angkatan)) disabled class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @endif class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 bg-gray-50 border"
                    {{ empty($daftarMahasiswa) ? 'disabled' : '' }}>
                    <option value="">
                        @if(empty($angkatan))
                            -- Pilih Angkatan Terlebih Dahulu --
                        @else
                            -- Pilih Mahasiswa --
                        @endif            
                    </option>
                    @foreach($daftarMahasiswa as $m)
                        <option value="{{ $m->nim }}">{{ $m->nama_lengkap }} ({{ $m->nim }})</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
    @elseif(!$selectedProdi || !$selectedKurikulum)
        {{-- Pesan Helper --}}
        <div wire:loading.remove wire:target="selectedProdi, selectedKurikulum" class="mb-6 p-4 bg-yellow-50 text-yellow-800 rounded-lg border border-yellow-200 text-sm">
            <i class="fa-solid fa-info-circle mr-2"></i> Silakan pilih <strong>Program Studi</strong> dan <strong>Kurikulum</strong> terlebih dahulu.
        </div>
    @endif

    {{-- ================= CONTENT REPORT (Sama seperti sebelumnya) ================= --}}
    
    <div wire:loading wire:target="selectedProdi, selectedKurikulum, angkatan, nim" class="w-full text-center py-4">
        <span class="text-sm font-medium text-gray-500">Sedang memuat data...</span>
    </div>

    {{-- REPORT: MODE MAHASISWA --}}
    @if($selectedProdi && $selectedKurikulum && $mode === 'mahasiswa' && !empty($laporanPerTahun))
        @foreach($laporanPerTahun as $index => $laporan)
            <div class="mt-10 space-y-6 animate-fade-in">
                <div class="flex items-center gap-2 border-b pb-2 border-gray-300 text-xl font-bold text-gray-800">
                    <span >Tahun Akademik {{ $laporan['tahun_akademik'] }}</span>
                </div>
                {{-- ... TABLE MK & CPL & CHART (Copy isi loop foreach sebelumnya) ... --}}
                {{-- TABLE MK --}}
                <div>
                    <h3 class="text-lg font-semibold mb-3 text-gray-700">Daftar Kelas & Mata Kuliah</h3>
                    @if(count($laporan['kelas']) === 0)
                        <p class="text-sm text-gray-500 italic text-center py-4 bg-gray-50 rounded">Tidak ada data kelas pada tahun akademik ini.</p>
                    @else
                        <div class="overflow-x-auto border border-gray-400 rounded-lg">
                            <table class="w-full text-sm border-collapse">
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
                                        <tr class="hover:bg-gray-50 border-t border-gray-400">
                                            <td class="px-3 py-2 border-r border-gray-400">{{ $k->kode_mk }}</td>
                                            <td class="px-3 py-2 border-r border-gray-400 text-center">{{ $k->nama_mk }}</td>
                                            <td class="px-3 py-2 border-r border-gray-400">{{ $k->nama_kelas }}</td>
                                            <td class="px-3 py-2  font-medium {{ $k->rata_rata_bobot}}">
                                                {{ $k->rata_rata_bobot !== null ? number_format($k->rata_rata_bobot, 2).'%' : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- TABLE CPL --}}
                <div>
                    <h3 class="text-lg font-semibold mb-3 text-gray-700">Ketercapaian CPL</h3>
                    <div class="overflow-x-auto border border-gray-400 rounded-lg">
                        <table class="w-full text-sm border-collapse">
                            <thead class="bg-teks-biru-custom text-white">
                                <tr>
                                    <th class="px-3 py-2 text-center min-w-[90px]">Kode CPL</th>
                                    <th class="px-3 py-2 ">Deskripsi</th>
                                    <th class="px-3 py-2 text-center">% Ketercapaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporan['cpl'] as $row)
                                    <tr class="hover:bg-gray-50 border-t border-gray-400">
                                        <td class="px-3 py-2 border-r border-gray-400 text-center font-bold">{{ $row['kode_cpl'] }}</td>
                                        <td class="px-3 py-2 border-r border-gray-400 text-justify">{{ $row['deskripsi'] }}</td>
                                        <td class="px-3 py-2 text-center font-bold">
                                            {{ $row['nilai_akhir_cpl'] !== null ? number_format($row['nilai_akhir_cpl'], 2).'%' : '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- CHARTS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                        <h3 class="text-sm font-semibold mb-3 uppercase ">Grafik Bar</h3>
                        <canvas id="barChart-{{ $index }}" data-labels='@json($laporan["chart"]["labels"])' data-data='@json($laporan["chart"]["data"])'></canvas>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                        <h3 class="text-sm font-semibold mb-3 uppercase ">Grafik Radar</h3>
                        <canvas id="radarChart-{{ $index }}"></canvas>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    {{-- REPORT: MODE ANGKATAN --}}
    @if($selectedProdi && $selectedKurikulum && $mode === 'angkatan' && !empty($cplReportsAngkatan))
        <div>
            <h3 class="text-xl font-bold mb-4 text-gray-800 border-b pb-2">Laporan CPL Angkatan {{ $angkatan }}</h3>
            
            {{-- ... TABLE & CHART ANGKATAN (Copy isi sebelumnya) ... --}}
             {{-- TABLE ANGKATAN --}}
            <div class="overflow-x-auto mb-8 border border-gray-400 rounded-lg">
                <table class="w-full text-sm border-collapse">
                    <thead class="bg-teks-biru-custom text-white">
                        <tr>
                            <th class="px-3 py-2  text-center">Kode CPL</th>
                            <th class="px-3 py-2  ">Deskripsi</th>
                            <th class="px-3 py-2  text-center">% Rata-rata Ketercapaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cplReportsAngkatan as $row)
                            <tr class="hover:bg-gray-50 border-t border-gray-400">
                                <td class="px-3 py-2 border-r border-gray-400 text-center font-bold min-w-[90px]">{{ $row['kode_cpl'] }}</td>
                                <td class="px-3 py-2 border-r border-gray-400 text-justify">{{ $row['deskripsi'] }}</td>
                                <td class="px-3 py-2 border-r border-gray-400 text-center font-bold">
                                    {{ $row['nilai_akhir_cpl'] !== null ? number_format($row['nilai_akhir_cpl'], 2).'%' : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- CHARTS ANGKATAN --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                    <h3 class="text-sm font-semibold mb-3 text-center uppercase text-gray-500">Grafik Bar Angkatan</h3>
                    <canvas id="barChartAngkatan" 
                        data-labels='@json(array_column($cplReportsAngkatan,"kode_cpl"))' 
                        data-data='@json(array_map(fn($r)=>$r["nilai_akhir_cpl"] ?? 0,$cplReportsAngkatan))'>
                    </canvas>
                </div>
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                    <h3 class="text-sm font-semibold mb-3 text-center uppercase text-gray-500">Grafik Radar Angkatan</h3>
                    <canvas id="radarChartAngkatan"></canvas>
                </div>
            </div>
        </div>
    @endif
</div>

{{-- SCRIPT: Tetap gunakan @push --}}

<script>
    document.addEventListener('livewire:init', () => {
        let charts = {};
        const warnaBiru = "#264450";

        function renderChart(canvasId, radarId) {
            let canvas = document.getElementById(canvasId);
            let radarCanvas = document.getElementById(radarId);
            
            if (!canvas || !radarCanvas) return;
            if (!canvas.dataset.labels || !canvas.dataset.data) return;

            let labels = JSON.parse(canvas.dataset.labels);
            let data = JSON.parse(canvas.dataset.data);
            
            if (charts[canvasId]) charts[canvasId].destroy();
            if (charts[radarId]) charts[radarId].destroy();

            // Bar Chart
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
                    scales: { y: { beginAtZero: true, max: 100 } } 
                }
            });

            // Radar Chart
            let safeData = data.map(v => v === 0 ? 0.1 : v); 
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
                    scales: { r: { beginAtZero: true, max: 100 } } 
                }
            });
        }

        function renderAllCharts() {
            document.querySelectorAll("canvas[id^='barChart-']").forEach((canvas) => {
                let index = canvas.id.replace("barChart-", "");
                renderChart("barChart-" + index, "radarChart-" + index);
            });
            if (document.getElementById("barChartAngkatan")) {
                renderChart("barChartAngkatan", "radarChartAngkatan");
            }
        }

        renderAllCharts();
        Livewire.hook("commit", ({ succeed }) => { succeed(() => { setTimeout(renderAllCharts, 100); }); });
    });
</script>
