<div>
    <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="prodi_mkbk" class="block mb-2 text-sm font-medium text-gray-900">Pilih Program Studi</label>
            <select wire:model.live="selectedProdi" id="prodi_mkbk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">-- Pilih Prodi --</option>
                @foreach($list_prodi as $ps)
                    <option value="{{ $ps->id_ps }}">{{ $ps->nama_prodi }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="kurikulum_mkbk" class="block mb-2 text-sm font-medium text-gray-900">Pilih Kurikulum</label>
            <select wire:model.live="selectedKurikulum" id="kurikulum_mkbk" @if(empty($list_kurikulum)) disabled class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @endif class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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

    <div class="overflow-x-auto max-w-full relative shadow-md sm:rounded-lg mb-6 border border-gray-400">
        <table class="w-full text-sm text-center border-collapse">
            <thead class="text-xs text-white bg-teks-biru-custom">
                <tr>
                    <th scope="col" rowspan="2" class="px-6 py-3 border border-gray-500 sticky left-0 z-30 bg-teks-biru-custom min-w-[100px] w-[100px]">
                        KODE MK
                    </th>
                    <th scope="col" rowspan="2" class="px-6 py-3 border border-gray-500 sticky left-[100px] z-30 bg-teks-biru-custom min-w-[250px] text-left">
                        MATA KULIAH
                    </th>
                    <th scope="col" colspan="{{ count($bahan_kajian) > 0 ? count($bahan_kajian) : 1 }}" class="px-6 py-3 uppercase border border-gray-500 whitespace-nowrap">
                        BAHAN KAJIAN (BK)
                    </th>
                </tr>
                <tr>
                    @forelse ($bahan_kajian as $bk)
                        <th scope="col" class="px-6 py-3 border border-gray-500 whitespace-nowrap min-w-[80px]" title="{{ $bk->nama_bk }}">
                            {{ $bk->nama_kode_bk }}
                        </th>
                    @empty
                        <th class="px-6 py-3 italic font-normal border border-gray-500">-</th>
                    @endforelse
                </tr>
            </thead>
            <tbody>
                
                <tr wire:loading wire:target="selectedProdi, selectedKurikulum, gotoPage, nextPage, previousPage" class="bg-white border-t border-gray-400 w-full">
                     <td colspan="{{ count($bahan_kajian) + 3 }}" class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <span class="text-sm font-medium text-gray-500 animate-pulse">Sedang memuat data MK vs BK...</span>
                        </div>
                    </td>
                </tr>

                @if($mata_kuliah)
                    @forelse ($mata_kuliah as $mk)
                        <tr wire:loading.remove wire:target="selectedProdi, selectedKurikulum, gotoPage" class="bg-white border-b border-gray-300 hover:bg-gray-50">
                            
                            <th scope="row" class="sticky left-0 z-20 px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-l border-gray-300 bg-gray-50 min-w-[100px] max-w-[100px]">
                                {{ $mk->kode_mk }}
                            </th>

                            <td class="sticky left-[100px] z-20 px-6 py-4 font-medium text-gray-900 border-r border-gray-300 bg-gray-50 text-left min-w-[250px]">
                                {{ $mk->nama_matkul_id }}
                            </td>

                            @forelse ($bahan_kajian as $bk)
                                @php
                                    // Cek apakah MK ini punya relasi ke BK ini
                                    $isChecked = isset($bk_mk_map[$mk->id_mk]) && in_array($bk->id_bk, $bk_mk_map[$mk->id_mk]);
                                @endphp
                                <td class="px-6 py-4 border-r border-gray-300 min-w-[80px]">
                                    @if ($isChecked)
                                        <span class=" font-bold text-lg">✓</span>
                                    @endif
                                </td>
                            @empty
                                <td class="px-6 py-4 text-gray-400 italic">No BK Data</td>
                            @endforelse
                        </tr>
                    @empty
                        <tr wire:loading.remove>
                            <td colspan="{{ count($bahan_kajian) + 3 }}" class="px-6 py-8 text-center text-gray-500">
                                Data Mata Kuliah tidak ditemukan pada halaman ini.
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
    @if($mata_kuliah && $mata_kuliah->hasPages())
        <div >
            {{ $mata_kuliah->links() }} 
        </div>
    @endif


</div>