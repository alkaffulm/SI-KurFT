<div class="pt-8 px-8">
    <div class="bg-white p-8 rounded-2xl shadow-lg mb-8">
        
        {{-- Header & Tombol Action --}}
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-teks-biru-custom">
                Visi Keilmuan Program Studi
                {{-- Opsional: Tampilkan tahun kurikulum agar user yakin --}}
                {{-- @if($visi)
                   <span class="text-sm font-normal text-gray-500">(Kurikulum {{ $visi->kurikulum->tahun ?? '' }})</span>
                @endif --}}
            </h1>

            {{-- LOGIKA TOMBOL: Cek apakah data visi ada --}}
            @if($visi)
                {{-- JIKA ADA DATA: Tampilkan Tombol EDIT --}}
                <a href="{{ route('visi-keilmuan.edit', $visi->id_visi_keilmuan) }}" 
                   class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </a>
            @else
                {{-- JIKA KOSONG: Tampilkan Tombol TAMBAH (CREATE) --}}
                {{-- Note: Mungkin kamu perlu mengirim parameter id_kurikulum saat create agar otomatis terisi --}}
                <a href="{{ route('visi-keilmuan.create') }}" 
                   class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </a>
            @endif
        </div>

        {{-- Konten Deskripsi Visi --}}
        <div>
            {{-- Loading State (Opsional, biar keren saat ganti kurikulum) --}}
            <div wire:loading class="text-gray-500 italic mb-2">
                Memuat data visi...
            </div>

            <div wire:loading.remove>
                @if($visi)
                    <p class="text-gray-700 leading-relaxed">
                        {{ $visi->desc_vk_id }}
                    </p>
                @else
                    <p class="text-gray-700">Visi Keilmuan Belum Ditetapkan</p>
                @endif
            </div>
        </div>

    </div>
</div>