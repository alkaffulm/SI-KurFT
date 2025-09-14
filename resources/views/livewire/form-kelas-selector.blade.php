<div class="space-y-6 mb-20">
    {{-- Tampilkan pesan error jika ada --}}
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        {{-- kurikulum --}} 
        <div> 
            <label for="kurikulum_select" class="block mb-2 text-sm font-medium text-gray-900"> 
                Pilih Kurikulum 
            </label> 
            <select wire:model.live="id_kurikulum" id="kurikulum_select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-biru-custom focus:border-biru-custom block w-full sm:w-1/3 p-2.5"> 
                <option value="">-- Pilih Kurikulum --</option> 
                @foreach ($kurikulums as $kurikulum) 
                    <option value="{{ $kurikulum->id_kurikulum }}"> 
                        {{ $kurikulum->nama_kurikulum ?? 'Kurikulum ' . $kurikulum->tahun }} 
                    </option> 
                @endforeach 
            </select> 
        </div> 
        
        {{-- tahun_akademik --}} 
        <div class="mt-10"> 
            <label for="tahun_select" class="block mb-2 text-sm font-medium text-gray-900"> 
                Pilih Tahun Akademik sesuai Kurikulum 
            </label> 
            <select wire:model.live="id_tahun_akademik" id="tahun_select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-biru-custom focus:border-biru-custom block w-full sm:w-1/3 p-2.5" @disabled(!$id_kurikulum)> 
                <option value="">-- Pilih Tahun Akademik --</option> 
                @foreach ($tahunAkademiks as $ta) 
                    <option value="{{ $ta->id_tahun_akademik }}"> {{ $ta->tahun_akademik }} </option> 
                @endforeach 
            </select> 
        </div>

        {{-- Pilih Semester --}}
        <div class="mt-10">
            <label class="block mb-2 text-sm font-medium text-gray-900">Pilih Semester untuk Mata Kuliah</label>
            <select wire:model.live="muncul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full sm:w-1/3 p-2.5" @disabled(!$id_kurikulum)>
                <option value="">-- Pilih Semester --</option>
                <option value="ganjil">Semester Ganjil</option>
                <option value="genap">Semester Genap</option>
                <option value="semua">Semester Semua</option>
            </select>
        </div>

        {{-- Mata Kuliah --}}
        <div class="mt-10">
            <label class="block mb-2 text-sm font-medium text-gray-900">Mata Kuliah</label>
            <select wire:model.live="id_mk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-biru-custom focus:border-biru-custom block w-full sm:w-1/3 p-2.5" @disabled(!$id_kurikulum || !$muncul)>
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach ($mataKuliahs as $mk)
                    <option value="{{ $mk->id_mk }}">{{ $mk->kode_mk }} - {{ $mk->nama_matkul_id }}</option>
                @endforeach
            </select>
        </div>

        {{-- Jumlah Paralel --}}
        <div class="mt-10">
            <label class="block mb-2 text-sm font-medium text-gray-900">Jumlah Kelas/Paralel</label>
            <select wire:model.live="jumlah_paralel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-biru-custom focus:border-biru-custom block w-full sm:w-1/3 p-2.5" @disabled(!$id_mk)>
                <option value="1">1 Kelas/Paralel</option>
                <option value="2">2 Kelas/Paralel</option>
                <option value="3">3 Kelas/Paralel</option>
                <option value="4">4 Kelas/Paralel</option>
                <option value="5">5 Kelas/Paralel</option>
                <option value="6">6 Kelas/Paralel</option>
                <option value="7">7 Kelas/Paralel</option>
                <option value="8">8 Kelas/Paralel</option>
                <option value="9">9 Kelas/Paralel</option>
                <option value="10">10 Kelas/Paralel</option>
            </select>
        </div>

        {{-- Form Paralel Dinamis --}}
        {{-- Form Paralel Dinamis --}}
        @if($id_mk && count($paralels) > 0)
            @foreach($paralels as $i => $p)
                <div class="mt-6 p-6 border rounded-xl bg-gray-50 shadow-sm">
                    <h3 class="font-semibold text-lg mb-4">Paralel Ke-{{ $i+1 }}</h3>
                    
                    {{-- Dosen --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-700">Dosen</label>
                        <select wire:model.live="paralels.{{ $i }}.id_user" class="w-full sm:w-1/3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach($dosens as $d)
                                <option value="{{ $d->id_user }}">{{ $d->username }}</option>
                            @endforeach
                        </select>
                        @error("paralels.{$i}.id_user")
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Jumlah Mahasiswa --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-700">Jumlah Mahasiswa</label>
                        <input placeholder="40" type="number" wire:model.live="paralels.{{ $i }}.jumlah_mhs" class="w-24 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" min="1" />
                        @error("paralels.{$i}.jumlah_mhs")
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- File Upload untuk setiap paralel - PERBAIKAN DI SINI --}}
                    <div class="mb-4">
                        <a href="{{ asset('template_kelas_sikurft.xlsx') }}"  
                        download  
                        class="mb-2 text-sm text-biru-custom underline text-right">
                        Template Daftar Mahasiswa
                        </a>

                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input_{{ $i }}">
                            Upload file Excel Mahasiswa (Paralel {{ $i+1 }}) - Opsional
                        </label>
                        
                        {{-- TAMBAHKAN KEY YANG UNIK --}}
                        <input 
                            type="file"
                            wire:model="paralel_files.{{ $i }}"
                            accept=".xls,.xlsx"
                            id="file_input_{{ $i }}"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                        />
                        
                        {{-- Loading indicator dengan target yang lebih spesifik --}}
                        <div wire:loading wire:target="paralel_files.{{ $i }}" class="text-blue-500 text-sm mt-1">
                            <span class="inline-flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Mengupload file untuk paralel {{ $i}}...
                            </span>
                        </div>
                        
                        {{-- Error message --}}
                        @error("paralel_files.{$i}")
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        {{-- Display selected file name dengan validasi --}}
                        @if(isset($paralel_files[$i]) && $paralel_files[$i])
                            <div class="text-sm text-green-600 mt-1">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z"/>
                                    </svg>
                                    {{ $paralel_files[$i]->getClientOriginalName() }} 
                                    ({{ number_format($paralel_files[$i]->getSize() / 1024, 2) }} KB)
                                </span>
                            </div>
                        @endif
                    </div>

                    {{-- Paralel Ke --}}
                    <div class="mb-0">
                        <label class="block mb-1 font-medium text-gray-700">Paralel Ke</label>
                        <input type="text" wire:model.live="paralels.{{ $i }}.paralel_ke" class="w-24 p-3 border rounded-lg bg-gray-100" disabled />
                    </div>
                </div>


            @endforeach
        @endif

        <div class="mt-10">
            <button type="submit" 
                    class="px-6 py-2 bg-biru-custom text-white rounded-lg hover:bg-blue-600 disabled:opacity-50 disabled:cursor-not-allowed"
                    @disabled(!$id_kurikulum || !$id_tahun_akademik || !$id_mk || count($paralels) == 0)>
                <span wire:loading.remove wire:target="save">Simpan</span>
                <span wire:loading wire:target="save">Menyimpan...</span>
            </button>
        </div>
    </form>
</div>



<script>
document.addEventListener('change', function(e) {
    if (e.target && e.target.id && e.target.id.startsWith('file_input_')) {
        const paralelIndex = e.target.id.replace('file_input_', '');
        const display = document.getElementById('file_name_' + paralelIndex);
        
        if (display) {
            const fileName = e.target.files.length > 0 ? e.target.files[0].name : "";
            if (fileName) {
                const fileSize = (e.target.files[0].size / 1024).toFixed(2);
                display.textContent = `📂 ${fileName} (${fileSize} KB)`;
                display.classList.add('text-green-600');
                display.classList.remove('text-gray-600');
            } else {
                display.textContent = "";
                display.classList.add('text-gray-600');
                display.classList.remove('text-green-600');
            }
        }
    }
});
</script>