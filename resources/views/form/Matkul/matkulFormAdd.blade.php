<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body>
    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="ml-72 mx-8 mt-24">
        <h2 class="text-2xl font-bold">Form Input Mata Kuliah</h2>
    
        <form action="{{ route('mata-kuliah.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id_ps" value="{{session()->get('userRoleId')}}">

            <div>
                <label for="kode_mk">Kode Mata Kuliah:</label><br>
                @error('kode_mk')
                    {{$message}}
                @enderror
                <input type="text" id="kode_mk" name="kode_mk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            <br>
            <div>
                <label for="nama_matkul_id">Nama Mata Kuliah (Indonesia):</label><br>
                @error('nama_matkul_id')
                    {{$message}}
                @enderror
                <input type="text" id="nama_matkul_id" name="nama_matkul_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            <br>
            <div>
                <label for="nama_matkul_en">Nama Mata Kuliah (English):</label><br>
                @error('nama_matkul_en')
                    {{$message}}
                @enderror
                <input type="text" id="nama_matkul_en" name="nama_matkul_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            <br>
            <div>
                <label for="matkul_desc_id">Deskripsi (Indonesia):</label><br>
                @error('matkul_desc_id')
                    {{$message}}
                @enderror
                <textarea id="matkul_desc_id" name="matkul_desc_id" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required></textarea>
            </div>
            <br>
            <div>
                <label for="matkul_desc_en">Deskripsi (English):</label><br>
                @error('matkul_desc_en')
                    {{$message}}
                @enderror
                <textarea id="matkul_desc_en" name="matkul_desc_en" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required></textarea>
            </div>
            <br>
            <div>
                <label for="jumlah_sks">Jumlah SKS:</label><br>
                @error('jumlah_sks')
                    {{$message}}
                @enderror
                <input type="text" id="jumlah_sks" name="jumlah_sks" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            <br>
            <div>
                <label for="semester">Semester:</label><br>
                @error('semester')
                    {{$message}}
                @enderror
                <input type="text" id="semester" name="semester" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            <br>
            <div>
                <button type="submit" class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">Kirim</button>
            </div>
        </form>
    </div>


</body>
</html>