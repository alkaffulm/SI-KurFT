<div class="space-y-6">
    {{-- Dropdown Pemilihan Kurikulum --}}
    <div>
        <label for="kurikulum_select" class="block mb-2 text-sm font-medium text-gray-900">
            Pilih Kurikulum
        </label>
        <select wire:model.live="id_kurikulum" id="kurikulum_select"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-biru-custom focus:border-biru-custom 
                   block w-full sm:w-1/3 p-2.5">
            <option value="">-- Pilih Kurikulum --</option>
            @foreach ($kurikulums as $kurikulum)
                <option value="{{ $kurikulum->id_kurikulum }}">
                    {{ $kurikulum->nama_kurikulum ?? 'Kurikulum ' . $kurikulum->tahun }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Dropdown Pemilihan Tahun Akademik --}}
    <div>
        <label for="tahun_select" class="block mb-2 text-sm font-medium text-gray-900">
            Pilih Tahun Akademik sesuai Kurikulum
        </label>
        <select wire:model.live="id_tahun_akademik" id="tahun_select"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-biru-custom focus:border-biru-custom 
                   block w-full sm:w-1/3 p-2.5"
            @disabled(!$id_kurikulum)>
            <option value="">-- Pilih Tahun Akademik --</option>
            @foreach ($tahunAkademiks as $ta)
                <option value="{{ $ta->id_tahun_akademik }}">
                    {{ $ta->tahun_akademik }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Tabel Kelas --}}
    @if ($id_kurikulum && $id_tahun_akademik)
        @if (count($kelas) > 0)
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">ID Kelas</th>
                            <th class="px-4 py-2 border">Kode MK</th>
                            <th class="px-4 py-2 border">Nama Matkul (ID)</th>
                            <th class="px-4 py-2 border">Nama Matkul (EN)</th>
                            <th class="px-4 py-2 border">Dosen Pengampu</th>
                            <th class="px-4 py-2 border">Paralel</th>
                            <th class="px-4 py-2 border">Lihat Daftar Mahasiswa</th>
                            {{-- <th class="px-4 py-2 border">Hari</th>
                            <th class="px-4 py-2 border">Jam</th>
                            <th class="px-4 py-2 border">Ruangan</th> --}}
                            <th class="px-4 py-2 border">Kuota Mahasiswa Per Kelas</th>
                            <th class="px-4 py-2 border">Tersedia pada semester</th>
                            <th class="px-4 py-2 border" colspan="2">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas as $k)
                            <tr>
                                <td class="px-4 py-2 border text-center">{{ $k->id_kelas }}</td>
                                <td class="px-4 py-2 border text-center">{{ $k->mataKuliahModel->kode_mk ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $k->mataKuliahModel->nama_matkul_id ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $k->mataKuliahModel->nama_matkul_en ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $k->userModel->username ?? '-' }}</td>
                                <td class="px-4 py-2 border text-center">{{ $k->paralel_ke }}</td>
                                <td class="px-4 py-2 border text-center text-gray-400"></span>
                                    <a href="{{ route('kelas.lihat', $k->id_kelas) }}">Lihat Daftar Mahasiswa</a>
                                </td>
                                <td class="px-4 py-2 border text-center">{{ $k->jumlah_mhs }}</td> 
                                <td class="px-4 py-2 border text-center">{{ $k->mataKuliahModel->muncul ?? '-'}}</td>
                                <td class="px-4 py-2 border text-center"> 
                                    <a href="{{ route('kelas.edit', $k->id_kelas) }}" class="underline hover:text-biru-custom">
                                        Update
                                    </a> 
                                </td>
                                <td class="px-4 py-2 border text-center"> 
                                    <a href="{{ route('kelas.hapus', $k->id_kelas) }}" 
                                    class="underline hover:text-biru-custom"
                                    onclick="return confirm('Yakin ingin menghapus kelas ini?')">
                                        Hapus
                                    </a> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        @else
            <div class="text-center py-10">
                <p class="text-gray-500">Tidak ada Kelas yang sesuai filter.</p>
            </div>
        @endif
    @else
        <div class="text-center py-10">
            <p class="text-gray-500">Silakan pilih Kurikulum & Tahun Akademik untuk menampilkan data kelas.</p>
        </div>
    @endif
</div>
