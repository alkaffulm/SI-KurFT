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
        <h2 class="text-2xl font-bold">Form Edit PEO</h2>

        <form action="{{ route('peo.update', $peo) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="kode_peo">Kode PEO:</label><br>
                @error('kode_peo')
                    {{$message}}
                @enderror
                <input type="text" id="kode_peo" name="kode_peo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('kode_peo', $peo->kode_peo)}}" required>
            </div>
            <br>
            <div>
                <label for="desc_peo">Deskripsi:</label><br>
                @error('desc_peo')
                    {{$message}}
                @enderror
                <input type="text" id="desc_peo" name="desc_peo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('desc_peo', $peo->desc_peo)}}" required>
            </div>
            <br>
            <div>
                <button type="submit">update</button>
            </div>
        </form>   
    </div>


</body>
</html>