<div>
    <div>
        <div class="bg-white p-8 rounded-lg shadow-md mb-8">
            <h1 class="text-3xl font-bold text-teks-biru-custom mb-2">Evaluasi Mahasiswa</h1>
            <p class="text-gray-600 mb-6 text-sm">
                Halaman ini menampilkan ketercapaian CPL berdasarkan Rencana Asesmen yang telah dibuat. Mahasiswa dinyatakan <span class="font-bold text-green-600">Lulus</span> jika seluruh CPL terkait memiliki nilai minimal {{ $threshold }}%.
            </p>

            <div class="mb-8">
                <label for="kelas_select" class="block mb-2 font-medium text-gray-900">Pilih Kelas</label>
                <select wire:model.live="selectedKelasId" id="kelas_select"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-biru-custom focus:border-biru-custom block w-full sm:w-1/2 p-2.5">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($daftarKelas as $k)
                        <option value="{{ $k->id_kelas }}">
                            {{ $k->mataKuliahModel->kode_mk ?? '-' }} - {{ $k->mataKuliahModel->nama_matkul_id ?? '-' }}
                            (Paralel {{ $k->paralel_ke }} - {{ $k->tahunAkademik->tahun_akademik ?? '' }})
                        </option>
                    @endforeach
                </select>
            </div>

            @if ($kelas)
                <div wire:loading.class="opacity-50" class="transition-opacity duration-200">
                    <div class="flex justify-between items-end mb-2 mt-8 border-b pb-2">
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Hasil Evaluasi Mahasiswa</h2>
                            <p class="text-xs text-gray-500">Menampilkan status kelulusan berdasarkan ketercapaian CPL.</p>
                        </div>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded border border-gray-500">
                            Total Mahasiswa: {{ count($allMahasiswaEvaluasi) }}
                        </span>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-400 mb-8">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                                <tr>
                                    <th class="px-6 py-3 border-r border-gray-400">NIM</th>
                                    <th class="px-6 py-3 border-r border-gray-400">Nama</th>

                                    @foreach($targetCpls as $cpl)
                                        <th class="text-center px-6 py-3 border-r border-gray-400">
                                            {{ $cpl->nama_kode_cpl }}
                                        </th>
                                    @endforeach

                                    {{-- Kolom Status --}}
                                    <th class="text-center px-6 py-3 border-r border-gray-400">Status</th>

                                    {{-- Kolom Aksi --}}
                                    <th class="text-center px-6 py-3 w-48">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($allMahasiswaEvaluasi as $mhs)
                                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 text-black">
                                        <td class="px-6 py-4 border-r border-gray-300 font-medium">{{ $mhs['nim'] }}</td>
                                        <td class="px-6 py-4 border-r border-gray-300">{{ $mhs['nama'] }}</td>

                                        {{-- Loop Nilai CPL --}}
                                        @foreach($targetCpls as $cpl)
                                            @php $val = $mhs['nilai_per_cpl'][$cpl->id_cpl] ?? 0; @endphp
                                            <td class="text-center px-6 py-4 border-r border-gray-300">
                                                {{-- Highlight merah jika nilai spesifik CPL ini di bawah threshold --}}
                                                @if($val < $threshold)
                                                    <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-red-200">
                                                        {{ $val }}%
                                                    </span>
                                                @else
                                                    {{ $val }}%
                                                @endif
                                            </td>
                                        @endforeach

                                        {{-- Kolom Status (Badge Lulus/Tidak) --}}
                                        <td class="text-center px-6 py-4 border-r border-gray-300">
                                            <span class="text-xs font-medium px-3 py-1 rounded-full border {{ $mhs['status_class'] }}">
                                                {{ $mhs['status_label'] }}
                                            </span>
                                        </td>

                                        {{-- Kolom Aksi --}}
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center gap-2">
                                                <button wire:click="editNilai('{{ $mhs['nim'] }}', '{{ $mhs['nama'] }}')"
                                                    class="inline-flex items-center gap-x-1 px-3 py-1.5 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors text-xs font-semibold">
                                                    Edit
                                                </button>

                                                <button wire:click="lihatRiwayat('{{ $mhs['nim'] }}', '{{ $mhs['nama'] }}')"
                                                    class="inline-flex items-center gap-x-1 px-3 py-1.5 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors text-xs font-semibold" title="Lihat Riwayat">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    Riwayat
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ 4 + count($targetCpls) }}" class="text-center py-4 italic">
                                            Tidak ada data mahasiswa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            @elseif($selectedKelasId)
                <div class="text-center py-8 text-gray-500">
                    Memuat data kelas...
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                    <p class="text-gray-500 text-lg">Silakan pilih kelas terlebih dahulu untuk melihat hasil evaluasi.</p>
                </div>
            @endif
        </div>

        @if($isEditModalOpen)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">

                {{-- Header Modal --}}
                <div class="p-6 border-b sticky top-0 bg-white z-10 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Edit Nilai Mahasiswa</h3>
                        <p class="text-sm text-gray-500">{{ $editingNama }} ({{ $editingNim }})</p>
                    </div>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                {{-- Body Modal --}}
                <div class="p-6">
                    <form wire:submit.prevent="simpanNilai">

                        {{-- Loop per Rencana Asesmen --}}
                        @foreach($structureAsesmen as $asesmen)
                            <div class="mb-6 border rounded-lg overflow-hidden">
                                <div class="bg-gray-100 px-4 py-2 border-b font-bold text-gray-700 flex justify-between">
                                    <span>{{ $asesmen['nama_komponen'] }}</span>
                                </div>

                                <div class="p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                    @foreach($asesmen['cpmks'] as $cpmk)
                                        <div class="flex flex-col">
                                            <label class="text-xs text-gray-500 font-semibold mb-1">
                                                {{ $cpmk['kode_cpmk'] }}
                                                <span class="text-red-400 ml-1">(Maks: {{ $cpmk['bobot_total'] }})</span>
                                            </label>

                                            <input type="number"
                                                step="0.01"
                                                min="0"
                                                max="{{ $cpmk['bobot_total'] ?? 100 }}"
                                                wire:model="editingNilai.{{ $asesmen['id_rencana_asesmen'] }}.{{ $cpmk['id_cpmk'] }}"
                                                class="border border-gray-300 rounded-md px-3 py-2 text-center focus:ring-biru-custom focus:border-biru-custom"
                                                placeholder="0 - {{ $cpmk['bobot_total'] ?? 0 }}"

                                                oninput="
                                                    let max = parseFloat(this.max);
                                                    let val = parseFloat(this.value);

                                                    if (val < 0) {
                                                        this.value = 0;
                                                    } else if (val > max) {
                                                        this.value = max;
                                                    }
                                                "
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="flex justify-end gap-3 mt-8">
                            <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 font-medium">
                                Batal
                            </button>
                            <button type="submit" class="px-6 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 font-bold shadow-lg transform active:scale-95 transition-transform">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

        @if($isHistoryModalOpen)
            <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4">
                <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[80vh] flex flex-col">
                    <div class="p-6 border-b flex justify-between items-center">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Riwayat Perubahan Nilai</h3>
                            <p class="text-sm text-gray-500">{{ $editingNama }} ({{ $editingNim }})</p>
                        </div>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    <div class="p-6 overflow-y-auto flex-1">
                        @if(count($historyData) > 0)
                            <ol class="relative border-l border-gray-200 ml-3">
                                @foreach($historyData as $history)
                                    <li class="mb-8 ml-6">
                                        <span class="absolute flex items-center justify-center w-6 h-6 bg-biru-custom rounded-full -left-3 ring-8 ring-white">
                                            <svg class="w-2.5 h-2.5 text-teks-biru-custom" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0H6a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </span>

                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900">
                                                    {{ $history->dosen->name ?? 'Dosen' }}
                                                </h3>
                                                <time class="block mb-2 text-xs font-normal leading-none text-gray-400">
                                                    {{ \Carbon\Carbon::parse($history->created_at)->format('d M Y, H:i') }}
                                                </time>
                                                <p class="mb-3 text-sm italic text-gray-500">"{{ $history->keterangan }}"</p>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 rounded-lg p-3 border border-gray-200 text-sm">
                                            <h4 class="font-semibold text-gray-700 mb-2 text-xs uppercase tracking-wide">Rincian Perubahan:</h4>

                                            <ul class="space-y-2">
                                                @php
                                                    $dataBaru = $history->data_baru ?? [];
                                                    $dataLama = $history->data_lama ?? [];
                                                    $perubahanDitemukan = false;
                                                @endphp

                                                @foreach($dataBaru as $key => $nilaiBaru)
                                                    @php
                                                        $nilaiLama = $dataLama[$key] ?? 0;
                                                        // Mengambil nama dari array $namesMap yang dikirim dari Livewire
                                                        $namaKomponen = $namesMap[$key] ?? 'Komponen Tidak Dikenal';
                                                    @endphp

                                                    @if(abs((float)$nilaiBaru - (float)$nilaiLama) > 0.01)
                                                        @php $perubahanDitemukan = true; @endphp
                                                        <li class="flex justify-between items-center bg-white p-2 rounded border border-gray-100 shadow-sm">
                                                            <span class="font-medium text-gray-700 truncate w-2/3 pr-2" title="{{ $namaKomponen }}">
                                                                {{ $namaKomponen }}
                                                            </span>
                                                            <div class="flex items-center gap-2 text-xs whitespace-nowrap">
                                                                <span class="text-gray-400 line-through">{{ $nilaiLama }}</span>
                                                                <span class="text-gray-400">→</span>
                                                                <span class="font-bold text-teks-biru-custom">{{ $nilaiBaru }}</span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach

                                                @if(!$perubahanDitemukan)
                                                    <li class="text-gray-400 text-xs italic">Tidak ada perubahan angka.</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <div class="text-center text-gray-500 py-8">Belum ada riwayat perubahan.</div>
                        @endif
                    </div>
                    <div class="p-6 border-t bg-gray-50 rounded-b-xl text-right">
                        <button wire:click="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm font-medium">Tutup</button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
