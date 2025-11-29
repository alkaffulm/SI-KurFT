<div class="py-8 px-16 sm:ml-64 mt-16 ">
    <div class="flex justify-between items-center  mb-4">
        <h2 class="text-2xl font-bold">Edit RPS </h2>
        <a href="/dosen/matkul" class="px-6 py-3 text-base font-medium text-gray-700  border border-gray-300 rounded-lg hover:bg-gray-100">Kembali</a>
    </div>
    <form wire:submit.prevent="saveRps">
        
        <div class="bg-white p-8 rounded-lg">
            <h1 class="text-xl font-bold mb-4 text-biru-custom">Informasi Mata Kuliah</h1>
            <div class="grid grid-cols-3  ">
                <div class="grid-span-1">
                    <p class="font-semibold">Mata Kuliah</p>
                    <div>
                        <p>{{ $rps->mataKuliah->nama_matkul_id }}</p> 
                        <p class="italic text-sm text-biru-custom">{{ $rps->mataKuliah->nama_matkul_en }}</p>
                    </div>
                </div>
                <div class="grid-span-1">
                    <p class="font-semibold">Bahan Kajian</p>
                    <div>
                        @forelse ($rps->mataKuliah->bahanKajian as $bk)
                            <p>{{ $bk->nama_bk_id }} </p>
                            <p class="italic text-sm text-biru-custom">{{ $bk->nama_bk_en }}</p>
                        @empty
                            <p class="text-gray-500 mt-2">Belum ada BK yang terhubung dengan mata kuliah ini.</p>
                        @endforelse
                    </div>
                </div>
                <div class="grid-span-1">
                    <p class="font-semibold">Kode</p>
                    <p>{{$rps->mataKuliah->kode_mk}}</p>
                </div>
            </div>
            <br>
            <div class="grid grid-cols-3">
                <div>
                    <p class="font-semibold">SKS Teori</p>
                    <p>{{$rps->mataKuliah->sks_teori}}</p>
                </div>
                <div>
                    <p class="font-semibold">SKS Praktikum</p>
                    <p>{{$rps->mataKuliah->sks_praktikum}}</p>
                </div>
                <div>
                    <p class="font-semibold">Semester</p>
                    <p>{{$rps->mataKuliah->semester}}</p>
                </div>
            </div>
            <br>
            <div>
                <p class="font-semibold mb-2">Deskripsi</p>
                <div>
                    <p class="text-justify">{{$rps->mataKuliah->matkul_desc_id}}</p>
                    <p class="italic text-justify text-sm text-biru-custom">{{$rps->mataKuliah->matkul_desc_en}}</p>
                </div>
            </div>
            <br>
            <div>
                {{-- CPL yang terkait --}}
                <h4 class="font-semibold mb-2">CPL Prodi yang dibebankan pada MK:</h4>
                <table>
                    @forelse ($assocCpls as $cpl)
                        <tr class="border border-gray-300 ">
                            <td class="w-[90px] flex align-top px-2">
                                <p class="font-semibold px-2">{{ $cpl->nama_kode_cpl }}</p>
                            </td>
                            <td class=" border border-gray-300 px-2 w-full">
                                <p class="text-justify">{{ $cpl->desc_cpl_id }}</p>
                                <p class="italic text-justify text-sm text-biru-custom">{{ $cpl->desc_cpl_en }}</p>
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
            <div>
                {{-- CPMK yang terkait --}}
                <h4 class="font-semibold mb-2">CPMK untuk Mata Kuliah ini:</h4>
                <table>
                    @forelse ($assocCpmk as $cpmk)
                        <tr class="border border-gray-300 ">
                            <td class="w-[90px] flex align-top ">
                                <p class="font-semibold px-2">{{ $cpmk->nama_kode_cpmk ?? 'CPL Tidak Memliki CPMK'}} </p>
                            </td>
                            <td class="border border-gray-300 px-2 w-full">
                                <p class="text-justify">{{ $cpmk->desc_cpmk_id ?? 'CPL Tidak Memliki CPMK'}}</p>
                                <p class="italic text-justify text-sm text-biru-custom">{{ $cpmk->desc_cpmk_en ?? 'CPL Tidak Memliki CPMK'}}</p>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td><p class="text-gray-500 mt-2">Belum ada CPMK yang terhubung dengan mata kuliah ini.</p></td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
        <br>
        <div class="bg-white p-8 rounded-lg">
            <h1 class="text-xl font-bold mb-4 text-biru-custom">Informasi RPS</h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    {{-- Mata Kuliah Syarat --}}
    <div class="flex-1">
        <label for="id_mk_syarat" class="font-semibold block mb-2">Mata Kuliah Prasyarat:</label>
        <select class="p-2 border rounded-lg border-gray-300 bg-gray-100 w-full"
                wire:model="id_mk_syarat">
            <option value="">Tidak ada Matkul Prasyarat</option>
            @foreach ($allMataKuliah as $mk)
                <option value="{{ $mk->id_mk }}">{{ $mk->nama_matkul_id }}</option>
            @endforeach
        </select>
        @error('id_mk_syarat') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
    </div>

    {{-- Model Pembelajaran --}}
    <div class="flex-1">
        <label for="id_model_pembelajaran" class="font-semibold block mb-2">Model Pembelajaran:</label>
        <select class="border p-2 rounded-lg border-gray-300 bg-gray-100 w-full"
                wire:model="id_model_pembelajaran">
            <option value="">Pilih Model Pembelajaran</option>
            @foreach ($allModelPembelajaran as $mp)
                <option value="{{ $mp->id_model_pembelajaran }}">{{ $mp->nama_model_pembelajaran }}</option>
            @endforeach
        </select>
        @error('id_model_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
    </div>

    {{-- Media Perangkat Lunak --}}
    <div class="flex-1" wire:ignore>
        <label for="media_perangkat_lunak" class="font-semibold block mb-2">Media Pembelajaran (Perangkat Lunak):</label>
        <select id="media_perangkat_lunak"
                class="select2-perangkat-lunak p-2 border rounded-lg border-gray-300 bg-gray-100 w-full"
                multiple="multiple">
            @foreach ($allMediaPerangkatLunak as $mpl)
                <option value="{{ $mpl->id_media_pembelajaran }}"
                    {{ in_array($mpl->id_media_pembelajaran, $media_pembelajaran) ? 'selected' : '' }}>
                    {{ $mpl->nama_media_pembelajaran }}
                </option>
            @endforeach
        </select>
        @error('media_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
    </div>

    {{-- Media Perangkat Keras --}}
    <div class="flex-1" wire:ignore>
        <label for="media_perangkat_keras" class="font-semibold block mb-2">Media Pembelajaran (Perangkat Keras):</label>
        <select id="media_perangkat_keras"
                class="select2-perangkat-keras p-2 border rounded-lg border-gray-300 bg-gray-100 w-full"
                multiple="multiple">
            @foreach ($allMediaPerangkatKeras as $mpk)
                <option value="{{ $mpk->id_media_pembelajaran }}"
                    {{ in_array($mpk->id_media_pembelajaran, $media_pembelajaran) ? 'selected' : '' }}>
                    {{ $mpk->nama_media_pembelajaran }}
                </option>
            @endforeach
        </select>
        @error('media_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
    </div>

</div>

            <br>
            <div>
                {{-- Materi Pembelakaran --}}
                <label for="materi_pembelajaran" class="font-semibold">Materi Pembelajaran:</label><br>
                <textarea wire:model="materi_pembelajaran"  class="p-2 border rounded-lg border-gray-300 w-full h-48 bg-gray-100 mt-2"></textarea>
                @error('materi_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
            </div>
            <br>
            <div>
                {{-- Pustaka Utama --}}
                <label for="pustaka_utama" class="font-semibold">Pustaka Utama:</label><br>
                <textarea wire:model="pustaka_utama"  class="p-2 border rounded-lg border-gray-300 w-full h-48 bg-gray-100 mt-2"></textarea>
                @error('pustaka_utama') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
            </div>    
            <br>    
            <div>
                {{-- Pustaka Pendukung --}}
                <label for="pustaka_pendukung" class="font-semibold">Pustaka pendukung:</label><br>
                <textarea wire:model="pustaka_pendukung"  class="p-2 border rounded-lg border-gray-300 w-full h-48 bg-gray-100 mt-2"></textarea>
                @error('pustaka_pendukung') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror                         
            </div>
            <br>
            <br>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-black table-fixed">
                    <thead class="   bg-gray-300">
                        <tr>
                            <th class="p-2 border border-black w-[150px]" rowspan="2">Minggu Ke-</th>
                            <th class="p-2 border border-black w-[180px]" rowspan="2">Jenis</th>
                            <th class="p-2 border border-black w-[150px]" rowspan="2">Sub-CPMK</th>
                            <th class="p-2 border border-black w-[600px]" colspan="2">Penilaian</th>
                            <th class="p-2 border border-black w-[300px]" rowspan="2">Materi Pembelajaran</th>
                            <th class="p-2 border border-black w-[600px]" colspan="2">Bentuk Pembelajaran</th>
                            <th class="p-2 border border-black w-[120px]" rowspan="2">Refrensi</th>
                            <th class="p-2 border border-black w-[90px]" rowspan="2">Aksi</th>                        
                        </tr>
                        <tr class="bg-[#f7cbac]">
                            <th class="p-2 border border-black w-[300px]">Indikator</th>
                            <th class="p-2 border border-black w-[300px]">Kritera & Teknik</th>
                            <th class="p-2 border border-black w-[300px]">Synchronous</th>
                            <th class="p-2 border border-black w-[300px]">Asynchronous</th>
                        </tr>
                    </thead>
                    <tbody >
                        @forelse ($topics as $index => $topic )
                            <tr wire:key="topic-{{ $index }}"  class="border border-black">
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
                                                <option value="{{ $scp->id_sub_cpmk ?? 0 }}" >{{ $scp->nama_kode_sub_cpmk ?? 0}}</option>
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
                                    
                                    {{-- metode: luring  --}}
                                    <td class="p-2 border border-black align-top">
                                        <div >
                                            <div>
                                                <p class="font-bold">TM</p>
                                                <div wire:ignore>
                                                    <label >Metode Pembelajaran</label>
                                                    <select class="select2-metode-pembelajaran w-full" data-index="{{$index}}" data-tipe="TM" multiple="multiple"  >
                                                        @foreach ($allMetodePembelajaran as $metode)
                                                            <option value="{{$metode->id_metode_pembelajaran}}" {{in_array($metode->id_metode_pembelajaran, $topic['aktivitas_pembelajaran']['TM']['selected_metode_pembelajaran']) ? 'selected' : ''}}>{{$metode->nama_metode_pembelajaran}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('topics.'.$index.'.aktivitas_pembelajaran.TM.selected_metode_pembelajaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>

                                            <div>
                                                <p class="font-bold">Jumlah Pertemuan dan SKS</p>
                                                <div class="flex gap-x-2 items-center">
                                                    <select wire:model="topics.{{ $index }}.aktivitas_pembelajaran.TM.jumlah_pertemuan" class=" flex-1 border bg-gray-100 py-2 rounded-md">
                                                        <option value="">-</option>
                                                        @foreach($allJumlahPertemuan as $value => $label)
                                                            <option value="{{ $value }}" >{{ $label }}</option>
                                                        @endforeach
                                                    </select>    
                                                    <span>x</span>  
                                                    <select wire:model="topics.{{ $index }}.aktivitas_pembelajaran.TM.jumlah_sks" class="flex-1 border bg-gray-100 py-2 rounded-md">
                                                        <option value="">-</option>                                                        
                                                        @foreach($allJumlahSks as $value => $label)
                                                            <option value="{{ $value }}" >{{ $label }}</option>
                                                        @endforeach
                                                    </select>                                                             
                                                </div>
                                                @error('topics.'.$index.'.aktivitas_pembelajaran.TM.jumlah_pertemuan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror <br>
                                                @error('topics.'.$index.'.aktivitas_pembelajaran.TM.jumlah_sks') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>    
                                        </div>
                                    </td>
                                    
                                    {{-- metode: daring --}}
                                    <td class="p-2 border border-black align-top">
                                        {{-- BM --}}
                                        <div>
                                            <div >
                                                <p class="font-bold">BM</p>
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
                                            <div>
                                                <p class="font-bold">Jumlah Pertemuan dan SKS</p>
                                                <div class="flex gap-x-2 items-center">
                                                    <select wire:model="topics.{{ $index }}.aktivitas_pembelajaran.BM.jumlah_pertemuan" class=" flex-1 border bg-gray-100 py-2 rounded-md">
                                                        <option value="">-</option>
                                                        @foreach($allJumlahPertemuan as $value => $label)
                                                            <option value="{{ $value }}" >{{ $label }}</option>
                                                        @endforeach
                                                    </select>    
                                                    <span>x</span>  
                                                    <select wire:model="topics.{{ $index }}.aktivitas_pembelajaran.BM.jumlah_sks" class="flex-1 border bg-gray-100 py-2 rounded-md">
                                                        <option value="">-</option>                                                        
                                                        @foreach($allJumlahSks as $value => $label)
                                                            <option value="{{ $value }}" >{{ $label }}</option>
                                                        @endforeach
                                                    </select>                                                             
                                                </div> 
                                                @error('topics.'.$index.'.aktivitas_pembelajaran.BM.jumlah_pertemuan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror <br>
                                                @error('topics.'.$index.'.aktivitas_pembelajaran.BM.jumlah_sks') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror                                                         
                                            </div>
                                        </div>
                                        <br>
                                        {{-- BT --}}
                                        <div>
                                            <div>
                                                <p class="font-bold">BT</p>
                                                <div>
                                                    <label for="penugasan_mahasiswa">Bentuk Penugasan</label>
                                                    {{-- <textarea wire:model="topics.{{$index}}.aktivitas_pembelajaran.PT.penugasan_mahasiswa" id="penugasan_mahasiswa" class="w-full h-24 border border-gray-300 bg-gray-100 px-2 rounded-md" ></textarea> --}}
                                                    <select class="select2-bentuk-penugasan w-full" data-index="{{$index}}" data-tipe="BT" multiple="multiple" >
                                                        @foreach ($allBentukPenugasan as $bp)
                                                            <option value="{{$bp->id_bentuk_penugasan}}" {{in_array($bp->id_bentuk_penugasan, $topic['aktivitas_pembelajaran']['BT']['selected_bentuk_penugasan']) ? 'selected' : ''}}>{{$bp->nama_bentuk_penugasan}}</option>
                                                        @endforeach
                                                    </select>                                                    
                                                </div>
                                                @error('topics.'.$index.'.aktivitas_pembelajaran.BT.selected_bentuk_penugasan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            <div>
                                                <p class="font-bold">Jumlah Pertemuan dan SKS</p>
                                                <div class="flex gap-x-2 items-center">
                                                    <select wire:model="topics.{{ $index }}.aktivitas_pembelajaran.BT.jumlah_pertemuan" class=" flex-1 border bg-gray-100 py-2 rounded-md">
                                                        <option value="">-</option>
                                                        @foreach($allJumlahPertemuan as $value => $label)
                                                            <option value="{{ $value }}" >{{ $label }}</option>
                                                        @endforeach
                                                    </select>    
                                                    <span>x</span>  
                                                    <select wire:model="topics.{{ $index }}.aktivitas_pembelajaran.BT.jumlah_sks" class="flex-1 border bg-gray-100 py-2 rounded-md">
                                                        <option value="">-</option>                                                        
                                                        @foreach($allJumlahSks as $value => $label)
                                                            <option value="{{ $value }}" >{{ $label }}</option>
                                                        @endforeach
                                                    </select>                                                             
                                                </div>   
                                                @error('topics.'.$index.'.aktivitas_pembelajaran.BT.jumlah_pertemuan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror <br>
                                                @error('topics.'.$index.'.aktivitas_pembelajaran.BT.jumlah_sks') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror                                                          
                                            </div>                                            
                                        </div>       
                                    </td>
                                    
                                    {{-- refrensi --}}
                                    <td class="p-2 border border-black align-top">
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9,]/g, '')" wire:model="topics.{{$index}}.refrensi" id="refrensi" class="p-2 border rounded-lg border-gray-300 w-full  bg-gray-100 mt-2" required ></input>
                                        @error('topics.'.$index.'.refrensi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </td>

                                @else
                                    <td colspan="7" class="p-2 border border-black">
                                        @if ($topics[$index]['tipe'] == 'uts')
                                            <p class="text-center">UJIAN TENGAH SEMESTER</p>
                                        @else
                                            <p class="text-center">UJIAN AKHIR SEMESTER</p>
                                        @endif
                                    </td>                           
                                @endif

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
    document.addEventListener('livewire:init', () => {

        // Fungsi untuk menginisialisasi semua Select2 yang ada di dalam tabel dinamis
        const initDynamicSelects = () => {
            $('.select2-weeks:not(.select2-hidden-accessible)').select2({
                placeholder: "Pilih Minggu",
                allowClear: true
            }).on('change', function () {
                @this.set('topics.' + $(this).data('index') + '.minggu_ke', $(this).val());
            });

            $('.select2-kriteria-penilaian:not(.select2-hidden-accessible)').select2({
                placeholder: "Pilih Kriteria Penilaian",
                allowClear: true
            }).on('change', function () {
                @this.set('topics.' + $(this).data('index') + '.selected_kriteria', $(this).val());
            });

            $('.select2-teknik-penilaian:not(.select2-hidden-accessible)').select2({
                placeholder: "Pilih Teknik Penilaian",
                allowClear: true
            }).on('change', function () {
                @this.set('topics.' + $(this).data('index') + '.selected_teknik', $(this).val());
            });

            $('.select2-metode-pembelajaran:not(.select2-hidden-accessible)').select2({
                placeholder: "Pilih Metode Pembelajaran",
                allowClear: true
            }).on('change', function () {
                const index = $(this).data('index');
                const tipe = $(this).data('tipe');
                @this.set('topics.' + index + '.aktivitas_pembelajaran.' + tipe + '.selected_metode_pembelajaran', $(this).val());
            });

            $('.select2-bentuk-penugasan:not(.select2-hidden-accessible)').select2({
                placeholder: "Pilih Bentuk Penugasan",
                allowClear: true
            }).on('change', function () {
                const index = $(this).data('index');
                const tipe = $(this).data('tipe');
                @this.set('topics.' + index + '.aktivitas_pembelajaran.' + tipe + '.selected_bentuk_penugasan', $(this).val());
            });
        };

        // Fungsi khusus untuk inisialisasi dan sinkronisasi Select2 media pembelajaran
        const initMediaPembelajaranSelects = () => {
            const syncMediaValues = () => {
                const softwareValues = $('#media_perangkat_lunak').val() || [];
                const hardwareValues = $('#media_perangkat_keras').val() || [];
                const combinedValues = [...softwareValues, ...hardwareValues];

                // Untuk Debugging: Cek nilai di console browser
                console.log('Syncing Media Pembelajaran:', combinedValues);

                @this.set('media_pembelajaran', combinedValues);
            };

            $('#media_perangkat_lunak').select2({
                placeholder: "Pilih Perangkat Lunak",
                allowClear: true,
                dropdownAutoWidth: true,
                width: '100%',
            }).on('change', syncMediaValues);

            $('#media_perangkat_keras').select2({
                placeholder: "Pilih Perangkat Keras",
                allowClear: true,
                dropdownAutoWidth: true,
                width: '100%',
            }).on('change', syncMediaValues);

            // Panggil sync sekali untuk mengirim nilai awal
            setTimeout(() => {
                syncMediaValues();
            }, 1);
        };

        // --- EKSEKUSI SCRIPT ---

        // Panggil kedua fungsi inisialisasi saat halaman pertama kali dimuat
        initDynamicSelects();
        initMediaPembelajaranSelects();

        // Atur listener agar Select2 dinamis diinisialisasi ulang
        // setiap kali Livewire menambahkan/menghapus baris
        Livewire.hook('morph.updated', () => {
            initDynamicSelects();
        });
    });
</script>