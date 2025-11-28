<div>
    <form wire:submit.prevent="saveRencanaAsesmen">
        <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">
        <input type="hidden" name="id_kurikulum" value="{{ session('id_kurikulum_aktif') }}">

        <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
            @if ($assocCpmks->isEmpty())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
                    <p class="font-bold">CPMK Belum Tersedia</p>
                    <p>CPMK untuk mata kuliah ini belum ditetapkan. Silakan tetapkan CPMK terlebih dahulu.</p>
                </div>
            @elseif (!$mappingExists)
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4">
                    <p class="font-bold">Mapping Belum Ditetapkan</p>
                    <p>Mapping antara CPMK dan Mata Kuliah ini belum diatur oleh Koordinator Program Studi.</p>
                </div>
            @else
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Tambah Rencana Asesmen: {{ $mataKuliah->nama_matkul_id }} </h1>
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th rowspan="2" class="px-6 py-3 text-center border-r">No</th>
                                <th rowspan="2" class="px-6 py-3 text-center border-r">Komponen Evaluasi</th>
                                @foreach ($groupedCpl as $group)
                                    <th colspan="{{ count($group['cpmks']) }}" class="px-6 py-3 text-center border-r">
                                        {{ $group['cpl']->nama_kode_cpl }}
                                    </th>
                                @endforeach
                                <th rowspan="2" class="px-6 py-3 text-center border-r">Total Nilai</th>
                                <th rowspan="2" class="px-6 py-3 text-center border-r">Aksi</th>
                            </tr>
                            <tr>
                                @foreach ($groupedCpl as $group)
                                    @foreach ($group['cpmks'] as $cpmk)
                                        <th class="px-6 py-3 text-center border-r">
                                            {{ $cpmk->nama_kode_cpmk }}
                                        </th>
                                    @endforeach
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($rencanaAsesmens as $index => $rencana)
                                <tr wire:key="rencana-asesmen-{{ $index }}">
                                    <td class="px-6 py-4 text-center font-medium text-gray-900 border-r">{{ $loop->iteration }}</td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r">
                                        <div>
                                            <label class="text-xs text-gray-500 font-normal">Tipe Komponen</label>
                                            <br>
                                            <select wire:model.live="rencanaAsesmens.{{ $index }}.tipe_komponen" class="p-2 border rounded-lg border-gray-300 bg-gray-100 mt-2">
                                                <option value="">Pilih Komponen Evaluasi</option>
                                                <option value="tugas">Tugas</option>
                                                <option value="kuis">Kuis</option>
                                                <option value="uts">UTS</option>
                                                <option value="uas">UAS</option>
                                                <option value="Kegiatan Partisipatif">Kegiatan Partisipatif</option>
                                                <option value="Hasil Proyek">Hasil Proyek</option>
                                            </select>
                                            @error('rencanaAsesmens.'.$index.'.tipe_komponen') 
                                                <span class="text-red-500 text-xs">{{ $message }}</span> 
                                            @enderror
                                        </div>

                                        @if (!in_array($rencana['tipe_komponen'], ['uts','uas','Kegiatan Partisipatif','Hasil Proyek']))
                                            <div class="mt-2">
                                                <label class="text-xs text-gray-500 font-normal">Nomor Komponen</label>
                                                <br>
                                                <input type="number" min="1" placeholder="isi nomor komponen" wire:model="rencanaAsesmens.{{$index}}.nomor_komponen" class="p-2 border rounded-lg border-gray-300 bg-gray-100 mt-2">
                                                @error('rencanaAsesmens.'.$index.'.nomor_komponen') 
                                                    <span class="text-red-500 text-xs">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                        @endif
                                    </th>

                                    @foreach ($assocCpmks as $map)
                                        <td class="px-6 py-4 text-center font-semibold text-gray-900 border-r"
                                            x-data="{ overLimit: false }"
                                            x-init="
                                                window.addEventListener('bobot-exceeded', event => {
                                                    if (event.detail.cpmkId == {{ $map->id_cpmk }}) {
                                                        overLimit = true;
                                                        setTimeout(() => overLimit = false, 2000);
                                                    }
                                                })
                                            ">
                                            <input type="number" step="0.01" min="0" max="100"\
                                                wire:model.defer="rencanaAsesmens.{{ $index }}.bobot.{{ $map->id_mk_cpmk_cpl }}"
                                                class="bobot-input p-2 border rounded-lg mt-2"
                                                data-map-id="{{ $map->id_mk_cpmk_cpl }}"
                                                value="{{ $rencana['bobot'][$map->id_mk_cpmk_cpl] }}">

                                            @error('rencanaAsesmens.'.$index.'.bobot.'.$map->id_mk_cpmk_cpl) 
                                                <span class="text-red-500 text-xs">{{ $message }}</span> 
                                            @enderror
                                        </td>
                                    @endforeach

                                    <td class="px-6 py-4 text-center font-semibold text-gray-900 border-r">{{ array_sum($rencana['bobot']) }}</td>
                                    <td class="px-6 py-4 text-center font-semibold text-gray-900">
                                        <button type="button" wire:click="removeRow({{ $index }})" class="text-red-600 hover:text-red-800 font-bold">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ count($assocCpmks) + 4 }}" class="px-6 py-3 text-center border-r">Komponen Evaluasi Belum Dibuat</td>
                                </tr>
                            @endforelse
                        </tbody>

                        @if (!empty($rencanaAsesmens))
                            <tfoot>
                                <tr class="font-semibold text-gray-900 bg-white border-t border-gray-400">
                                    <td colspan="2" class="px-6 py-3 text-left border-r">Bobot Standar CPMK</td>
                                    @foreach ($assocCpmks as $map)
                                        <td data-map-id="{{ $map->id_mk_cpmk_cpl }}" class="bobot-footer px-6 py-3 text-center border-r">
                                            {{ $bobotStandarPerCpmk[$map->id_mk_cpmk_cpl] ?? 0 }}
                                        </td>
                                    @endforeach
                                    <td colspan="2" class="px-6 py-3 text-center border-r">100</td>
                                </tr>
                            </tfoot>
                        @endif
                    </table>
                </div>

                <div class="mt-4 flex justify-between">
                    <button type="button" wire:click="addRow" class="text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg px-6 py-3">Tambah Baris</button>
                    <div class="flex gap-6">
                        <a href="{{ route('rencana-asesmen.index') }}" class="px-6 py-3 font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">Batal</a>
                        <button type="submit" class="text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg px-6 py-3">Simpan Rencana Asesmen</button>
                    </div>
                </div>
            @endif
        </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.hook('message.processed', (message, component) => {
                checkTotals();
            });

            // delegated event untuk input manual
            document.addEventListener('change', function(e){
                if(e.target.classList.contains('bobot-input')){
                    checkTotals();
                }
            });

            function checkTotals() {
                const inputs = document.querySelectorAll('.bobot-input');
                const totals = {};

                inputs.forEach(input => {
                    const mapId = input.dataset.mapId;
                    const value = parseFloat(input.value || 0);
                    totals[mapId] = (totals[mapId] || 0) + value;
                });

                Object.keys(totals).forEach(mapId => {
                    const total = totals[mapId];
                    const footerEl = document.querySelector(`.bobot-footer[data-map-id="${mapId}"]`);
                    
                    if (!footerEl) return;
                    
                    const standar = parseFloat(footerEl.innerText);
                    const difference = total - standar;
                    const highlight = Math.abs(difference) > 0.01; // tolerance untuk floating point

                    document.querySelectorAll(`.bobot-input[data-map-id="${mapId}"]`).forEach(el => {
                        if (highlight) {
                            el.classList.add('border-red-600', 'bg-red-100');
                        } else {
                            el.classList.remove('border-red-600', 'bg-red-100');
                        }
                    });

                    document.querySelectorAll(`.bobot-input[data-map-id="${mapId}"]`).forEach(el => {
                        let msgEl = el.parentNode.querySelector('.bobot-error');
                        if (!msgEl) {
                            msgEl = document.createElement('div');
                            msgEl.classList.add('bobot-error', 'text-xs', 'text-red-600', 'mt-1');
                            el.parentNode.appendChild(msgEl);
                        }
                        if (highlight) {
                            msgEl.innerText = difference > 0 
                                ? `Kelebihan ${difference.toFixed(2)}` 
                                : `Kurang ${Math.abs(difference).toFixed(2)}`;
                        } else {
                            msgEl.innerText = '';
                        }
                    });
                });
            }

            checkTotals();
        });
    </script>

    </form>
</div>
