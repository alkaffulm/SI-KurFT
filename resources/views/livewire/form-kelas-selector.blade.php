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

    <form wire:submit.prevent="save">
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

                    {{-- Hari --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-700">Hari</label>
                        <select wire:model.live="paralels.{{ $i }}.hari" class="w-full sm:w-1/3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">-- Pilih Hari --</option>
                            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                                <option value="{{ $hari }}">{{ $hari }}</option>
                            @endforeach
                        </select>
                        @error("paralels.{$i}.hari")
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Ruangan --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-700">Ruangan</label>
                        <input placeholder="Contoh: Ruangan A15 FT BJM" type="text" wire:model.live="paralels.{{ $i }}.ruangan" class="w-full sm:w-1/3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                        @error("paralels.{$i}.ruangan")
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

                    {{-- Jam --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-700">Jam</label>
                        <input placeholder="08.00-10.30 WITA" type="text" wire:model.live="paralels.{{ $i }}.jam" class="w-full sm:w-1/3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                        @error("paralels.{$i}.jam")
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
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
