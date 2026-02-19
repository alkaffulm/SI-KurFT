<div>
    <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="prodi_mkcpl" class="block mb-2 text-sm font-medium text-gray-900">Pilih Program Studi</label>
            <select wire:model.live="selectedProdi" id="prodi_mkcpl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">-- Pilih Prodi --</option>
                @foreach($list_prodi as $ps)
                    <option value="{{ $ps->id_ps }}">{{ $ps->nama_prodi }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="kurikulum_mkcpl" class="block mb-2 text-sm font-medium text-gray-900">Pilih Kurikulum</label>
            <select wire:model.live="selectedKurikulum" id="kurikulum_mkcpl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" {{ empty($selectedProdi) ? 'disabled' : '' }}>
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

    <div class="overflow-x-auto max-w-full relative shadow-md sm:rounded-lg border border-gray-400">
        <table class="w-full text-sm text-left border-collapse"> <thead class="text-xs text-white bg-teks-biru-custom text-center">
                <tr>
                    <th scope="col" rowspan="2" class="px-6 py-3 border border-gray-500 sticky left-0 z-30 bg-teks-biru-custom min-w-[200px] w-[250px] text-left">
                        MATA KULIAH
                    </th>
                    <th scope="col" colspan="{{ count($cpl) > 0 ? count($cpl) : 1 }}" class="px-6 py-3 uppercase border border-gray-500 whitespace-nowrap">
                        CAPAIAN PEMBELAJARAN LULUSAN (CPL)
                    </th>
                </tr>
                <tr>
                    @forelse ($cpl as $c)
                        <th scope="col" class="px-6 py-3 border border-gray-500 whitespace-nowrap min-w-[120px]" title="{{ $c->deskripsi_cpl }}">
                            {{ $c->nama_kode_cpl }}
                        </th>
                    @empty
                        <th class="px-6 py-3 italic font-normal border border-gray-500">-</th>
                    @endforelse
                </tr>
            </thead>
            <tbody>
                
                <tr wire:loading wire:target="selectedProdi, selectedKurikulum, gotoPage, nextPage, previousPage" class="bg-white border-t border-gray-400 w-full">
                     <td colspan="{{ count($cpl) + 1 }}" class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <span class="text-sm font-medium text-gray-500 animate-pulse">Sedang memuat data...</span>
                        </div>
                    </td>
                </tr>

                @if($mata_kuliah)
                    @forelse ($mata_kuliah as $mk)
                        <tr wire:loading.remove wire:target="selectedProdi, selectedKurikulum, gotoPage" class="bg-white border-b border-gray-300 hover:bg-gray-50">
                            
                            <th scope="row" class="sticky left-0 z-20 px-6 py-4 font-bold text-gray-700 border-r border-l border-gray-300 bg-gray-50 min-w-[200px] align-middle">
                                <div class="flex flex-col">
                                    <span >{{ $mk->nama_matkul_id }}</span>
                                </div>
                            </th>

                            @forelse ($cpl as $c)
                                <td class="px-4 py-4 border-r border-gray-300 min-w-[120px] align-top bg-white">
                                    
                                    @php
                                        // Ambil Array ID CPMK yang ada di sel ini (MK ini & CPL ini)
                                        $cpmk_ids_in_cell = $mk_cpmk_cpl_map[$mk->id_mk][$c->id_cpl] ?? [];
                                    @endphp

                                    @if (count($cpmk_ids_in_cell) > 0)
                                        <ul class="space-y-1">
                                            @foreach ($cpmk_ids_in_cell as $id_cpmk)
                                                @if(isset($cpmk_list[$id_cpmk]))
                                                    <li class="flex items-start ">
                                                        <span class="mr-1.5 mt-1 h-1.5 w-1.5 flex-shrink-0 rounded-full bg-gray-400"></span>
                                                        <span>{{ $cpmk_list[$id_cpmk]->nama_kode_cpmk ?? $cpmk_list[$id_cpmk]->kode_cpmk }}</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif

                                </td>
                            @empty
                                <td class="px-6 py-4 text-gray-400 italic text-center">No CPL Data</td>
                            @endforelse
                        </tr>
                    @empty
                        <tr wire:loading.remove>
                            <td colspan="{{ count($cpl) + 1 }}" class="px-6 py-4 text-center text-gray-500">
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
        <div>
            {{ $mata_kuliah->links() }} 
        </div>
    @endif

</div>