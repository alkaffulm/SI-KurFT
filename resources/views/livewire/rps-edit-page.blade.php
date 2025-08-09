<div class="py-8 px-16 sm:ml-64 mt-16">

        <a href="/dosen/matkul">Kembali</a>
        <h2 class="text-2xl font-bold">Edit RPS </h2>

        <form wire:submit.prevent="saveRps">
            <br>
            <h1 class="font-bold">RPS INDUK</h1>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Mata Kuliah </th>
                        <td>: {{ $rps->mataKuliah->nama_matkul_id }}</td>
                    </tr>
                    <tr>
                        <th>Kode</th>
                        <td>: {{$rps->mataKuliah->kode_mk}}</td>
                    </tr>
                    <tr>
                        <th>Bobot</th>
                        <td>: SKS Teori {{$rps->mataKuliah->sks_teori}} | SKS Praktikum: {{$rps->mataKuliah->sks_praktikum}}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>: {{$rps->mataKuliah->semester}}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>: {{$rps->mataKuliah->matkul_desc_id}}</td>
                    </tr>
                </thead>
            </table>

            <br>
            <div>
                <h4>CPL Prodi yang dibebankan pada MK:</h4>
                <ul class="list-disc list-inside">
                    @forelse ($assocCpls as $cpl)
                        <li>{{ $cpl->nama_kode_cpl }}</li>
                    @empty
                        <li class="text-gray-500 mt-2">Belum ada CPL yang terhubung dengan mata kuliah ini.</li>
                    @endforelse
                </ul>
            </div>
            <br>
        
            <div>
                <h4>Bahan Kajian (BK):</h4>
                <ul class="list-disc list-inside">
                    @forelse ($rps->mataKuliah->bahanKajian as $bk)
                        <li>{{ $bk->nama_bk_id }}</li>
                    @empty
                        <li class="text-gray-500 mt-2">Belum ada BK yang terhubung dengan mata kuliah ini.</li>
                    @endforelse
                </ul>
            </div>
            <br>

            <div>
                <h4>CPMK untuk Mata Kuliah ini:</h4>
                <ul class="list-disc list-inside">
                    @forelse ($rps->mataKuliah->cpmks as $cpmk)
                        <li>{{ $cpmk->nama_kode_cpmk }}</li>
                    @empty
                        <li class="text-gray-500 mt-2">Belum ada CPMK yang terhubung dengan mata kuliah ini.</li>
                    @endforelse
                </ul>
            </div>
            <br>

            {{-- <div>
                <label for="id_bk">Bahan Kajian:</label><br>
                <select class="p-2 border" wire:model="id_bk" required>
                    <option value="">-- Pilih Bahan Kajian --</option>
                    @foreach ($allBahanKajian as $bk)
                        <option value="{{ $bk->id_bk }}" >{{ $bk->nama_kode_bk }} - {{ $bk->nama_bk_id }}</option>
                    @endforeach
                </select> 
            </div>
            <br> --}}

            {{-- <div wire:ignore>
                <label for="cpl_ids_select">CPL yang Dibebankan:</label><br>
                {{-- Gunakan Select2 untuk pengalaman yang lebih baik --}}
                {{-- <select  id="cpl_ids_select"  class="select2 w-48 p-2 border" multiple="multiple" required> --}} --}}
                    {{-- @foreach ($allCpl as $cpl)
                        <option value="{{ $cpl->id_cpl }}" >{{ $cpl->nama_kode_cpl }}</option>
                    @endforeach --}}
                {{-- </select>
            </div>
            <br> --}}

            <div>
                <label for="id_mk_syarat">Mata Kuliah Prasyarat:</label><br>
                <select class="p-2 border" wire:model="id_mk_syarat" >
                    <option value="">Tidak ada Matkul Prasyarat</option>
                    @foreach ($allMataKuliah as $mk)
                        <option value="{{ $mk->id_mk }}" >{{ $mk->nama_matkul_id }}</option>
                    @endforeach
                </select>                
            </div>

            <br>
            <div>
                <label for="materi_pembelajaran">Materi Pembelajaran:</label><br>
                <textarea wire:model="materi_pembelajaran"  class="p-2 border w-96 h-48"></textarea>
            </div>

            <br>
            
            <div>
                <label for="pustaka_utama">Pustaka Utama:</label><br>
                <textarea wire:model="pustaka_utama"  class="p-2 border w-96 h-48"></textarea>
            </div>

            <br>

            <div>
                <label for="pustaka_pendukung">Pustaka pendukung:</label><br>
                <textarea wire:model="pustaka_pendukung"  class="p-2 border w-96 h-48"></textarea>
            </div>
            <br>

            <h1 class="font-bold">RPS DETAIL</h1>
            <br>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border table-fixed">
                    <thead>
                        <tr>
                            <th class="p-2 border w-[150px]" >Minggu Ke-</th>
                            <th class="p-2 border w-[180px]">Sub-CPMK</th>
                            <th class="p-2 border w-[300px]">Indikator</th>
                            <th class="p-2 border w-[300px]">Kriteria & Teknik Penilaian</th>
                            <th class="p-2 border w-[300px]">Metode</th>
                            <th class="p-2 border w-[300px]">Materi Pembelajaran</th>
                            <th class="p-2 border w-[90px]">Bobot (%)</th>
                            <th class="p-2 border w-[90px]">Aksi</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($topics as $index => $topic )
                        <tr wire:key="topic-{{ $index }}" >
                                <td >
                                    <div wire:ignore>
                                        <select class="select2-weeks w-full" multiple="multiple" data-index="{{ $index }}" wire:key="select-weeks-{{ $index }}" id="">
                                            @for ($i = 1 ; $i <= 16 ; $i++)
                                                <option value="{{$i}}" {{ in_array($i, $topic['minggu_ke']) ? 'selected' : '' }}> {{$i}} </option>
                                            @endfor
                                        </select>
                                    </div>
                                    @error('topics.'.$index.'.minggu_ke') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>
                                <td class="p-2 border" >
                                    <select wire:model="topics.{{ $index }}.id_sub_cpmk"  class="w-full">
                                        <option value="">--pilih Sub-CPMK--</option>
                                        @foreach ($allSubCpmks as $scp )
                                            <option value="{{ $scp->id_sub_cpmk }}">{{ $scp->nama_kode_sub_cpmk }}</option>
                                        @endforeach
                                    </select>
                                    @error('topics.'.$index.'.id_sub_cpmk') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <textarea wire:model="topics.{{$index}}.indikator" id="indikator" class="border w-full h-48"></textarea>
                                    @error('topics.'.$index.'.indikator') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <textarea wire:model="topics.{{$index}}.kriteria_teknik_penilaian" id="kriteria_teknik_penilaian" class="border w-full h-48"></textarea>
                                    @error('topics.'.$index.'.kriteria_teknik_penilaian') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>                            
                                <td>
                                    <textarea wire:model="topics.{{$index}}.materi_pembelajaran" id="materi_pembelajaran"  class="border w-full h-48"></textarea>
                                    @error('topics.'.$index.'.mater_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>                            
                                <td>
                                    <textarea wire:model="topics.{{$index}}.metode_pembelajaran" id="metode_pembelajaran" class="border w-full h-48"></textarea>
                                    @error('topics.'.$index.'.indikator') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>                            
                                <td>
                                    <input type="text" wire:model="topics.{{$index}}.bobot_penilaian" id="bobot_penilaian" class="border w-full"></input>
                                    @error('topics.'.$index.'.bobot_penilaian') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <button type="button" wire:click="removeRow({{ $index }})" class="text-red-600 hover:text-red-800 font-bold">
                                        Hapus
                                    </button>                                
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-4 text-gray-500">Belum ada topik. Silakan tambah baris baru.</td>                     
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-between">
                <button type="button" wire:click="addRow" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Baris</button>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Simpan Rencana Mingguan</button>
            </div>         
        </form>
    </div>
    <script>
        // Gunakan event 'livewire:init' untuk memastikan Livewire siap
        document.addEventListener('livewire:init', () => {
            
            // Inisialisasi Select2 untuk CPL
            // const cplSelect = $('#cpl_ids_select');
            
            // // unruk multiselect cpl
            // function initCplSelect() {
            //     cplSelect.select2({
            //         placeholder: "Pilih CPL",
            //         allowClear: true
            //     });
            // }

            // // Panggil inisialisasi saat halaman pertama kali dimuat
            // initCplSelect();

            // // Set nilai awal Select2 dari data Livewire
            // // JSON akan mengubah array PHP menjadi array JavaScript

            // // Kirim perubahan dari Select2 kembali ke Livewire
            // cplSelect.on('change', function (e) {
            //     // @this.set() adalah cara JavaScript untuk mengubah properti di backend
            //     @this.set('cpl_ids', $(this).val());
            // });

            // untuk multiselect minggu-ke
            // function initWeekSelects() {
            //     // Hapus semua instance Select2 yang sudah ada untuk mencegah duplikasi
            //     $('.select2-weeks').each(function() {
            //         if ($(this).hasClass('select2-hidden-accessible')) {
            //             $(this).select2('destroy');
            //         }
            //     });
            //     // Target semua select dengan class 'select2-weeks'
            //     $('.select2-weeks').select2({
            //         placeholder: "Pilih Minggu",
            //         allowClear: true
            //     }).off('change.livewire').on('change.livewire', function (e) {
            //         // Ambil index dari atribut data-index
            //         const index = $(this).data('index');
            //         // Kirim data yang dipilih ke properti Livewire yang benar
            //         // Contoh: topics.0.minggu_ke, topics.1.minggu_ke, dst.
            //         @this.set('topics.' + index + '.minggu_ke', $(this).val());
            //     });
            // }

            function initWeekSelects() {
            // Kita tidak perlu lagi menghancurkan instance lama di sini
            $('.select2-weeks:not(.select2-hidden-accessible)').select2({
                placeholder: "Pilih Minggu",
                allowClear: true
            }).on('change', function () {
                const index = $(this).data('index');
                @this.set('topics.' + index + '.minggu_ke', $(this).val());
            });
        }

            // Panggil inisialisasi saat halaman pertama kali dimuat
            initWeekSelects();

            // Ini bagian pentingnya: dengarkan event dari Livewire
            // Jika ada perubahan pada properti cpl_ids di backend,
            // perbarui tampilan Select2 di frontend.
            // Livewire.on('cplIdsUpdated', (cplIds) => {
            //     cplSelect.val(cplIds).trigger('change');
            // });

            // Livewire.hook('morph.updated', (el, component) => {
            //     // Delay sedikit untuk memastikan DOM sudah terupdate
            //     setTimeout(() => {
            //         initWeekSelects();
            //     }, 100);
            // });
            // // Tambahan: Hook untuk setelah request selesai (setelah addRow dipanggil)
            // Livewire.hook('request.finished', (response, payload) => {
            //     setTimeout(() => {
            //         initWeekSelects();
            //     }, 150);
            // });

            // Event listener khusus untuk penambahan baris baru
            Livewire.hook('morph.updated', (el) => {
                initWeekSelects();
            });

            // // Event listener untuk penghapusan baris
            // Livewire.on('rowRemoved', () => {
            //     initWeekSelects();
            // });
        });
    </script>