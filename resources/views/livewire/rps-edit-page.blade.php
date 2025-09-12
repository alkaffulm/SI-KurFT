<div class="py-8 px-16 sm:ml-64 mt-16 ">

    <div class="bg-white p-8">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Edit RPS </h2>
            <a href="/dosen/matkul" class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">Kembali</a>
        </div>
        <br>

        <form wire:submit.prevent="saveRps" >

                <h1 class="font-bold">RPS INDUK</h1>
                <br>
                <table>
                    <thead>
                        <tr class="border border-gray-300  align-top">
                            <td class="w-28 font-semibold px-2">Mata Kuliah</td>
                            <td class="border border-gray-300 px-2"> 
                                <p>{{ $rps->mataKuliah->nama_matkul_id }}</p> 
                                <p class="italic text-sm text-[#7397b6]">{{ $rps->mataKuliah->nama_matkul_en }}</p>
                            </td>
                        </tr>
                        <tr class="border border-gray-300 align-top">
                            <td class="font-semibold px-2">Bahan Kajian</td>
                            <td class="border px-2">
                                @forelse ($rps->mataKuliah->bahanKajian as $bk)
                                    <p>{{ $bk->nama_bk_id }} </p>
                                    <p class="italic text-sm text-[#7397b6]">{{ $bk->nama_bk_en }}</p>
                                @empty
                                    <p class="text-gray-500 mt-2">Belum ada BK yang terhubung dengan mata kuliah ini.</p>
                                @endforelse
                            </td>
                        </tr>
                        <tr class="border border-gray-300 ">
                            <td class="font-semibold px-2">Kode</td>
                            <td class="border border-gray-300 px-2">{{$rps->mataKuliah->kode_mk}}</td>
                        </tr>
                        <tr class="border border-gray-300 ">
                            <td class="font-semibold px-2" >Bobot</td>
                            <td class="border border-gray-300 px-2">SKS Teori {{$rps->mataKuliah->sks_teori}} | SKS Praktikum: {{$rps->mataKuliah->sks_praktikum}}</td>
                        </tr>
                        <tr class="border border-gray-300 ">
                            <td class="font-semibold px-2">Semester</td>
                            <td class="border border-gray-300 px-2">{{$rps->mataKuliah->semester}}</td>
                        </tr>
                        <tr class="border border-gray-300  align-top">
                            <td class="font-semibold px-2">Deskripsi</td>
                            <td class="border border-gray-300 px-2">
                                <p class="text-justify">{{$rps->mataKuliah->matkul_desc_id}}</p>
                                <p class="italic text-justify text-sm text-[#7397b6]">{{$rps->mataKuliah->matkul_desc_en}}</p>
                            </td>
                        </tr>
                    </thead>
                </table>
    
                <br>
                <div>
                    <h4 class="font-semibold mb-2">CPL Prodi yang dibebankan pada MK:</h4>
                    <table>
                        @forelse ($assocCpls as $cpl)
                            <tr class="border border-gray-300 ">
                                <td class="w-[90px] flex align-top px-2">
                                    <p class="font-semibold px-2">{{ $cpl->nama_kode_cpl }}</p>
                                </td>
                                <td class=" border border-gray-300 px-2">
                                    <p class="text-justify">{{ $cpl->desc_cpl_id }}</p>
                                    <p class="italic text-justify text-sm text-[#7397b6]">{{ $cpl->desc_cpl_en }}</p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td><p class="text-gray-500 mt-2">Belum ada CPL yang terhubung dengan mata kuliah ini.</p></td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <br>
            
                {{-- <div>
                    <h4>Bahan Kajian (BK):</h4>
                    <ul class="list-disc list-inside">
                        @forelse ($rps->mataKuliah->bahanKajian as $bk)
                            <li>{{ $bk->nama_bk_id }}</li>
                        @empty
                            <li class="text-gray-500 mt-2">Belum ada BK yang terhubung dengan mata kuliah ini.</li>
                        @endforelse
                    </ul>
                </div>
                <br> --}}
    
                <div>
                    <h4 class="font-semibold mb-2">CPMK untuk Mata Kuliah ini:</h4>
                    <table>
                        @forelse ($assocCpmk as $cpmk)
                            <tr class="border border-gray-300 ">
                                <td class="w-[90px] flex align-top ">
                                    <p class="font-semibold px-2">{{ $cpmk->nama_kode_cpmk }} </p>
                                </td>
                                <td class="border border-gray-300 px-2">
                                    <p class="text-justify">{{ $cpmk->desc_cpmk_id }}</p>
                                    <p class="italic text-justify text-sm text-[#7397b6]">{{ $cpmk->desc_cpmk_en }}</p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td><p class="text-gray-500 mt-2">Belum ada CPMK yang terhubung dengan mata kuliah ini.</p></td>
                            </tr>
                            @endforelse
                    </table>
                </div>
                <br>
    
                <div>
                    <label for="id_mk_syarat" class="font-semibold">Mata Kuliah Prasyarat:</label><br>
                    <select class="p-2 border rounded-lg border-gray-300 bg-gray-100 mt-2" wire:model="id_mk_syarat" >
                        <option value="">Tidak ada Matkul Prasyarat</option>
                        @foreach ($allMataKuliah as $mk)
                            <option value="{{ $mk->id_mk }}" >{{ $mk->nama_matkul_id }}</option>
                        @endforeach
                    </select>  
                    @error('id_mk_syarat') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror                           
                </div>
    
                <br>
                <div>
                    <label for="materi_pembelajaran" class="font-semibold">Materi Pembelajaran:</label><br>
                    <textarea wire:model="materi_pembelajaran"  class="p-2 border rounded-lg border-gray-300 w-full h-48 bg-gray-100 mt-2"></textarea>
                    @error('materi_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
                </div>
    
                <br>
                
                <div>
                    <label for="pustaka_utama" class="font-semibold">Pustaka Utama:</label><br>
                    <textarea wire:model="pustaka_utama"  class="p-2 border rounded-lg border-gray-300 w-full h-48 bg-gray-100 mt-2"></textarea>
                    @error('pustaka_utama') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
                </div>
    
                <br>
    
                <div>
                    <label for="pustaka_pendukung" class="font-semibold">Pustaka pendukung:</label><br>
                    <textarea wire:model="pustaka_pendukung"  class="p-2 border rounded-lg border-gray-300 w-full h-48 bg-gray-100 mt-2"></textarea>
                    @error('pustaka_pendukung') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror                         
                </div>
                <br>
                    <div>
                    <label for="media_perangkat_lunak" class="font-semibold ">Media Pembelajaran (Perangkat Lunak):</label><br>
                    <select name="" id="media_perangkat_lunak" class="border p-2 rounded-lg border-gray-300 bg-gray-100">
                        <option value="">E-learning ULM</option>
                    </select>
                </div>

                <br>

                <div>
                    <label for="media_perangkat_keras" class="font-semibold ">Media Pembelajaran (Perangkat Keras):</label><br>
                    <select name="" id="media_perangkat_keras" class="border p-2 rounded-lg border-gray-300 bg-gray-100">
                        <option value="">Komputer</option>
                    </select>
                </div>
                <br>

                <h1 class="font-bold">RPS DETAIL</h1>

                <br>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border table-fixed">
                        <thead>
                            <tr>
                                <th class="p-2 border border-black w-[150px]" rowspan="2">Minggu Ke-</th>
                                <th class="p-2 border border-black w-[180px]" rowspan="2">Jenis</th>
                                <th class="p-2 border border-black w-[150px]" rowspan="2">Sub-CPMK</th>
                                <th class="p-2 border border-black w-[400px]" colspan="2">Penilaian</th>
                                <th class="p-2 border border-black w-[300px]" rowspan="2">Pokok Bahasan</th>
                                <th class="p-2 border border-black w-[180px]" rowspan="2">Model Pembelajaran</th>
                                <th class="p-2 border border-black w-[600px]" colspan="2">Bentuk Pembelajaran</th>
                                <th class="p-2 border border-black w-[120px]" rowspan="2">Refrensi</th>
                                <th class="p-2 border border-black w-[90px]" rowspan="2">Aksi</th>                        
                            </tr>
                            <tr>
                                <th class="p-2 border border-black w-[300px]">Indikator</th>
                                <th class="p-2 border border-black w-[300px]">Kritera & Teknik</th>
                                <th class="p-2 border border-black w-[300px]">Synchronous</th>
                                <th class="p-2 border border-black w-[300px]">Asynchronous</th>
                            </tr>
                        </thead>
                        <tbody >
                            @forelse ($topics as $index => $topic )
                            <tr wire:key="topic-{{ $index }}" class="border border-black">
                                    @error('topics.'.$index.'.id_topic') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror          
                                    {{-- minggu ke --}}
                                    <td class="p-2 border border-black align-top">
                                        <div wire:ignore>
                                            <select class="select2-weeks w-full " multiple="multiple" data-index="{{ $index }}" wire:key="select-weeks-{{ $index }}" id="" required>
                                                @foreach ($allWeek as $week)
                                                    <option value="{{$week->id_week}}" {{ in_array($week->id_week, $topic['minggu_ke']) ? 'selected' : '' }}> {{$week->week}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('topics.'.$index.'.minggu_ke') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </td>
    
                                    {{-- jenis --}}
                                    <td class="p-2 border border-black align-top">
                                        <select wire:model.live="topics.{{ $index }}.tipe" class="border bg-gray-100 py-2 rounded-md">
                                            <option value="topik">Topik Mingguan</option>
                                            <option value="uts">Ujian Tengah Semester</option>
                                            <option value="uas">Ujian Akhir Semester</option>
                                        </select>
                                    </td>
                                    @if ($topics[$index]['tipe'] == 'topik')
    
                                        {{-- subCpmk --}}
                                        <td class="p-2 border border-black align-top" >
                                            <select wire:model="topics.{{ $index }}.id_sub_cpmk"  class="w-full border bg-gray-100 py-2 rounded-md" required>
                                                <option value="">--pilih Sub-CPMK--</option>
                                                @foreach ($assocSubCpmk as $scp )
                                                    <option value="{{ $scp->id_sub_cpmk }}" >{{ $scp->nama_kode_sub_cpmk }}</option>
                                                @endforeach
                                            </select>
                                            @error('topics.'.$index.'.id_sub_cpmk') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </td>
    
                                        {{-- indikator --}}
                                        <td class="p-2 border border-black align-top">
                                            <textarea wire:model="topics.{{$index}}.indikator" id="indikator" class="border w-full bg-gray-100 h-[500px] px-2 rounded-md" required></textarea>
                                            @error('topics.'.$index.'.indikator') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </td>
                                        
                                        {{-- kriteria dan teknik penilaian --}}
                                        <td class="p-2 border border-black align-top">
                                            <div class="flex flex-col gap-y-3">
                                                <div>
                                                    <div wire:ignore>
                                                        <label class="font-bold">Kriteria Penilaian:</label>
                                                        <select class="select2-kriteria-penilaian w-full " data-index="{{ $index }}" multiple="multiple" data-placeholder="Pilih Kriteria Penilaian" required>
                                                            @foreach ($allKriteria as $kriteria)
                                                            <option value="{{$kriteria->id_kriteria_penilaian}}" {{ in_array($kriteria->id_kriteria_penilaian, $topic['selected_kriteria']) ? 'selected' : '' }}>{{$kriteria->nama_kriteria_penilaian}}</option>   
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('topics.'.$index.'.selected_kriteria') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="flex flex-col gap-y-1">
                                                    <label class="font-bold">Teknik Penilaian:</label>
                                                    <select  wire:model.live="topics.{{ $index }}.teknik_penilaian_kategori" class="w-full bg-gray-100 py-2 border rounded-md" required>
                                                        <option value="">Pilih Kategori</option>
                                                        <option value="test">Test</option>
                                                        <option value="non-test">Non Test</option>
                                                    </select>
                                                    @error('topics.'.$index.'.teknik_penilaian_kategori') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                    <br>
                                                    <div>
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

                                        {{-- materi pembelajaran --}}
                                        <td class="p-2 border border-black align-top">
                                            <textarea wire:model="topics.{{$index}}.materi_pembelajaran" id="materi_pembelajaran"  class="border w-full h-[500px] bg-gray-100 px-2 rounded-md" required></textarea>
                                            @error('topics.'.$index.'.materi_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </td>    
                                        
                                        {{-- Model pembelajaran --}}
                                        <td class="p-2 border border-black align-top">
                                            <select name="" id="" class="w-full border bg-gray-100 py-2 rounded-md">
                                                <option value="">Case Based Learning</option>
                                                <option value="">Project Based Learning</option>
                                            </select>
                                            @error('topics.'.$index.'.materi_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </td>  
                                        
                                        {{-- metode: luring  --}}
                                        <td class="p-2 border border-black align-top">
                                            {{-- <textarea wire:model="topics.{{$index}}.metode_pembelajaran" id="metode_pembelajaran" class="border w-full  h-48" required></textarea>
                                            @error('topics.'.$index.'.metode_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror --}}
                                            <div >
                                                <p class="font-bold">TM</p>
                                                <div>
                                                    <div wire:ignore>
                                                        <label >Metode Pembelajaran</label>
                                                        <select class="select2-metode-pembelajaran w-full" data-index="{{$index}}" data-tipe="TM" multiple="multiple" >
                                                            @foreach ($allMetodePembelajaran as $metode)
                                                                <option value="{{$metode->id_metode_pembelajaran}}" {{in_array($metode->id_metode_pembelajaran, $topic['aktivitas_pembelajaran']['TM']['selected_metode_pembelajaran']) ? 'selected' : ''}}>{{$metode->nama_metode_pembelajaran}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('topics.'.$index.'.aktivitas_pembelajaran.TM.selected_metode_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                                <br>
                                                <div>
                                                    <label>Penugasan Mahasiswa</label>
                                                    <textarea wire:model="topics.{{$index}}.aktivitas_pembelajaran.TM.penugasan_mahasiswa"  class="w-full h-24 border border-gray-300 bg-gray-100 px-2 rounded-md" ></textarea>
                                                    @error('topics.'.$index.'.aktivitas_pembelajaran.TM.penugasan_mahasiswa') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror                                            
                                                </div>
                                            </div>
                                        </td>
                                        
                                        {{-- metode: daring --}}
                                        <td class="p-2 border border-black align-top">
                                            {{-- <div>
                                                <p class="font-bold">PT</p>
                                                <div>
                                                    <p>Bentuk Pembelajaran</p>
                                                    <p>Penugasan Terstruktur</p>
                                                </div>
                                                <br>
                                                <div>
                                                    <div wire:ignore>
                                                        <label >Metode Pembelajaran</label>
                                                        <select  class="select2-metode-pembelajaran w-full" data-index="{{$index}}" data-tipe="PT" multiple="multiple" >
                                                            @foreach ($allMetodePembelajaran as $metode)
                                                                <option value="{{$metode->id_metode_pembelajaran}}" {{in_array($metode->id_metode_pembelajaran, $topic['aktivitas_pembelajaran']['PT']['selected_metode_pembelajaran']) ? 'selected' : ''}} >{{$metode->nama_metode_pembelajaran}}</option>                                                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('topics.'.$index.'.aktivitas_pembelajaran.PT.selected_metode_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                                <br>
                                                <div>
                                                    <label >Penugasan Mahasiswa</label>
                                                    <textarea wire:model="topics.{{$index}}.aktivitas_pembelajaran.PT.penugasan_mahasiswa" class="w-full h-24 border border-gray-300 bg-gray-100 px-2 rounded-md" ></textarea>
                                                    @error('topics.'.$index.'.aktivitas_pembelajaran.PT.penugasan_mahasiswa') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div> --}}
                                            <div>
                                                <p class="font-bold">BM</p>
                                                <div >
                                                    <div wire:ignore>
                                                        <label >Metode Pembelajaran</label>
                                                        <select class="select2-metode-pembelajaran w-full" data-index="{{$index}}" data-tipe="BM" multiple="multiple" >
                                                            @foreach ($allMetodePembelajaran as $metode)
                                                                <option value="{{$metode->id_metode_pembelajaran}}" {{in_array($metode->id_metode_pembelajaran, $topic['aktivitas_pembelajaran']['BM']['selected_metode_pembelajaran']) ? 'selected' : ''}}>{{$metode->nama_metode_pembelajaran}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('topics.'.$index.'.aktivitas_pembelajaran.BM.selected_metode_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="penugasan_mahasiswa">Penugasan Mahasiswa</label>
                                                    <textarea wire:model="topics.{{$index}}.aktivitas_pembelajaran.BM.penugasan_mahasiswa" id="penugasan_mahasiswa" class="w-full h-24 border border-gray-300 bg-gray-100 px-2 rounded-md" ></textarea>
                                                    @error('topics.'.$index.'.aktivitas_pembelajaran.BM.penugasan_mahasiswa') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </td>
    
                                        @else
                                        <td colspan="6" class="p-2 border border-black">
                                            @if ($topics[$index]['tipe'] == 'uts')
                                                <p class="text-center">UJIAN TENGAH SEMESTER</p>
                                            @else
                                                <p class="text-center">UJIAN AKHIR SEMESTER</p>
                                            @endif
                                        </td>                           
                                        @endif
    
                                        {{-- bobot penilaian --}}
                                        <td class="p-2 border border-black align-top">
                                            <input type="text" wire:model="topics.{{$index}}.bobot_penilaian" id="bobot_penilaian" class="border w-full bg-gray-100 px-2" required ></input>
                                            @error('topics.'.$index.'.bobot_penilaian') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                        </td>
                                    <td class="p-2 border border-black">
                                        <button type="button" wire:click="removeRow({{ $index }})" class="text-red-600 hover:text-red-800 font-bold">
                                            Hapus
                                        </button>                                
                                    </td>
                                </tr>
                            @empty
                                <tr >
                                    <td colspan="10" class="text-center p-4 text-gray-500 border border-black">Belum ada topik. Silakan tambah baris baru.</td>                     
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @error('topics') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
                </div>
    
                <div class="mt-4 flex justify-between">
                    <button type="button" wire:click="addRow" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Baris</button>
                    <button type="submit" class="text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">Simpan Rencana Mingguan</button>
                </div>         
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

                // untuk metode pembelajaran
                $('.select2-metode-pembelajaran:not(.select2-hidden-accessible)').select2({
                    placeholder: "Pilih Metode Pembelajaran",
                    allowClear: true
                }).on('change', function () {
                    const index = $(this).data('index');
                    const tipe = $(this).data('tipe');
                    @this.set('topics.' + index + '.aktivitas_pembelajaran.' + tipe + '.selected_metode_pembelajaran', $(this).val());
                })                
            }

            // Panggil inisialisasi saat halaman pertama kali dimuat
            initSelects();

            // Event listener khusus untuk penambahan baris baru
            Livewire.hook('morph.updated', () => {
                initSelects();
            });

        });
    </script>