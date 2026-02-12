{{-- PERINTAH MAGIC: wire:poll.5s --}}
{{-- Artinya: Component ini akan refresh otomatis setiap 5 detik --}}
<div wire:poll.5s>
    
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-biru-custom">Tabel Evaluasi Program Studi</h2>
    </div>

    {{-- Tabel Data --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-400">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Program Studi</th>
                    <th scope="col" class="px-6 py-3">Tahun Akademik</th>
                    <th scope="col" class="px-6 py-3">Catatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($evaluasi as $item)
                    <tr class="bg-white border-b hover:bg-gray-50 border-t border-gray-400">
                        <td class="px-6 py-4 border-r border-gray-400">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 border-r border-gray-400">
                            {{-- Panggil relasi --}}
                            {{ $item->programstudi->nama_prodi ?? '-' }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 border-r border-gray-400">
                            {{-- Panggil relasi tahun akademik --}}
                            {{ $item->tahunakademik->tahun_akademik ?? '-' }} 
                            {{-- Sesuaikan 'nama_tahun_akademik' dengan kolom di db Anda --}}
                        </td>
                        <td class="px-6 py-4 border-r border-gray-400">
                            <p class="line-clamp-2 font-medium text-gray-900" title="{{$item->catatan}}">{{ $item->catatan ?? '-' }}</p>
                            <div class="flex gap-x-3 mt-2 italic">
                                <p class="text-[12px]">Dibuat pada: {{ $item->created_at->diffForHumans() ?? '-' }}</p>
                                <p class="text-[12px]">DIperbarui Pada: {{ $item->updated_at->diffForHumans() ?? '-' }}</p>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada catatan evaluasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $evaluasi->links() }}
    </div>
</div>