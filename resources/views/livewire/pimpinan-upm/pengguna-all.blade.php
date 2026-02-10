<div>
    {{-- TABEL DATA (Copy dari view lama, ganti variabel loopingnya) --}}
    <div >
        {{-- AREA FILTER --}}
        <div class="grid grid-cols-1 mb-8 md:grid-cols-2 gap-4">
            
            {{-- Filter Prodi --}}
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Filter Program Studi</label>
                <select wire:model.live="selectedProdi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">-- Semua Prodi --</option>
                    @foreach($list_prodi as $prodi)
                        <option value="{{ $prodi->id_ps }}">{{ $prodi->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Role --}}
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Filter Role</label>
                <select wire:model.live="selectedRole" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">-- Semua Role --</option>
                    @foreach($list_role as $role)
                        <option value="{{ $role->id_role }}">{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Kurikulum --}}
            {{-- <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Filter Kurikulum</label>
                <select wire:model.live="selectedKurikulum" @if(empty($list_kurikulum)) disabled class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @endif class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">
                        @if(empty($selectedProdi))
                            -- Pilih Prodi Terlebih Dahulu --
                        @else
                            -- Semua Kurikulum --
                        @endif
                    </option>
                    @foreach($list_kurikulum as $kur)
                        <option value="{{ $kur->id_kurikulum }}">{{ $kur->tahun }}</option>
                    @endforeach
                </select>
            </div> --}}
        </div>

        {{-- ... Header Tabel ... --}}
        <div class="overflow-x-auto rounded-lg border border-gray-400">
            <table class="w-full text-sm text-center text-gray-500">
                <thead class="text-white uppercase bg-teks-biru-custom">
                    <tr>
                        <th scope="col" class="px-6 py-4">NIP</th>
                        <th scope="col" class="px-6 py-4">Username</th> 
                        <th scope="col" class="px-6 py-4">Roles</th>                        
                        <th scope="col" class="px-6 py-4">Program Studi</th>                        
                       
                    </tr>
                </thead>
                <tbody>
                    <tr wire:loading wire:target="selectedProdi, selectedKurikulum" class="bg-white border-t border-gray-400">
                        <td colspan="4" class="px-6 py-4 text-center">
                            <span class="text-sm font-medium text-gray-500">Sedang memuat data...</span>
                        </td>
                    </tr>
                    @forelse ($pengguna as $pg)
                        <tr wire:loading.remove wire:target="selectedProdi, selectedKurikulum" class="bg-white border-t border-gray-400">
                            {{-- REVISI: Menghapus hover dari kode PL --}}
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                {{ $pg->NIP }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                {{ $pg->username }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                @if($pg->roles->count())
                                    {{ $pg->roles->pluck('role')->implode(', ') }}
                                @else
                                    -
                                @endif
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                @if($pg->prodi->count())
                                    {{ $pg->prodi->pluck('nama_prodi')->unique()->implode(', ') }}
                                @else
                                    -
                                @endif
                            </th>
                        </tr>
                    @empty
                    {{-- Indikator Loading kecil (Opsional) --}}
                        <tr wire:loading.remove wire:target="selectedProdi, selectedKurikulum" class="bg-white border-t border-gray-400">
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Data Pengguna masih kosong.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>