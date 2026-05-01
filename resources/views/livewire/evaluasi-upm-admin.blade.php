<div>
    
    {{-- Flash Message Success --}}
    @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm font-semibold text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Flash Message Error --}}
    @if (session()->has('error'))
        <div class="p-4 mb-4 text-sm font-semibold text-red-800 rounded-lg bg-red-50" role="alert">
            {{ session('error') }}
        </div>
    @endif

    {{-- Flash Message Info --}}
    @if (session()->has('info'))
        <div class="p-4 mb-4 text-sm font-semibold text-blue-800 rounded-lg bg-blue-50" role="alert">
            {{ session('info') }}
        </div>
    @endif

    <div class="py-2 px-10 ">
        <main class="">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Menu Utama</span>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Evaluasi UPM</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Evaluasi UPM Terhadap Program Studi</h1>
                <p class="text-gray-600 mb-6 text-justify">
                    mengelola evaluasi yang diberikan oleh UPM 
                    terhadap program studi. Evaluasi ini berisi catatan, saran, dan rekomendasi perbaikan untuk meningkatkan kualitas dan akreditasi program studi. 
                </p>

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-3">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Evaluasi UPM</h2>
                    {{-- <button wire:click="create" class="bg-biru-custom hover:opacity-90 text-white font-medium py-2 px-4 rounded-lg">
                        + Tambah Catatan
                    </button> --}}
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center w-10">No</th>
                                <th scope="col" class="px-6 py-3 text-center w-32">Tahun Akademik</th>
                                <th scope="col" class="px-6 py-3 text-center">Catatan</th>
                                <th scope="col" class="px-6 py-3 text-center w-20">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($evaluasi as $item)
                                <tr class="bg-white border-b hover:bg-gray-50 border-t border-gray-400">
                                    <td class="px-6 py-4 border-r border-gray-400 text-gray-900 font-medium">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 border-r border-gray-400">
                                        {{ $item->tahunakademik->tahun_akademik ?? '-' }} 
                                    </td>
                                    <td class="px-6 py-4 border-r border-gray-400">
                                        <p class="line-clamp-2 font-medium text-gray-900" title="{{$item->catatan}}">{{ $item->catatan ?? '-' }}</p>
                                        <div class="flex gap-x-3 mt-2 italic">
                                            <p class="text-[12px]">Dibuat pada: {{ $item->created_at->format('d-m-Y') }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center flex gap-x-2">
                                        <button wire:click="edit({{ $item->id_evaluasi_upm }})"
                                            class="inline-flex items-center px-3 py-1.5 text-sm text-yellow-600 hover:text-white hover:bg-yellow-600 border border-yellow-600 rounded-lg transition">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                            </svg>
                                            Edit
                                        </button>
                                        <button wire:click="delete({{ $item->id_evaluasi_upm }})" wire:confirm="Yakin ingin menghapus catatan ini?"
                                            class="inline-flex items-center px-3 py-1.5 text-sm text-red-600 hover:text-white hover:bg-red-600 border border-red-600 rounded-lg transition">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada catatan evaluasi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- menampilkan pagination --}}
                <div>
                    {{ $evaluasi->links() }}
                </div>
            </div>
        </main>
    </div>

    {{-- MODAL FORM (Satu modal untuk Create & Edit) --}}
    <div id="modalEvaluasi" wire:ignore.self class="fixed inset-0 z-50 hidden overflow-y-auto bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="relative w-full max-w-lg p-6 bg-white rounded-lg shadow-lg">
            
            {{-- Modal Header --}}
            <div class="flex justify-between items-center pb-4 mb-4 border-b">
                <h3 class="text-xl font-bold text-biru-custom">
                    {{ $isEditMode ? 'Edit Catatan Evaluasi' : 'Tambah Catatan Evaluasi' }}
                </h3>
            </div>

            {{-- Modal Body (Form) --}}
            <form wire:submit.prevent="store">
                
                {{-- Input Tahun Akademik --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Tahun Akademik</label>
                    <select wire:model="id_tahun_akademik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="">-- Pilih Tahun Akademik --</option>
                        @foreach($list_tahun as $th)
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

                {{-- Input Tanggal Pembuatan --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pembuatan</label>
                    <input type="date" wire:model="created_at" max="{{ date('Y-m-d') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('created_at') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
