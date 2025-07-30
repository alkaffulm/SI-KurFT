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
        <h2>Generate RPS untuk: {{ $mata_kuliah->nama_matkul_id }}</h2>

        <form action="{{ route('rps.store') }}" method="post">
            @csrf

            <input type="hidden" name="id_mk" value="{{ $mata_kuliah->id_mk }}">

            <p>Kode: {{$mata_kuliah->kode_matkul}}</p>
            <p>Bobot: </p>
            <p>SKS Teori: {{$mata_kuliah->sks_teori}} | SKS Praktikum: {{$mata_kuliah->sks_praktikum}}</p>
            <p>Semester: {{$mata_kuliah->semester}}</p>
            <p>Deskripsi: {{$mata_kuliah->matkul_desc_id}}</p>
            
            <div>
                <h4>CPMK untuk Mata Kuliah ini:</h4>
                <ul>
                    @foreach ($mata_kuliah->cpmks as $cpmk)
                        <li>{{ $cpmk->nama_kode_cpmk }}</li>
                    @endforeach
                </ul>
            </div>
            <br>

            <div>
                <label for="id_bk">Bahan Kajian:</label><br>
                <select name="id_bk" required>
                    <option value="">-- Pilih Bahan Kajian --</option>
                    @foreach ($bahan_kajian as $bk)
                        <option value="{{ $bk->id_bk }}">{{ $bk->nama_kode_bk }} - {{ $bk->nama_bk_id }}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <div>
                <label for="cpl_ids">CPL yang Dibebankan:</label><br>
                {{-- Gunakan Select2 untuk pengalaman yang lebih baik --}}
                <select name="cpl_ids[]" class="select2 w-48" multiple="multiple" required>
                    @foreach ($allCpl as $cpl)
                        <option value="{{ $cpl->id_cpl }}">{{ $cpl->nama_kode_cpl }}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <div>
                <label for="id_mk_syarat">Mata Kuliah Prasyarat:</label><br>
                <select name="id_mk_syarat" >
                    <option value="">Tidak ada Matkul Prasyarat</option>
                    @foreach ($allMatkul as $mk)
                        <option value="{{ $mk->id_mk }}">{{ $mk->nama_matkul_id }}</option>
                    @endforeach
                </select>                
            </div>

            <br>
            <div>
                <label for="materi_pembelajaran">Materi Pembelajaran:</label><br>
                <textarea name="materi_pembelajaran" rows="5"></textarea>
            </div>

            <br>
            
            <div>
                <label for="pustaka_utama">Pustaka Utama:</label><br>
                <textarea name="pustaka_utama" rows="5"></textarea>
            </div>

            <br>

            <div>
                <label for="pustaka_pendukung">Pustaka pendukung:</label><br>
                <textarea name="pustaka_pendukung" rows="5"></textarea>
            </div>
            <br>
            <button type="submit">Simpan RPS</button>
        </form>
    </div>
        <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>
