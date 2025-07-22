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
        <h2 class="text-2xl font-bold">Form Input Sub CPMK</h2>
    
        <form action="{{ route('sub-cpmk.store') }}" method="POST">
            @csrf
            <div>
                <label for="nama_kode_sub_cpmk">Nama Sub CPMK:</label><br>
                @error('nama_kode_sub_cpmk')
                    {{$message}}
                @enderror
                <input type="text" id="nama_kode_sub_cpmk" name="nama_kode_sub_cpmk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            <br>
            <div>
                <label for="kode_sub_cpmk">Kode Sub CPMK:</label><br>
                @error('kode_sub_cpmk')
                    {{$message}}
                @enderror
                <input type="text" id="kode_sub_cpmk" name="kode_sub_cpmk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            <br>
            <div>
                <label for="id_cpmk">ID CPMK:</label><br>
                @error('id_cpmk')
                    {{$message}}
                @enderror
                <select name="id_cpmk" id="id_cpmk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2">
                    @foreach ( $cpmk as $c )
                        <option value="{{$c->id_cpmk}}">{{$c->nama_kode_cpmk}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label for="desc_sub_cpmk_id">Deskripsi Sub CPMK (Indonesia):</label><br>
                @error('desc_sub_cpmk_id')
                    {{$message}}
                @enderror
                <textarea id="desc_sub_cpmk_id" name="desc_sub_cpmk_id" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required></textarea>
            </div>
            <br>
            <div>
                <label for="desc_sub_cpmk_en">Deskripsi Sub CPMK (English):</label><br>
                @error('desc_sub_cpmk_en')
                    {{$message}}
                @enderror
                <textarea id="desc_sub_cpmk_en" name="desc_sub_cpmk_en" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required></textarea>
            </div>
            <br>
            <div>
                <button type="submit" class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">Kirim</button>
            </div>
        </form>
    </div>

</body>
</html>