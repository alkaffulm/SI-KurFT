<div>
    <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="prodi_peo" class="block mb-2 text-sm font-medium text-gray-900">Pilih Program Studi</label>
            <select wire:model.live="selectedProdi" id="prodi_peo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">-- Pilih Prodi --</option>
                @foreach($list_prodi as $ps)
                    <option value="{{ $ps->id_ps }}">{{ $ps->nama_prodi }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="kurikulum_peo" class="block mb-2 text-sm font-medium text-gray-900">Pilih Kurikulum</label>
            <select wire:model.live="selectedKurikulum" id="kurikulum_peo" @if(empty($list_kurikulum)) disabled class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" @endif class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
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
        <table class="w-full text-sm text-center border-collapse">
            <thead class="text-xs text-white bg-teks-biru-custom">
                <tr>
                    <th scope="col" rowspan="2" class="px-6 py-3 border border-gray-500 sticky left-0 z-20 min-w-[100px] bg-teks-biru-custom">
                        Kode CPL
                    </th>
                    <th scope="col" colspan="{{ count($peo) > 0 ? count($peo) : 1 }}" class="px-6 py-3 uppercase border border-gray-500 whitespace-nowrap">
                        Programme Educational Objective (PEO)
                    </th>
                </tr>
                <tr>
                    @forelse ($peo as $p)
                        <th scope="col" class="px-6 py-3 border border-gray-500 whitespace-nowrap min-w-[150px]" title="{{ $p->deskripsi_peo ?? '' }}">
                            {{ $p->kode_peo }}
                        </th>
                    @empty
                        <th class="px-6 py-3 italic font-normal border border-gray-500">-</th>
                    @endforelse
                </tr>
            </thead>
            <tbody>
                
                <tr wire:loading wire:target="selectedProdi, selectedKurikulum" class="bg-white border-t border-gray-400 w-full">
                     <td colspan="{{ count($peo) + 1 }}" class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <span class="text-sm font-medium text-gray-500 animate-pulse">Sedang memuat data CPL vs PEO...</span>
                        </div>
                    </td>
                </tr>
                @if($cpl)
                    @forelse ($cpl as $cp)
                        <tr wire:loading.remove wire:target="selectedProdi, selectedKurikulum" class="bg-white border-b border-gray-300 hover:bg-gray-50">
                            
                            <th scope="row" class="sticky left-0 z-10 px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-l border-gray-300 bg-gray-50">
                                {{ $cp->nama_kode_cpl }}
                            </th>

                            @forelse ($peo as $p)
                                @php
                                    $isChecked = isset($cpl_peo_map[$cp->id_cpl]) && in_array($p->id_peo, $cpl_peo_map[$cp->id_cpl]);
                                @endphp
                                <td class="px-6 py-4 border-r border-gray-300 min-w-[80px]">
                                    @if ($isChecked)
                                        <span class="font-bold text-lg">✓</span>
                                    @endif
                                </td>
                            @empty
                                <td class="px-6 py-4 text-gray-400 italic">No PEO Data</td>
                            @endforelse
                        </tr>
                    @empty
                        <tr wire:loading.remove wire:target="selectedProdi, selectedKurikulum" class="bg-white border-b border-gray-300">
                            <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                                @if(empty($selectedKurikulum))
                                    Silakan pilih <b>Prodi</b> dan <b>Kurikulum</b> terlebih dahulu.
                                @else
                                    Data CPL/PEO tidak ditemukan.
                                @endif
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
    @if($cpl && $cpl->hasPages())
        <div>
            {{ $cpl->links() }} 
        </div>
    @endif
</div>