<div>
    
    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('message') }}
        </div>
    @endif

    {{-- Header & Tombol Tambah --}}
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-biru-custom">Tabel Evaluasi Program Studi</h2>
        <button wire:click="create" class="bg-biru-custom hover:opacity-90 text-white font-medium py-2 px-4 rounded-lg">
            + Tambah Catatan
        </button>
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
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
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
                        <td class="px-6 py-4 text-center flex ">
                            <button wire:click="edit({{ $item->id_evaluasi_upm }})" class=" px-4 py-2 rounded-md bg-yellow-500 text-white font-bold  hover:underline mr-3">Edit</button>
                            <button wire:click="delete({{ $item->id_evaluasi_upm }})" wire:confirm="Yakin ingin menghapus catatan ini?" class="font-bold px-4 py-2 rounded-md bg-red-600 text-white hover:underline">Hapus</button>
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
    
    <div>
        {{ $evaluasi->links() }}
    </div>

    {{-- MODAL FORM (Satu modal untuk Create & Edit) --}}
    <div id="modalEvaluasi" wire:ignore.self class="fixed inset-0 z-50 hidden overflow-y-auto bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="relative w-full max-w-lg p-4 bg-white rounded-lg shadow-lg">
            
            {{-- Modal Header --}}
            <div class="flex justify-between items-center pb-4 mb-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">
                    {{ $isEditMode ? 'Edit Catatan Evaluasi' : 'Tambah Catatan Evaluasi' }}
                </h3>
            </div>

            {{-- Modal Body (Form) --}}
            <form wire:submit.prevent="store">
                
                {{-- Input Prodi --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Program Studi</label>
                    <select wire:model="id_ps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="">-- Pilih Program Studi --</option>
                        @foreach($list_prodi as $prodi)
                            <option value="{{ $prodi->id_ps }}">{{ $prodi->nama_prodi }}</option>
                        @endforeach
                    </select>
                    @error('id_ps') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Input Tahun Akademik --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Tahun Akademik</label>
                    <select wire:model="id_tahun_akademik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="">-- Pilih Tahun Akademik --</option>
                        @foreach($list_tahun as $th)
                            {{-- Sesuaikan nama kolom yg ditampilkan, misal 'nama_tahun' atau 'semester_periode' --}}
                            <option value="{{ $th->id_tahun_akademik }}">{{ $th->tahun_akademik }}</option>
                        @endforeach
                    </select>
                    @error('id_tahun_akademik') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Input Catatan --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Isi Catatan</label>
                    <textarea required wire:model="catatan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tuliskan evaluasi atau perbaikan yang diperlukan..."></textarea>
                    @error('catatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex justify-end pt-2">
                    <button type="button" onclick="closeModal()" class="mr-2 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                    <button type="submit" class="text-white bg-biru-custom hover:opacity-90 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        {{ $isEditMode ? 'Simpan Perubahan' : 'Simpan Catatan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- SCRIPT PENGENDALI MODAL --}}
<script>
    const modalEl = document.getElementById('modalEvaluasi');

    function openModal() {
        modalEl.classList.remove('hidden');
    }

    function closeModal() {
        modalEl.classList.add('hidden');
    }

    // Listener Event dari Livewire
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('open-modal', () => {
            openModal();
        });

        Livewire.on('close-modal', () => {
            closeModal();
        });
    });
</script>
