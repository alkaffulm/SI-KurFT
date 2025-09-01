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

    <!-- Tabel Tahun Akademik -->
    @if ($id_kurikulum && !empty($tahunAkademiks) && count($tahunAkademiks) > 0)
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full border border-gray-300 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">ID Tahun Akademik</th>
                        <th class="px-4 py-2 border">Tahun Akademik</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tahunAkademiks as $tahun)
                        <tr>
                            <td class="px-4 py-2 border text-center">{{ $tahun->id_tahun_akademik }}</td>
                            <td class="px-4 py-2 border">{{ $tahun->tahun_akademik }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif ($id_kurikulum && empty($tahunAkademiks))
        <div class="text-center py-10">
            <p class="text-gray-500">Tidak ada Tahun Akademik yang terhubung dengan kurikulum ini.</p>
        </div>
    @else
        <div class="text-center py-10">
            <p class="text-gray-500">Silakan pilih Kurikulum terlebih dahulu untuk menampilkan Tahun Akademik.</p>
        </div>
    @endif
</div>
