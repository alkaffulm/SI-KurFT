<div>
    {{-- TABEL DATA (Copy dari view lama, ganti variabel loopingnya) --}}
    <div >
        {{-- AREA FILTER --}}
        <div class="grid grid-cols-1 mb-8 md:grid-cols-2 gap-4">
            
            {{-- Filter Prodi --}}
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Filter Program Studi</label>
                <select wire:model.live="selectedProdi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach($list_prodi as $prodi)
                        <option value="{{ $prodi->id_ps }}">{{ $prodi->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Filter Kurikulum --}}
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Filter Kurikulum</label>
                <select wire:model.live="selectedKurikulum" @if(empty($list_kurikulum)) disabled class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @endif class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">
                        @if(empty($selectedProdi))
                            -- Pilih Prodi Terlebih Dahulu --
                        @else
                            -- Pilih Kurikulum --
                        @endif
                    </option>
                    @foreach($list_kurikulum as $kur)
                        <option value="{{ $kur->id_kurikulum }}">{{ $kur->tahun }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- ... Header Tabel ... --}}
        <div class="overflow-x-auto rounded-lg border border-gray-400">
            <table class="w-full text-sm text-center text-gray-500">
                <thead class="text-white uppercase bg-teks-biru-custom">
                    <tr>  
                        <th scope="col" class="px-3 py-4 w-24">Kode MK</th>
                        <th scope="col" class="px-3 py-4 w-48">Nama Mata Kuliah</th>
                        <th scope="col" class="px-3 py-4 w-24">RPS</th>
                        <th scope="col" class="px-3 py-4  w-48">Pengembang RPS</th>
                        <th scope="col" class="px-3 py-4 w-48">Koordinator MK</th>
                        <th scope="col" class="px-3 py-4 w-24">Semester</th>
                        <th scope="col" class="px-3 py-4 w-24">SKS</th>                    
                    </tr>
                </thead>
                <tbody>
                    <tr wire:loading wire:target="selectedProdi, selectedKurikulum" class="bg-white border-t border-gray-400">
                        <td colspan="7" class="px-6 py-4 text-center">
                            <span class="text-sm font-medium text-gray-500">Sedang memuat data...</span>
                        </td>
                    </tr>
                    @if($mata_kuliah)
                        @forelse ($mata_kuliah as $mk)
                            <tr wire:loading.remove wire:target="selectedProdi, selectedKurikulum" class="bg-white border-t border-gray-400">
                                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                    {{ $mk->kode_mk }}
                                </th>
                                <td class="px-3 py-4 text-left border-r border-gray-400">
                                    <p>{{ $mk->nama_matkul_id }}</p>
                                    <p class="italic text-sm text-[#7397b6]">{{ $mk->nama_matkul_en }}</p>
                                </td>
                                <td class="px-3 py-4  border-r border-gray-400">
                                    @php
                                        $rpsAktif = $mk->rps->first();
                                    @endphp
                                    @if ($rpsAktif)
                                        <a href="{{ route('rps.show', $rpsAktif) }}" class="font-medium text-blue-600 hover:underline">Lihat RPS</a>
                                    @else
                                        {{-- <a href="{{ route('rps.create', ['id_mk' => $mk->id_mk]) }}" class="font-medium text-green-600 hover:underline">Buat RPS</a> --}}
                                        <i>Belum Ada RPS</i>
                                    @endif
                                </td>
                                <td class="px-3 py-4 text-left border-r border-gray-400">
                                    <p>{{ $mk->pengembangRps->username ?? 'Pengembang RPS Belum Ditentukan'}} </p>
                                </td>
                                <td class="px-3 py-4 text-left border-r border-gray-400">
                                    <p>{{ $mk->koordinatorMk->username ?? 'Koordinator Mata Kuliah Belum Ditentukan'}}</p>
                                </td>                                  
                                <td class="px-3 py-4 border-r border-gray-400">
                                    <p class="text-center">{{ $mk->semester }}</p>
                                </td>
                                <td class="px-3 py-4 border-r border-gray-400">
                                    <p class="text-center">{{ $mk->jumlahSks }}</p>
                                </td>
                            </tr>
                        @empty
                        {{-- Indikator Loading kecil (Opsional) --}}
                            <tr wire:loading.remove wire:target="selectedProdi, selectedKurikulum" class="bg-white border-t border-gray-400">
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    Data Mata Kuliah masih kosong.
                                </td>
                            </tr>
                        @endforelse
                    @else 
                        <tr wire:loading.remove>
                            <td colspan="100%" class="px-6 py-4 text-center text-gray-500">
                                Silakan pilih <b>Prodi</b> dan <b>Kurikulum</b> terlebih dahulu.
                            </td>
                        </tr>
                    @endif                     
                </tbody>
            </table>
        </div>
    </div>
</div>