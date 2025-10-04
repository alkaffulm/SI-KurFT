<div>
    
    <div>Mata Kuliah Saat ini: {{ $selectedMataKuliah }}</div>
    <div class="bg-white p-8 rounded-lg shadow-md mb-8">
        <div>
            <label for="matakuliah_select" class="block mb-2 text-sm font-medium text-gray-900">Pilih Mata Kuliah</label>
            <select wire:model.live="selectedMataKuliah" id="matakuliah_select"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-biru-custom focus:border-biru-custom block w-full sm:w-1/3 p-2.5">
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach ($mataKuliahDosenTerkait as $mk)
                    <option value="{{ $mk->id_mk }}">{{ $mk->kode_mk }} - {{ $mk->nama_matkul_id }}</option>
                @endforeach
            </select>
        </div>

        @if (!empty($assocCpmks))
            <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Rencana Asesmen </h1>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-biru-custom">Rencana Asesmen {{$allMataKuliah->nama_matkul_id}}</h2>
                <div class="space-x-2">
                    <a href="{{ route('rencana-asesmen.create', ['mataKuliah' => $selectedMataKuliah]) }}" class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Tambah atau Edit Rencana Asesmen
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-400">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-16 text-center">
                                No
                            </th>
                            <th scope="col" class="px-6 py-r">
                                Komponen Evaluasi
                            </th>
                            @foreach ($assocCpmks as $cpmks)
                                <th scope="col"  class="px-6 py-3 w-24 text-center">
                                    {{ $cpmks->nama_kode_cpmk }}
                                </th>
                            @endforeach
                            <th scope="col" class="px-6 py-3 w-24 text-center">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rencanaAsesmen as $asesmen)
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">{{$loop->iteration}}</td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">{{$asesmen->komponenEvaluasiFormatted}}</th>
                                @foreach ($assocCpmks as $cpmk )
                                    @php
                                        $bobotforCpmkNow = $asesmen->bobotCpmk->firstWhere('id_cpmk', $cpmk->id_cpmk);
                                    @endphp
                                    <td  class="px-6 py-4 text-center font-semibold text-gray-900 border-r border-gray-400">{{$bobotforCpmkNow ? $bobotforCpmkNow->pivot->bobot . '%' : '-' }}</td>                                    
                                @endforeach
                                <td  class="px-6 py-4 text-center font-semibold text-gray-900">{{$asesmen->totalBobotKomponenEvaluasi}}</td>
                            </tr> 
                        @empty
                            <tr >
                                <td colspan="{{ count($assocCpmks) + 3}}"  class="px-6 py-3 text-base  border-r border-gray-400 text-center">Rencana Asesmen Belum Dibuat!</td>
                             </tr>    
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr class="font-semibold text-gray-900 bg-white border-t border-gray-400">
                            <th colspan="{{count($assocCpmks) + 2}}"  class="px-6 py-3 text-base text-left border-r border-gray-400">TOTAL CPMK</th>
                            <td class="px-6 py-3 text-center text-base">{{$allMataKuliah->totalBobotKeseluruhan}}%</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
    @endif
</div>
