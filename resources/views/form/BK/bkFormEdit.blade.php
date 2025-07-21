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
        <h2 class="text-2xl font-bold">Form Edit Bahan Kajian</h2>

        <form action="{{ route('bahan-kajian.update', $bahan_kajian) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_bk">Nama Bahan Kajian:</label><br>
                @error('nama_bk')
                    {{$message}}
                @enderror
                <input type="text" id="nama_bk" name="nama_bk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{ old('nama_bk', $bahan_kajian->nama_bk)}}" required>
            </div>
            <br>
            <div>
                <label for="kategori">Kategori:</label><br>
                @error('kategori')
                    {{$message}}
                @enderror
                <input type="text" id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{ old('kategori', $bahan_kajian->kategori)}}" required>
            </div>
            <br>
            <div>
                <label for="desc">Deskripsi:</label><br>
                @error('desc')
                    {{$message}}
                @enderror
                <textarea id="desc" name="desc" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>{{ old('kategori', $bahan_kajian->kategori)}}</textarea>
            </div>
            <br>
            <div>
                <button type="submit" class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">update</button>
            </div>
        </form>
    </div>

</body>
</html>