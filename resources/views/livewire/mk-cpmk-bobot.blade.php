<div class="space-y-6">
    {{-- Dropdown MK --}}
    <div>
        <label class="block mb-2 text-sm font-medium">Pilih Mata Kuliah</label>
        <select wire:model.live="selectedMataKuliah"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-biru-custom focus:border-biru-custom block w-full sm:w-1/3 p-2.5">
            <option value="">-- Pilih Mata Kuliah --</option>
            @foreach ($mata_kuliah as $mk)
                <option value="{{ $mk->id_mk }}">
                    {{ $mk->kode_mk }} - {{ $mk->nama_matkul_id }}
                </option>
            @endforeach
        </select>
    </div>

    @if ($selectedMataKuliah)
        @if ($assocCpmks->isEmpty())
            <div class="text-center py-10">
                <p class="text-gray-500">Mapping CPMK untuk MK ini belum diatur.</p>
            </div>

        @else
            <div class="flex justify-end mb-4">
                <a 
                    href="{{ route('bobot.cpmk.edit', $selectedMataKuliah) }}"
                    class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit Bobot CPMK untuk Mata Kuliah ini
                </a>
            </div>

            <div class="overflow-x-auto border rounded-lg">
                <table class="w-full text-sm">
                    <thead class="bg-teks-biru-custom text-white uppercase">
                        <tr>
                            <th class="px-6 py-4">Kode CPMK</th>
                            <th class="px-6 py-4">Deskripsi CPMK</th>
                            <th class="px-6 py-4">CPMK ini menyusun ke CPL</th>
                            <th class="px-6 py-4">Bobot (Bilangan Bulat)</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($assocCpmks as $cpmkMap)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium">{{ $cpmkMap->cpmk->nama_kode_cpmk }}</td>
                                <td class="px-6 py-4 text-left">{{ $cpmkMap->cpmk->desc_cpmk_id }}</td>
                                <td class="px-6 py-4">{{ $cpmkMap->cpl->nama_kode_cpl ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $bobots[$cpmkMap->id_mk_cpmk_cpl] ?? 0 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    @else
        <div class="text-center py-10">
            <p class="text-gray-500">Silakan pilih Mata Kuliah untuk menampilkan detail.</p>
        </div>
    @endif
</div>