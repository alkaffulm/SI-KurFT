<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Kajian (BK)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    {{-- Select2 CSS and JS for searchable dropdowns --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="">

    @include('layouts.navbar')
    @include('layouts.sidebar')
    
    <div class="py-8 px-16 sm:ml-64 mt-16 bg-gray-100">
        <div class="bg-white p-8">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Membuat RPS</h2>
                <a href="/dosen/matkul" class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">Kembali</a>
            </div>
            
            <form action="{{ route('rps.store') }}" method="post">
                @csrf
    
                <input type="hidden" name="id_mk" value="{{ $mata_kuliah->id_mk }}">   
                <br>
                <h1 class="font-bold">RPS INDUK</h1>
                <br>
                <table>
                    <thead>
                        <tr class="border border-gray-300 px-2 align-top">
                            <td class="w-28 font-semibold">Mata Kuliah</td>
                            <td class="border border-gray-300 px-2"> 
                                <p>{{ $mata_kuliah->nama_matkul_id }}</p> 
                                <p class="italic text-sm text-[#7397b6]">{{ $mata_kuliah->nama_matkul_en }}</p>
                            </td>
                        </tr>
                        <tr class="border border-gray-300 px-2 align-top">
                            <td class="font-semibold">Bahan Kajian</td>
                            <td class="border px-2">
                                @forelse ($mata_kuliah->bahanKajian as $bk)
                                    <p>{{ $bk->nama_bk_id }} </p>
                                    <p class="italic text-sm text-[#7397b6]">{{ $bk->nama_bk_en }}</p>
                                @empty
                                    <p class="text-gray-500 mt-2">Belum ada BK yang terhubung dengan mata kuliah ini.</p>
                                @endforelse
                            </td>
                        </tr>
                        <tr class="border border-gray-300 px-2">
                            <td class="font-semibold">Kode</td>
                            <td class="border border-gray-300 px-2">{{$mata_kuliah->kode_mk}}</td>
                        </tr>
                        <tr class="border border-gray-300 px-2">
                            <td class="font-semibold" >Bobot</td>
                            <td class="border border-gray-300 px-2">SKS Teori {{$mata_kuliah->sks_teori}} | SKS Praktikum: {{$mata_kuliah->sks_praktikum}}</td>
                        </tr>
                        <tr class="border border-gray-300 px-2">
                            <td class="font-semibold">Semester</td>
                            <td class="border border-gray-300 px-2">{{$mata_kuliah->semester}}</td>
                        </tr>
                        <tr class="border border-gray-300 px-2 align-top">
                            <td class="font-semibold">Deskripsi</td>
                            <td class="border border-gray-300 px-2">
                                <p class="text-justify">{{$mata_kuliah->matkul_desc_id}}</p>
                                <p class="italic text-justify text-sm text-[#7397b6]">{{$mata_kuliah->matkul_desc_en}}</p>
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
                                <td class="w-[90px] flex align-top">
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
                        @forelse ($mata_kuliah->bahanKajian as $bk)
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
                                <td class="w-[90px] flex align-top">
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
    
    
                {{-- <br>
                <div>
                    <label for="id_bk">Bahan Kajian:</label><br>
                    <select name="id_bk" required>
                        <option value="">-- Pilih Bahan Kajian --</option>
                        @foreach ($bahan_kajian as $bk)
                            <option value="{{ $bk->id_bk }}">{{ $bk->nama_kode_bk }} - {{ $bk->nama_bk_id }}</option>
                        @endforeach
                    </select>
                    @error('id_bk') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                </div> --}}
    
                {{-- <div> --}}
                    {{-- <label for="cpl_ids">CPL yang Dibebankan:</label><br> --}}
                    {{-- Gunakan Select2 untuk pengalaman yang lebih baik --}}
                    {{-- <select name="cpl_ids[]" class="select2 w-48" multiple="multiple" required>
                        @foreach ($allCpl as $cpl)
                            <option value="{{ $cpl->id_cpl }}">{{ $cpl->nama_kode_cpl }}</option>
                        @endforeach
                    </select> --}}
                    {{-- @error('cpl_ids') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror --}}
                {{-- </div> --}}
    
                <div>
                    <label for="id_mk_syarat" class="font-semibold mb-2">Mata Kuliah Prasyarat:</label><br>
                    <select class="border p-2 rounded-lg border-gray-300 bg-gray-100" name="id_mk_syarat" >
                        <option value="">Tidak ada Matkul Prasyarat</option>
                        @foreach ($allMatkul as $mk)
                            <option value="{{ $mk->id_mk }}" {{old('id_mk_syarat') == $mk->id_mk ? 'selected' : ''}}>{{ $mk->nama_matkul_id }}</option>
                        @endforeach
                    </select>   
                    @error('id_mk_syarat') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
                </div>
                <br>
                <div>
                    <label for="id_model_pembelajaran" class="font-semibold mb-2">Model Pembelajaran:</label><br>
                    <select class="border p-2 rounded-lg border-gray-300 bg-gray-100" name="id_model_pembelajaran" >
                        <option value="">Pilih Model Pembelajaran</option>
                        @foreach ($modelPembelajaran as $mp)
                            <option value="{{ $mp->id_model_pembelajaran }}" {{old('id_model_pembelajaran') == $mp->id_model_pembelajaran ? 'selected' : ''}}>{{ $mp->nama_model_pembelajaran }}</option>
                        @endforeach
                    </select>   
                    @error('id_model_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
                </div>
                <br>
                <div>
                    <label for="materi_pembelajaran" class="font-semibold ">Materi Pembelajaran:</label><br>
                    <textarea class="p-2 border rounded-lg border-gray-300 w-full h-48 bg-gray-100 mt-2" name="materi_pembelajaran" rows="5" cols="80" cols="80"  required>{{old('materi_pembelajaran')}}</textarea>
                    @error('materi_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                </div>
                <br>
                <div>
                    <label for="pustaka_utama" class="font-semibold ">Pustaka Utama:</label><br>
                    <textarea class="p-2 border rounded-lg border-gray-300 w-full h-48 bg-gray-100 mt-2" name="pustaka_utama" rows="5" cols="80" required>{{old('pustaka_utama')}}</textarea>
                    @error('pustaka_utama') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                </div>
    
                <br>
    
                <div>
                    <label for="pustaka_pendukung" class="font-semibold ">Pustaka pendukung:</label><br>
                    <textarea class="p-2 border rounded-lg border-gray-300 w-full h-48 bg-gray-100 mt-2" name="pustaka_pendukung" rows="5" cols="80" required>{{old('pustaka_pendukung')}}</textarea>
                    @error('pustaka_pendukung') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                </div>

                <br>

                <div>
                    <label for="media_perangkat_lunak" class="font-semibold ">Media Pembelajaran (Perangkat Lunak):</label><br>
                    <select name="media_pembelajaran[]" id="media_perangkat_lunak" class="select2-perangkat-lunak border p-2 rounded-lg border-gray-300 bg-gray-100" multiple="multiple">
                        @foreach ($mediaPerangkatLunak as $mpl )
                            <option value="{{$mpl->id_media_pembelajaran}}">{{$mpl->nama_media_pembelajaran}}</option>
                        @endforeach
                    </select>
                    @error('media_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                </div>                                                                                                                       

                <br>

                <div>
                    <label for="media_perangkat_keras" class="font-semibold ">Media Pembelajaran (Perangkat Keras):</label><br>
                    <select name="media_pembelajaran[]" id="media_perangkat_keras" class="select2-perangkat-keras border p-2 rounded-lg border-gray-300 bg-gray-100" multiple="multiple">
                        <option value="">-Pilih Perangkat Keras--</option>
                        @foreach ($mediaPerangkatKeras as $mpk )
                            <option value="{{$mpk->id_media_pembelajaran}}">{{$mpk->nama_media_pembelajaran}}</option>
                        @endforeach
                    </select>
                    @error('media_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">Simpan RPS dan lanjut Mengisi Rencana Mingguan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.select2-perangkat-lunak').select2({
                placeholder: "Pilih Perangkat Lunak"
            });
            $('.select2-perangkat-keras').select2({
                placeholder: "Pilih Perangkat keras"
            });
        });
    </script>
</body>

</html>
