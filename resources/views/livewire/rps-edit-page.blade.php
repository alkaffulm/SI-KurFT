    <div class="py-8 px-16 sm:ml-64 mt-16">
        <h2>Edit RPS untuk: {{ $rps->mataKuliah->nama_matkul_id }}</h2>

        <form wire:submit.prevent="saveRps">

            <h1>RPS INDUK</h1>

            <div>
                <label for="id_bk">Bahan Kajian:</label><br>
                <select wire:model="id_bk" required>
                    <option value="">-- Pilih Bahan Kajian --</option>
                    @foreach ($allBahanKajian as $bk)
                        <option value="{{ $bk->id_bk }}" >{{ $bk->nama_kode_bk }} - {{ $bk->nama_bk_id }}</option>
                    @endforeach
                </select> MASIH ERROR DI ALLBAHANKAJIAN
            </div>
            <br>

            <div>
                <label for="cpl_ids">CPL yang Dibebankan:</label><br>
                {{-- Gunakan Select2 untuk pengalaman yang lebih baik --}}
                <select wire:model="cpl_ids[]" class="select2 w-48" multiple="multiple" required>
                    @foreach ($allCpl as $cpl)
                        <option value="{{ $cpl->id_cpl }}" >{{ $cpl->nama_kode_cpl }}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <div>
                <label for="id_mk_syarat">Mata Kuliah Prasyarat:</label><br>
                <select wire:model="id_mk_syarat" >
                    <option value="">Tidak ada Matkul Prasyarat</option>
                    @foreach ($allMatkul as $mk)
                        <option value="{{ $mk->id_mk }}" >{{ $mk->nama_matkul_id }}</option>
                    @endforeach
                </select>                
            </div>

            <br>
            <div>
                <label for="materi_pembelajaran">Materi Pembelajaran:</label><br>
                <textarea wire:model="materi_pembelajaran" rows="5"></textarea>
            </div>

            <br>
            
            <div>
                <label for="pustaka_utama">Pustaka Utama:</label><br>
                <textarea wire:model="pustaka_utama" rows="5"></textarea>
            </div>

            <br>

            <div>
                <label for="pustaka_pendukung">Pustaka pendukung:</label><br>
                <textarea wire:model="pustaka_pendukung" rows="5"></textarea>
            </div>
            <br>

            <h1>RPS DETAIL</h1>

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
                                    <select class="select2" multiple="multiple" data-index="{{ $index }}" id="">
                                        @for ($i = 1 ; $i <= 16 ; $i++)
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

            <button type="submit">Simpan RPS</button>
        </form>
    </div>
    <script>
        document.addEventListener('livewire:init', () => {
            // Inisialisasi Select2 untuk CPL
            const cplSelect = $('#cpl_ids_select');
            
            function initCplSelect() {
                cplSelect.select2({
                    placeholder: "Pilih CPL",
                    allowClear: true
                });
            }

            initCplSelect();

            // Set nilai awal Select2 dari data Livewire
            cplSelect.val(@json($cpl_ids)).trigger('change');

            // Kirim perubahan kembali ke Livewire
            cplSelect.on('change', function (e) {
                @this.set('cpl_ids', $(this).val());
            });

            // ... script untuk Select2-weeks jika ada ...
        });
    </script>
