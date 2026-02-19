<div>
    {{-- Filter Angkatan --}}
    <div class="mb-4 flex justify-left items-center gap-2">
        <label for="angkatan" class="text-sm font-medium text-gray-700">
            Daftar Angkatan
        </label>
        <select wire:model.live="angkatan" id="angkatan" 
                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full md:w-64 p-2.5">
            <option value="">Semua Angkatan</option>
            @foreach($daftarAngkatan as $thn)
                <option value="{{ $thn }}">{{ $thn }}</option>
            @endforeach
        </select>
    </div>

    {{-- Tabel Mahasiswa --}}
    <div class="overflow-hidden rounded-lg border border-gray-400">
        <table class="w-full text-sm text-center text-gray-500">
            <thead class="text-white uppercase bg-teks-biru-custom">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">NIM</th>
                    <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                    <th scope="col" class="px-6 py-3">Angkatan</th>
                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $index => $mhs)
                    <tr class="bg-white border-t border-gray-400">
                        <td  scope="row"class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">{{ $index + 1 }}</td>
                        <td  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">{{ $mhs->nim }}</td>
                        <td  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">{{ $mhs->nama_lengkap }}</td>
                        <td  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">{{ $mhs->angkatan }}</td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">
                            @if ($mhs->jenis_kelamin)
                                {{ $mhs->jenis_kelamin }}
                            @else
                                <span class="text-gray-400 italic">Data Jenis Kelamin Tidak Ada</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('master-mahasiswa.edit', $mhs->id_mhs) }}" 
                                   class="inline-flex items-center px-3 py-1.5 text-sm text-yellow-600 hover:text-white hover:bg-yellow-600 border border-yellow-600 rounded-lg transition">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                    </svg>
                                    Edit
                                </a>
                                <button onclick="confirmDelete({{ $mhs->id_mhs }})"
                                        class="inline-flex items-center px-3 py-1.5 text-sm text-red-600 hover:text-white hover:bg-red-600 border border-red-600 rounded-lg transition">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Hapus
                                </button>
                            </div>
                        </td>                    
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada data mahasiswa
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Data Mahasiswa?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Panggil method 'hapus' di Component Livewire
                // @this adalah helper Livewire untuk mengakses komponen saat ini
                @this.call('hapus', id);
            }
        });
    }
</script>
</div>