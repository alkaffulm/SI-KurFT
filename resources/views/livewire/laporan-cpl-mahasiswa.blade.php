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
                <select wire:model.live="nim" class="mt-1 block w-full rounded-md border-gray-300 p-2"
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
                <h2 class="text-xl font-bold text-gray-800">
                    Tahun Akademik {{ $laporan['tahun_akademik'] }}
                </h2>

                {{-- TABEL MK --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">Daftar Kelas & Mata Kuliah</h3>

                    @if(count($laporan['kelas']) === 0)
                        <div class="text-sm text-gray-500">
                            Tidak ada data kelas pada tahun akademik ini.
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left border">
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
                                            <td class="px-3 py-2">{{ $k->kode_mk ?? '-' }}</td>
                                            <td class="px-3 py-2">{{ $k->nama_mk }}</td>
                                            <td class="px-3 py-2">{{ $k->nama_kelas }}</td>
                                            <td class="px-3 py-2">
                                                {{ $k->rata_rata_bobot !== null
                                                    ? number_format($k->rata_rata_bobot, 2) . '%'
                                                    : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- TABEL CPL --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="text-lg font-semibold mb-3">Ketercapaian CPL</h3>

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
                                @forelse($laporan['cpl'] as $row)
                                    <tr class="border-t">
                                        <td class="px-3 py-2">{{ $row['kode_cpl'] }}</td>
                                        <td class="px-3 py-2">{{ $row['deskripsi'] }}</td>
                                        <td class="px-3 py-2 text-center">
                                            {{ $row['nilai_akhir_cpl'] !== null
                                                ? number_format($row['nilai_akhir_cpl'], 2) . '%'
                                                : '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="p-4 text-center">
                                            Data tidak ditemukan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- CHART --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6" wire:ignore>
                    <div class="bg-white rounded-lg shadow p-4">
                        <h3 class="text-lg font-semibold mb-3">Grafik Bar CPL</h3>
                        <canvas id="bar-cpl-{{ $index }}"></canvas>
                    </div>

                    <div class="bg-white rounded-lg shadow p-4">
                        <h3 class="text-lg font-semibold mb-3">Grafik Radar CPL</h3>
                        <canvas id="radar-cpl-{{ $index }}"></canvas>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const labels = @json($laporan['chart']['labels']);
                        const data   = @json($laporan['chart']['data']);

                        const barCtx = document.getElementById('bar-cpl-{{ $index }}')?.getContext('2d');
                        const radarCtx = document.getElementById('radar-cpl-{{ $index }}')?.getContext('2d');

                        if (barCtx) {
                            new Chart(barCtx, {
                                type: 'bar',
                                data: {
                                    labels,
                                    datasets: [{
                                        label: 'Ketercapaian CPL (%)',
                                        data,
                                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            max: 100,
                                            ticks: {
                                                callback: v => v + '%'
                                            }
                                        }
                                    }
                                }
                            });
                        }

                        if (radarCtx) {
                            new Chart(radarCtx, {
                                type: 'radar',
                                data: {
                                    labels,
                                    datasets: [{
                                        label: 'Ketercapaian CPL (%)',
                                        data,
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        r: {
                                            beginAtZero: true,
                                            max: 100,
                                            ticks: {
                                                callback: v => v + '%'
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    });
                </script>
            </div>
        @endforeach
    @endif

    {{-- ================= MODE ANGKATAN ================= --}}
    @if($mode === 'angkatan' && !empty($cplReportsAngkatan))
        <div class="mt-8 bg-white rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold mb-3">Laporan CPL Angkatan</h3>

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
                        @foreach($cplReportsAngkatan as $row)
                            <tr class="border-t">
                                <td class="px-3 py-2">{{ $row['kode_cpl'] }}</td>
                                <td class="px-3 py-2">{{ $row['deskripsi'] }}</td>
                                <td class="px-3 py-2 text-center">
                                    {{ $row['nilai_akhir_cpl'] !== null
                                        ? number_format($row['nilai_akhir_cpl'], 2) . '%'
                                        : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
