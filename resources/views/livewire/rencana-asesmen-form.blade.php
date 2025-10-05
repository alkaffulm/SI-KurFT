<div>
        <form wire:submit.prevent="saveRencanaAsesmen">
            <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">
            <input type="hidden" name="id_kurikulum" value="{{ session('id_kurikulum_aktif') }}">

            <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                @if (!empty($assocCpmks))
                    <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Tambah Rencana Asesmen: {{$mataKuliah->nama_matkul_id}} </h1>

                    <div class="overflow-x-auto rounded-lg border border-gray-400">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-16 text-center">No</th>
                                    <th scope="col" class="px-6 py-r">Komponen Evaluasi</th>
                                        @foreach ($assocCpmks as $cpmks)
                                            <th scope="col"  class="px-6 py-3 w-24 text-center">
                                                {{ $cpmks->nama_kode_cpmk }}
                                            </th>
                                        @endforeach
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-24 text-center">Total</th>
                                    <th class="px-6 py-3 w-24 text-center">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rencanaAsesmens as $index => $rencanaAsesmen)
                                    <tr wire:key="rencanaAsesmen-{{ $index }}" class="bg-white border-t border-gray-400">
                                        <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">
                                            {{$loop->iteration}}
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                            <div>
                                                <label class="text-xs text-gray-500 font-normal">Tipe Komponen</label> 
                                                <br>                                                 
                                                <select wire:model.live="rencanaAsesmens.{{ $index }}.tipe_komponen" class="p-2 border rounded-lg border-gray-300 bg-gray-100 mt-2" id="">
                                                    <option value="">Pilih Komponen Evaluasi</option>
                                                    <option value="tugas">Tugas</option>
                                                    <option value="kuis">Kuis</option>
                                                    <option value="uts">UTS</option>
                                                    <option value="uas">UAS</option>
                                                </select>
                                                <br>
                                                @error('rencanaAsesmens.'.$index.'.tipe_komponen') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                            @if (!in_array($rencanaAsesmen['tipe_komponen'], ['uts','uas']))
                                                <div>
                                                    <label class="text-xs text-gray-500 font-normal">Nomor Komponen</label>                       
                                                    <br>                           
                                                    <input placeholder="isi nomor komponen" wire:model="rencanaAsesmens.{{$index}}.nomor_komponen" type="number"  class="p-2 border rounded-lg border-gray-300 bg-gray-100 mt-2 " >
                                                    <br>
                                                    @error('rencanaAsesmens.'.$index.'.nomor_komponen') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            @endif
                                            {{-- <span class="text-xs text-gray-500 font-normal italic">Studi Kasus (Case Method)</span> --}}
                                        </th>
                                        @foreach ($assocCpmks as $cpmks)
                                            <td scope="col"  class="px-6 py-4 text-center font-semibold text-gray-900 border-r border-gray-400">
                                                <input wire:model="rencanaAsesmens.{{$index}}.bobot.{{ $cpmks->id_cpmk}}" type="number" step="0.01" class="p-2 border rounded-lg border-gray-300 bg-gray-100 mt-2" min="0" max="100">
                                                @error('rencanaAsesmens.'.$index.'.bobot.'.$cpmks->id_cpmk) <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </td>
                                        @endforeach
                                        <td  class="px-6 py-4 text-center font-semibold text-gray-900 border-r border-gray-400">
                                            <p>{{array_sum($rencanaAsesmen['bobot'])}}</p>
                                            @error('rencanaAsesmens.'.$index.'.bobot') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </td>
                                        <td class="x-6 py-4 text-center font-semibold text-gray-900">
                                            <button type="button" wire:click="removeRow({{ $index }})" class="text-red-600 hover:text-red-800 font-bold">
                                                Hapus
                                            </button> 
                                        </td>
                                    </tr>
                                @empty
                                    <tr >
                                        <td colspan="{{count($assocCpmks) + 4}}" class="px-6 py-3 text-base text-center border-r border-gray-400">Komponen Evaluasi Belum DIbuat</td>
                                    </tr>                                    
                                @endforelse
                            </tbody>
                            @if (!empty($rencanaAsesmens))
                                <tfoot>
                                    <tr class="font-semibold text-gray-900 bg-white border-t border-gray-400">
                                        <th colspan="{{count($assocCpmks) + 2}}"  class="px-6 py-3 text-base text-left border-r border-gray-400">TOTAL CPMK</th>
                                        <td class="px-6 py-3 text-center text-base">{{$totalBobotKeseluruhan}}</td>
                                    </tr>
                                </tfoot>                                              
                            @endif
                        </table>
                    </div>
                    @error('rencanaAsesmens') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    <div class="mt-4 flex justify-between">
                        <button type="button" wire:click="addRow" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Baris</button>
                        <div class="flex gap-6">
                            <a href="{{ route('rencana-asesmen.index') }}" class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">Batal</a>
                            <button type="submit" class="text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">Simpan Rencana Asesmen</button>
                        </div>
                    </div> 
                </div>
                @else
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                        <p class="font-bold">Peringatan</p>
                        <p>CPMK untuk mata kuliah ini belum ditetapkan. Silakan tetapkan CPMK terlebih dahulu sebelum menambahkan rencana asesmen.</p>
                    </div>
                @endif
            </div>
        </form>
</div>
