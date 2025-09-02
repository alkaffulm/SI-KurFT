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
                    <table>
                        @forelse ($assocCpls as $cpl)
                            <tr>
                                <td class="w-[90px] flex align-top"><li>{{ $cpl->nama_kode_cpl }} = </li></td>
                                <td >{{ $cpl->desc_cpl_id }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td><li class="text-gray-500 mt-2">Belum ada CPL yang terhubung dengan mata kuliah ini.</li></td>
                            </tr>
                        @endforelse
                    </table>
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
                    <table>
                        @forelse ($assocCpmk as $cpmk)
                            <tr>
                                <td class="w-[90px] flex align-top"><li>{{ $cpmk->nama_kode_cpmk }} = </li></td>
                                <td >{{ $cpmk->desc_cpmk_id }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td><li class="text-gray-500 mt-2">Belum ada CPMK yang terhubung dengan mata kuliah ini.</li></td>
                            </tr>
                        @endforelse
                    </table>
                </ul>
            </div>
            <br>

            <div>
                <label for="id_mk_syarat">Mata Kuliah Prasyarat:</label><br>
                <select class="p-2 border" wire:model="id_mk_syarat" >
                    <option value="">Tidak ada Matkul Prasyarat</option>
                    @foreach ($allMataKuliah as $mk)
                        <option value="{{ $mk->id_mk }}" >{{ $mk->nama_matkul_id }}</option>
                    @endforeach
                </select>  
                @error('id_mk_syarat') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror                           
            </div>

            <br>
            <div>
                <label for="materi_pembelajaran">Materi Pembelajaran:</label><br>
                <textarea wire:model="materi_pembelajaran"  class="p-2 border w-96 h-48"></textarea>
                @error('materi_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
            </div>

            <br>
            
            <div>
                <label for="pustaka_utama">Pustaka Utama:</label><br>
                <textarea wire:model="pustaka_utama"  class="p-2 border w-96 h-48"></textarea>
                @error('pustaka_utama') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
            </div>

            <br>

            <div>
                <label for="pustaka_pendukung">Pustaka pendukung:</label><br>
                <textarea wire:model="pustaka_pendukung"  class="p-2 border w-96 h-48"></textarea>
                @error('pustaka_pendukung') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror                         
            </div>
            <br>

            <h1 class="font-bold">RPS DETAIL</h1>
            <br>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border table-fixed">
                    <thead>
                        <tr>
                            <th class="p-2 border w-[180px]" >Minggu Ke-</th>
                            <th class="p-2 border w-[180px]" >Jenis</th>
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
                                 @error('topics.'.$index.'.id_topic') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
                                <td >
                                    <div wire:ignore>
                                        <select class="select2-weeks w-full" multiple="multiple" data-index="{{ $index }}" wire:key="select-weeks-{{ $index }}" id="" required>
                                            @foreach ($allWeek as $week)
                                                <option value="{{$week->id_week}}" {{ in_array($week->id_week, $topic['minggu_ke']) ? 'selected' : '' }}> {{$week->week}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('topics.'.$index.'.minggu_ke') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <select wire:model.live="topics.{{ $index }}.tipe">
                                        <option value="topik">Topik Mingguan</option>
                                        <option value="uts">Ujian Tengah Semester</option>
                                        <option value="uas">Ujian Akhir Semester</option>
                                    </select>
                                </td>
                                @if ($topics[$index]['tipe'] == 'topik')
                                    <td class="p-2 border" >
                                        <select wire:model="topics.{{ $index }}.id_sub_cpmk"  class="w-full" required>
                                            <option value="">--pilih Sub-CPMK--</option>
                                            @foreach ($assocSubCpmk as $scp )
                                                <option value="{{ $scp->id_sub_cpmk }}" >{{ $scp->nama_kode_sub_cpmk }}</option>
                                            @endforeach
                                        </select>
                                        @error('topics.'.$index.'.id_sub_cpmk') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </td>
                                    <td>
                                        <textarea wire:model="topics.{{$index}}.indikator" id="indikator" class="border w-full h-48" required></textarea>
                                        @error('topics.'.$index.'.indikator') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </td>
                                    <td>
                                        <div class="flex flex-col gap-y-3">
                                            <div>
                                                <div wire:ignore>
                                                    <label class="font-bold">Kriteria Penilaian:</label>
                                                    <select class="select2-kriteria-penilaian w-full" data-index="{{ $index }}" multiple="multiple" data-placeholder="Pilih Kriteria Penilaian" required>
                                                        @foreach ($allKriteria as $kriteria)
                                                            <option value="{{$kriteria->id_kriteria_penilaian}}" {{ in_array($kriteria->id_kriteria_penilaian, $topic['selected_kriteria']) ? 'selected' : '' }}>{{$kriteria->nama_kriteria_penilaian}}</option>   
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('topics.'.$index.'.selected_kriteria') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <label class="font-bold">Teknik Penilaian:</label>
                                                <select  wire:model.live="topics.{{ $index }}.teknik_penilaian_kategori" class="w-full" required>
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="test">Test</option>
                                                    <option value="non-test">Non Test</option>
                                                </select>
                                                @error('topics.'.$index.'.teknik_penilaian_kategori') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                <div >
                                                    <select class="select2-teknik-penilaian w-full" data-index="{{ $index }}" multiple="multiple" required>
                                                        @foreach ($teknikTersedia[$index] ?? [] as $teknik)
                                                            <option value="{{ $teknik->id_teknik_penilaian }}" {{ in_array($teknik->id_teknik_penilaian, $topic['selected_teknik']) ? 'selected' : '' }}>{{ $teknik->nama_teknik_penilaian }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('topics.'.$index.'.selected_teknik') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </td>                            
                                    <td>
                                        <textarea wire:model="topics.{{$index}}.metode_pembelajaran" id="metode_pembelajaran" class="border w-full  h-48" required></textarea>
                                        @error('topics.'.$index.'.metode_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </td> 
                                    <td>
                                        <textarea wire:model="topics.{{$index}}.materi_pembelajaran" id="materi_pembelajaran"  class="border w-full  h-48" required></textarea>
                                        @error('topics.'.$index.'.materi_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </td>                            
                                @else
                                    <td colspan="5">
                                        @if ($topics[$index]['tipe'] == 'uts')
                                            <p class="text-center">UJIAN TENGAH SEMESTER</p>
                                        @else
                                            <p class="text-center">UJIAN AKHIR SEMESTER</p>
                                        @endif
                                    </td>                           
                                @endif
                                <td>
                                    <input type="text" wire:model="topics.{{$index}}.bobot_penilaian" id="bobot_penilaian" class="border w-full" required ></input>
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
                @error('topics') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
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

            function initSelects() {
                // untuk minggu-ke
                $('.select2-weeks:not(.select2-hidden-accessible)').select2({
                    placeholder: "Pilih Minggu",
                    allowClear: true
                }).on('change', function () {
                    const index = $(this).data('index');
                    @this.set('topics.' + index + '.minggu_ke', $(this).val());
                });

                // untuk kriteria penilaian
                $('.select2-kriteria-penilaian:not(.select2-hidden-accessible)').select2({
                    placeholder: "Pilih Kriteria Penilaian",
                    allowClear: true
                }).on('change', function () {
                    const index = $(this).data('index');
                    @this.set('topics.' + index + '.selected_kriteria', $(this).val());
                });

                // untuk teknik penilaian
                $('.select2-teknik-penilaian:not(.select2-hidden-accessible)').select2({
                    placeholder: "Pilih Teknik Penilaian",
                    allowClear: true
                }).on('change', function () {
                    const index = $(this).data('index');
                    @this.set('topics.' + index + '.selected_teknik', $(this).val());
                });
            }

            // Panggil inisialisasi saat halaman pertama kali dimuat
            initSelects();

            // Event listener khusus untuk penambahan baris baru
            Livewire.hook('morph.updated', () => {
                initSelects();
            });

        });
    </script>