<div>
    <form wire:submit-prevent="save">
        <div class="overflow-x-auto">
            <table class="w-full text-sm border">
                <thead>
                    <tr>
                        <th class="p-2 border">Sub-CPMK</th>
                        <th class="p-2 border">Indikator</th>
                        <th class="p-2 border">Kriteria & Teknik Penilaian</th>
                        <th class="p-2 border">Materi Pembelajaran</th>
                        <th class="p-2 border">Metode</th>
                        <th class="p-2 border">Bobot (%)</th>
                        <th class="p-2 border">Minggu Ke-</th>
                        <th class="p-2 border">Aksi</th>                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($topics as $index => $topic )
                        <tr wire:key="topic-{{ $index }}">
                            <td class="p-2 border" >
                                <label for="">SubCpmk</label>
                                <select wire:model="topics.{{ $index }}.id_sub_cpmk" >
                                    <option value="">--pilih Sub-CPMK--</option>
                                    @foreach ($allSubCpmks as $sc )
                                        <option value="{{ $scp->id_sub_cpmk }}">{{ $scp->nama_kode_sub_cpmk }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('topics.'.$index.'.id_sub_cpmk') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                            </td>
                            <td>
                                <label for="indikator">Indikator</label>
                                <textarea wire:model="topics.{{$sc->index}}.indikator" id="indikator" cols="30" rows="10" class="border"></textarea>
                            </td>
                            <td>
                                <label for="kriteria_teknik_penilaian">Kriteria Teknik Penilaian</label>
                                <textarea wire:model="topics.{{$sc->index}}.kriteria_teknik_penilaian" id="kriteria_teknik_penilaian" cols="30" rows="10" class="border"></textarea>
                            </td>                            
                            <td>
                                <label for="metode_pembelajaran">metode pembelajaran</label>
                                <textarea wire:model="topics.{{$sc->index}}.metode_pembelajaran" id="metode_pembelajaran" cols="30" rows="10" class="border"></textarea>
                            </td>                            
                            <td>
                                <label for="materi_pembelajaran">materi pembelajaran</label>
                                <textarea wire:model="topics.{{$sc->index}}.materi_pembelajaran" id="materi_pembelajaran" cols="30" rows="10" class="border"></textarea>
                            </td>                            
                            <td>
                                <label for="bobot_penilaian">bobot penilaian</label>
                                <input type="number" wire:model="topics.{{$sc->index}}.bobot_penilaian" id="bobot_penilaian"  class="border"></input>
                            </td>
                            <td>
                                <div wire:ignore>
                                    <select class="select2-weeks" multiple="multiple" data-index="{{ $index }}" id="">
                                        @for ($i = 1 ; $i <= 16 ; $1++)
                                            <option value="{{$i}}" {{ in_array($i, $topic['minggu_ke']) ? 'selected' : '' }}> {{$i}} </option>
                                        @endfor
                                    </select>
                                </div>
                                {{-- @error('topics.'.$index.'.minggu_ke') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                            </td>
                            <td>
                                <button type="button" wire:click="removeRow({{ $index }})" class="text-red-600 hover:text-red-800 font-bold">
                                    Hapus
                                </button>                                
                            </td>
                        </tr>
                    @empty
                        <td colspan="8" class="text-center p-4 text-gray-500">Belum ada topik. Silakan tambah baris baru.</td>                     
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-between">
            <button type="button" wire:click="addRow" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Baris</button>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Simpan Rencana Mingguan</button>
        </div>
    </form>
    
    <script>
        document.addEventListener('livewire:init', () => {
            function initSelect2() {
                $('.select2-weeks').select2({
                    placeholder: "Pilih Minggu",
                    allowClear: true
                }).on('change', function (e) {
                    // Ambil index dari atribut data
                    const index = $(this).data('index');
                    // Kirim data yang dipilih ke properti Livewire
                    @this.set('topics.' + index + '.minggu_ke', $(this).val());
                });
            }

            initSelect2();

            // Inisialisasi ulang Select2 setiap kali Livewire selesai mengupdate DOM
            Livewire.hook('morph.updated', (el, component) => {
                initSelect2();
            });
        });
    </script>
</div>
