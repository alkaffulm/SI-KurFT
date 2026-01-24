<div>
    <div wire:loading class="text-gray-500 italic mb-2">
        Memuat data Mata Kuliah...
    </div>
    <div wire:loading.remove class="overflow-x-auto rounded-lg border border-gray-400">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                <tr>
                    <th scope="col" class="px-6 py-3 border-r border-gray-400">Kode MK</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-400">Pengembang RPS</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-400">Koordinator MK</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-400">Nama Mata Kuliah</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-400">SKS</th>
                    <th scope="col" class="px-6 py-3">Semester</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tanggungJawabDosen as $tjd )
                    <tr class="bg-white border-t border-gray-400">
                        <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                            {{ $tjd->kode_mk }}
                        </td>
                        <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                            {{ $tjd->pengembangRps->username }}
                        </td>
                        <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                            {{ $tjd->koordinatorMk->username }}
                        </td>
                        <td class="px-6 py-4 border-r border-gray-400">
                            <p>{{ $tjd->nama_matkul_id }}</p> 
                            <p class="italic text-sm text-[#7397b6]">{{ $tjd->nama_matkul_en }}</p>
                        </td>
                        <td class="px-6 py-4 border-r border-gray-400">
                            {{ $tjd->jumlahSks }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $tjd->semester }}
                        </td>
                    </tr>
                @empty
                    <tr >
                        <td colspan="6" class="p-4 text-center ">Belum Ada Mata Kuliah Yang Diampu</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
