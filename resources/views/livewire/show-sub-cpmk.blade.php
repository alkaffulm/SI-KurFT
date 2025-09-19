<div class="space-y-6">
    {{-- Dropdown Pemilihan Mata Kuliah --}}
    <div>
        <label for="matakuliah_select" class="block mb-2 text-sm font-medium text-gray-900">Pilih Mata Kuliah</label>
        <select wire:model.live="selectedMataKuliah" id="matakuliah_select"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-biru-custom focus:border-biru-custom block w-full sm:w-1/3 p-2.5">
            <option value="">-- Pilih Mata Kuliah --</option>
            @foreach ($mata_kuliah as $mk)
                <option value="{{ $mk->id_mk }}">{{ $mk->kode_mk }} - {{ $mk->nama_matkul_id }}</option>
            @endforeach
        </select>
    </div>

    {{-- Tampilkan Konten jika Mata Kuliah sudah dipilih --}}
    @if (!empty($assocCpmks))
        <div class="mt-6">
            {{-- Header Informasi Mata Kuliah --}}
            <div class="mb-8 pb-4 border-b border-gray-200">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">{{ $mataKuliah->nama_matkul_id }}</h2>
                <p class="mt-2 text-base text-gray-600">{{ $mataKuliah->matkul_desc_id }}</p>
            </div>

            {{-- Tabel CPMK dan Sub CPMK --}}
            <div class="overflow-x-auto rounded-lg border border-gray-300">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                        <tr>
                            <th scope="col" class="px-6 py-4">
                                Kode CPMK
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Deskripsi CPMK
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Sub-CPMK Terkait
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($assocCpmks as $cpmks)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap align-top">
                                    {{ $cpmks->cpmk->nama_kode_cpmk }}
                                </th>
                                <td class="px-6 py-4 align-top">
                                    {{ $cpmks->cpmk->desc_cpmk_id }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($cpmks->cpmk->subCpmk->isNotEmpty())
                                        <ul class="space-y-2">
                                            @foreach ($cpmks->cpmk->subCpmk as $scp)
                                                <li>
                                                    <strong
                                                        class="font-semibold">{{ $scp->nama_kode_sub_cpmk }}:</strong>
                                                    <span>{{ $scp->desc_sub_cpmk_id }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-gray-400 italic">Tidak ada Sub-CPMK</p>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-8 text-gray-500 bg-white">
                                    Tidak ada CPMK yang terhubung dengan mata kuliah ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @else
        {{-- Pesan jika belum ada mata kuliah yang dipilih --}}
        @if ($selectedMataKuliah)
            <div class="text-center py-10">
                <p class="text-gray-500">Tidak ada CPMK yang ditemukan untuk mata kuliah yang dipilih.</p>
            </div>
        @else
            <div class="text-center py-10">
                <p class="text-gray-500">Silakan pilih Mata Kuliah untuk menampilkan detail.</p>
            </div>
        @endif
    @endif
</div>
