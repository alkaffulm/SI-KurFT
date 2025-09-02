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
    
    <div class="py-8 px-16 sm:ml-64 mt-16">
        <a href="/dosen/matkul">Kembali</a>
        <h2>Generate RPS</h2>
        
        <form action="{{ route('rps.store') }}" method="post">
            @csrf

            <input type="hidden" name="id_mk" value="{{ $mata_kuliah->id_mk }}">

            <br>
            <h1 class="text-xl font-bold">RPS Induk</h1>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Mata Kuliah </th>
                        <td>: {{ $mata_kuliah->nama_matkul_id }}</td>
                    </tr>
                    <tr>
                        <th>Kode</th>
                        <td>: {{$mata_kuliah->kode_mk}}</td>
                    </tr>
                    <tr>
                        <th>Bobot</th>
                        <td>: SKS Teori {{$mata_kuliah->sks_teori}} | SKS Praktikum: {{$mata_kuliah->sks_praktikum}}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>: {{$mata_kuliah->semester}}</td>
                    </tr>
                    <tr>
                        <th class="flex align-top">Deskripsi</th>
                        <td>: {{$mata_kuliah->matkul_desc_id}}</td>
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
                    @forelse ($mata_kuliah->bahanKajian as $bk)
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
            <br>

            <div>
                <label for="id_mk_syarat">Mata Kuliah Prasyarat:</label><br>
                <select class="border" name="id_mk_syarat" >
                    <option value="">Tidak ada Matkul Prasyarat</option>
                    @foreach ($allMatkul as $mk)
                        <option value="{{ $mk->id_mk }}" {{old('id_mk_syarat') == $mk->id_mk ? 'selected' : ''}}>{{ $mk->nama_matkul_id }}</option>
                    @endforeach
                </select>   
                @error('id_mk_syarat') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror             
            </div>

            <br>
            <div>
                <label for="materi_pembelajaran">Materi Pembelajaran:</label><br>
                <textarea class="border" name="materi_pembelajaran" rows="5" cols="80" cols="80"  required>{{old('materi_pembelajaran')}}</textarea>
                @error('materi_pembelajaran') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
            </div>

            <br>
            
            <div>
                <label for="pustaka_utama">Pustaka Utama:</label><br>
                <textarea class="border" name="pustaka_utama" rows="5" cols="80" required>{{old('pustaka_utama')}}</textarea>
                @error('pustaka_utama') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
            </div>

            <br>

            <div>
                <label for="pustaka_pendukung">Pustaka pendukung:</label><br>
                <textarea class="border" name="pustaka_pendukung" rows="5" cols="80" required>{{old('pustaka_pendukung')}}</textarea>
                @error('pustaka_pendukung') <div class="text-red-500 mt-1 text-xs">{{ $message }}</div> @enderror
            </div>
            <br>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan RPS dan lanjut Mengisi Rencana Mingguan</button>
        </form>
    </div>
        <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>
