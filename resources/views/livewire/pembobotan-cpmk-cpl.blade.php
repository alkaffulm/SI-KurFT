<div>
    <div >
        <div>
            <label for="matakuliah_select" class="block mb-2 text-sm font-medium text-gray-900">Pilih Mata Kuliah</label>
            <select wire:model.live="selectedMataKuliah" id="matakuliah_select"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-biru-custom focus:border-biru-custom block w-full sm:w-1/3 p-2.5">
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach ($allMataKuliah as $mk)
                    <option value="{{ $mk->id_mk }}">{{ $mk->kode_mk }} - {{ $mk->nama_matkul_id }}</option>
                @endforeach
            </select>
        </div>
        @if (!empty($assocCpmks))
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">{{$MataKuliah->nama_matkul_id}}</h2>
                    <div class="space-x-2">
                        <a href="{{ route('pembobotan.edit', ['mataKuliah' => $selectedMataKuliah]) }}" class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Tambah atau Edit Pembobotan CPMK - CPL
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-16 text-center">
                                    Kode CPMK
                                </th>
                                @foreach ($assocCpls as $cpl)
                                    <th scope="col"  class="px-6 py-3 w-24 text-center">
                                        {{ $cpl->nama_kode_cpl }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assocCpmks as $cpmk)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">{{$cpmk->nama_kode_cpmk}}</th>
                                    @foreach ($assocCpls as $cpl)
                                        <th class="px-6 py-4 text-center font-semibold text-gray-900 border-r border-gray-400">
                                            @if (isset($correlationMap[$cpl->id_cpl]) && in_array($cpmk->id_cpmk, $correlationMap[$cpl->id_cpl]))
                                                @php
                                                    $key = $cpl->id_cpl . '-' . $cpmk->id_cpmk;
                                                    $bobot = $bobotCpmkCpl->get($key);
                                                @endphp
                                                {{$bobot ? $bobot->bobot . '%' : '-' }}
                                            @else
                                                <span >-</span>
                                            @endif
                                        </th>
                                    @endforeach
                                </tr>
                            @empty
                                <tr >
                                    <td colspan="{{count($assocCpls) + 1}}" class="px-6 py-3 text-base text-center border-r border-gray-400">CPMK Belum Ditambahkan!</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="font-semibold text-gray-900 bg-white border-t border-gray-400">
                                <th class="px-6 py-3 text-base text-left border-r border-gray-400">TOTAL </th>
                                @foreach ($assocCpls as $cpl )
                                    <td class="px-6 py-3 text-center text-base border-r border-gray-400">{{$cpl->totalBobot($selectedMataKuliah, $correlationMap)}}%</td>
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endif
</div>

