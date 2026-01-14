<div>
    <div class="flex gap-6 mb-6 flex-wrap">
        <div class="w-56">
            <label class="block text-sm font-medium text-gray-700">Mode Laporan</label>
            <select wire:model.live="mode" class="mt-1 block w-full rounded-md border-gray-300 p-2">
                <option value="mahasiswa">Per Mahasiswa</option>
                <option value="angkatan">Per Angkatan (Tahun Akademik)</option>
            </select>
        </div>

        @if($mode === 'angkatan')
            <div class="w-64">
                <label class="block text-sm font-medium text-gray-700">Tahun Akademik</label>
                <select wire:model.live="tahunAkademikId" class="mt-1 block w-full rounded-md border-gray-300 p-2">
                    <option value="">-- Pilih Tahun Akademik --</option>
                    @foreach($tahunAkademikList as $ta)
                        <option value="{{ $ta->id_tahun_akademik }}">{{ $ta->tahun_akademik }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="w-56">
            <label class="block text-sm font-medium text-gray-700">Angkatan</label>
            <select wire:model.live="angkatan" class="mt-1 block w-full rounded-md border-gray-300 p-2">
                <option value="">-- Pilih Angkatan --</option>
                @foreach($angkatanList as $a)
                    <option value="{{ $a }}">{{ $a }}</option>
                @endforeach
            </select>
        </div>

        @if($mode === 'mahasiswa')
            <div class="w-80">
                <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                <select wire:model.live="nim" class="mt-1 block w-full rounded-md border-gray-300 p-2" {{ empty($daftarMahasiswa) ? 'disabled' : '' }}>
                    <option value="">-- Pilih Mahasiswa --</option>
                    @foreach($daftarMahasiswa as $m)
                        <option value="{{ $m->nim }}">{{ $m->nama_lengkap }} ({{ $m->nim }})</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>

    @php
        $siapMahasiswa = $mode === 'mahasiswa' && !empty($nim);
        $siapAngkatan  = $mode === 'angkatan' && !empty($angkatan) && !empty($tahunAkademikId);
        $rows = $mode === 'angkatan' ? ($cplReportsAngkatan ?? []) : ($cplReports ?? []);
    @endphp

    @if($siapMahasiswa || $siapAngkatan)
        <div class="space-y-4 mt-6">
            @if($mode === 'mahasiswa')
                {{-- <div class="bg-white rounded-lg shadow p-4"> --}}
                    <h3 class="text-lg font-semibold mb-3">Daftar Kelas yang Diambil</h3>
                    @if(count($kelas) === 0)
                        <div class="text-sm text-gray-500">Tidak ada data kelas untuk mahasiswa ini.</div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left border rounded-lg">
                                <thead class="bg-teks-biru-custom text-white px-6 py-4 text-center">
                                    <tr>
                                        <th class="px-3 py-2">Kode MK</th>
                                        <th class="px-3 py-2">Mata Kuliah</th>
                                        <th class="px-3 py-2">Kelas</th>
                                        <th class="px-3 py-2 text-center">Rata-rata Bobot Mata Kuliah</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center py-4">
                                    @foreach($kelas as $k)
                                        <tr class="border-t">
                                            <td class="px-3 py-2">{{ $k->kode_mk ?? '-' }}</td>
                                            <td class="px-3 py-2">{{ $k->nama_mk }}</td>
                                            <td class="px-3 py-2">{{ $k->nama_kelas }}</td>
                                            <td class="px-3 py-2 text-center">
                                                {{ $k->rata_rata_bobot !== null ? number_format($k->rata_rata_bobot, 2) . '%' : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                {{-- </div> --}}
            @endif

            {{-- <div class="bg-white rounded-lg shadow p-4"> --}}
                <h3 class="text-lg font-semibold mb-3">
                    {{ $mode === 'angkatan' ? 'Tabel Laporan CPL Angkatan' : 'Tabel Laporan CPL Mahasiswa' }}
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border">
                        <thead class="bg-teks-biru-custom text-white">
                            <tr>
                                <th class="px-3 py-2">Kode CPL</th>
                                <th class="px-3 py-2">Deskripsi</th>
                                <th class="px-3 py-2 text-center">% Ketercapaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rows as $row)
                                <tr class="border-t">
                                    <td class="px-3 py-2">{{ $row['kode_cpl'] }}</td>
                                    <td class="px-3 py-2">{{ $row['deskripsi'] }}</td>
                                    <td class="px-3 py-2 text-center">
                                        {{ $row['nilai_akhir_cpl'] !== null ? number_format($row['nilai_akhir_cpl'], 2) . '%' : '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="p-4 text-center">Data tidak ditemukan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6" wire:ignore.self>
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">Grafik Bar CPL</h3>
                    <canvas id="barCplChart"></canvas>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">Grafik Radar CPL</h3>
                    <canvas id="radarCplChart"></canvas>
                </div>
            </div>
        </div>
    @else
        <div class="text-sm text-gray-500">
            @if($mode === 'mahasiswa')
                Pilih angkatan dan mahasiswa untuk melihat laporan.
            @else
                Pilih tahun akademik dan angkatan untuk melihat laporan.
            @endif
        </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('livewire:init', () => {
    let barChart = null;
    let radarChart = null;

    function renderCharts(labels, data) {
        const barEl = document.getElementById('barCplChart');
        const radarEl = document.getElementById('radarCplChart');
        if (!barEl || !radarEl) return;

        if (barChart) barChart.destroy();
        if (radarChart) radarChart.destroy();

        const barCtx = barEl.getContext('2d');
        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ketercapaian CPL (%)',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: true, position: 'top' },
                    annotation: {
                        annotations: {
                            batasMinimal: {
                                type: 'line',
                                yMin: 60,
                                yMax: 60,
                                borderColor: 'rgb(255, 0, 0)',
                                borderWidth: 3,
                                borderDash: [10, 5],
                                label: {
                                    display: true,
                                    content: 'Batas Minimal',
                                    position: 'end',
                                    backgroundColor: 'rgba(255, 0, 0, 0.8)',
                                    color: 'white',
                                    font: { weight: 'bold', size: 12 }
                                }
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: { callback: (v) => v + '%' }
                    }
                }
            }
        });

        const radarCtx = radarEl.getContext('2d');
        const batasData = new Array(labels.length).fill(60);

        radarChart = new Chart(radarCtx, {
            type: 'radar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Ketercapaian CPL (%)',
                        data: data,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(255, 99, 132, 1)'
                    },
                    {
                        label: 'Batas Minimal Ketercapaian CPL (%)',
                        data: batasData,
                        backgroundColor: 'rgba(255, 0, 0, 0.1)',
                        borderColor: 'rgb(255, 0, 0)',
                        borderWidth: 3,
                        borderDash: [10, 5],
                        pointRadius: 0,
                        pointHoverRadius: 0
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: { legend: { display: true, position: 'top' } },
                scales: {
                    r: {
                        beginAtZero: true,
                        max: 100,
                        ticks: { callback: (v) => v + '%' }
                    }
                }
            }
        });
    }

    Livewire.on('laporanCplUpdated', (payload) => {
        const labels = payload?.labels ?? [];
        const data = payload?.data ?? [];
        renderCharts(labels, data);
    });
});
</script>
@endpush
