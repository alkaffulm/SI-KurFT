<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Rencana Pembelajaran Semester</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    {{-- Select2 CSS and JS for searchable dropdowns --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    @include('layouts.navbar')
    @include('layouts.sidebar')
    
    <div class="py-8 px-16 sm:ml-64 mt-16 bg-gray-100">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Buat RPS</h2>
            <a href="/dosen/matkul" class="px-6 py-3 text-base font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100">Kembali</a>
        </div>  
    
        <div class="bg-white p-8 rounded-lg">
            <h1 class="text-xl font-bold mb-4 text-biru-custom">Informasi Mata Kuliah</h1>
            <div class="grid grid-cols-3  ">
                <div class="grid-span-1">
                    <p class="font-semibold">Mata Kuliah</p>
                    <div>
                        <p>{{ $mata_kuliah->nama_matkul_id }}</p> 
                        <p class="italic text-sm text-biru-custom">{{ $mata_kuliah->nama_matkul_en }}</p>
                    </div>
                </div>
                <div class="grid-span-1">
                    <p class="font-semibold">Bahan Kajian</p>
                    <div>
                        @forelse ($mata_kuliah->bahanKajian as $bk)
                            <p>{{ $bk->nama_bk_id }} </p>
                            <p class="italic text-sm text-biru-custom">{{ $bk->nama_bk_en }}</p>
                        @empty
                            <p class="text-gray-500 mt-2">Belum ada BK yang terhubung dengan mata kuliah ini.</p>
                        @endforelse
                    </div>
                </div>
                <div class="grid-span-1">
                    <p class="font-semibold">Kode</p>
                    <p>{{$mata_kuliah->kode_mk}}</p>
                </div>
            </div>
            <br>
            <div class="grid grid-cols-3">
                <div>
                    <p class="font-semibold">SKS Teori</p>
                    <p>{{$mata_kuliah->sks_teori}}</p>
                </div>
                <div>
                    <p class="font-semibold">SKS Praktikum</p>
                    <p>{{$mata_kuliah->sks_praktikum}}</p>
                </div>
                <div>
                    <p class="font-semibold">Semester</p>
                    <p>{{$mata_kuliah->semester}}</p>
                </div>
            </div>
            <br>
            <div>
                <p class="font-semibold mb-2">Deskripsi</p>
                <div>
                    <p class="text-justify">{{$mata_kuliah->matkul_desc_id}}</p>
                    <p class="italic text-justify text-sm text-biru-custom">{{$mata_kuliah->matkul_desc_en}}</p>
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
          
            <form action="{{ route('rps.store') }}" method="post" onsubmit="return disableButton(this)">
                @csrf    
                <input type="hidden" name="id_mk" value="{{ $mata_kuliah->id_mk }}">   
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <div class="flex-1">
                        <label for="id_mk_syarat" class="font-semibold block mb-2">Mata Kuliah Prasyarat:</label>
                        <select class="border p-2 rounded-lg border-gray-300 bg-gray-100 w-full" name="id_mk_syarat">
                            <option value="">Tidak ada Matkul Prasyarat</option>
                            @foreach ($allMatkul as $mk)
                                <option value="{{ $mk->id_mk }}" {{old('id_mk_syarat') == $mk->id_mk ? 'selected' : ''}}>
                                    {{ $mk->nama_matkul_id }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_mk_syarat') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex-1">
                        <label for="id_model_pembelajaran" class="font-semibold block mb-2">Model Pembelajaran:</label>
                        <select class="border p-2 rounded-lg border-gray-300 bg-gray-100 w-full" name="id_model_pembelajaran" required>
                            <option value="">Pilih Model Pembelajaran</option>
                            @foreach ($modelPembelajaran as $mp)
                                <option value="{{ $mp->id_model_pembelajaran }}" {{old('id_model_pembelajaran') == $mp->id_model_pembelajaran ? 'selected' : ''}}>
                                    {{ $mp->nama_model_pembelajaran }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_model_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex-1">
                        <label for="media_perangkat_lunak" class="font-semibold block mb-2">Media Pembelajaran (Perangkat Lunak):</label>
                        <select name="media_pembelajaran[]" id="media_perangkat_lunak"
                            class="select2-perangkat-lunak border p-2 rounded-lg border-gray-300 bg-gray-100 w-full"
                            multiple="multiple" required>
                            @foreach ($mediaPerangkatLunak as $mpl)
                                <option value="{{ $mpl->id_media_pembelajaran }}">{{ $mpl->nama_media_pembelajaran }}</option>
                            @endforeach
                        </select>
                        @error('media_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex-1">
                        <label for="media_perangkat_keras" class="font-semibold block mb-2">Media Pembelajaran (Perangkat Keras):</label>
                        <select name="media_pembelajaran[]" id="media_perangkat_keras"
                            class="select2-perangkat-keras border p-2 rounded-lg border-gray-300 bg-gray-100 w-full"
                            multiple="multiple" required>
                            @foreach ($mediaPerangkatKeras as $mpk)
                                <option value="{{ $mpk->id_media_pembelajaran }}">{{ $mpk->nama_media_pembelajaran }}</option>
                            @endforeach
                        </select>
                        @error('media_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
                    </div>

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
                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">Simpan RPS dan lanjut Mengisi Rencana Mingguan</button>
                </div>
            </form>
        </div>
    </div>
 
    </div>

    <script>
        $(document).ready(function() {
            $('.select2-perangkat-lunak').select2({
                placeholder: "Pilih Perangkat Lunak",
                dropdownAutoWidth: true,
                width: '100%',
            });
            $('.select2-perangkat-keras').select2({
                placeholder: "Pilih Perangkat keras",
                dropdownAutoWidth: true,
                width: '100%',
            });
        });
    </script>

    <script>
        function disableButton(form) {
            // Ambil tombol submit
            const btn = form.querySelector('button[type="submit"]');
            
            // Ubah teks dan matikan tombol
            btn.innerText = 'Menyimpan...';
            btn.disabled = true;
            btn.classList.add('opacity-50', 'cursor-not-allowed');

            return true; // Lanjutkan submit form
        }
    </script>
</body>

</html>
