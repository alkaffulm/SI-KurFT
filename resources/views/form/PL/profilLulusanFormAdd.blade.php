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
        <h2 class="text-2xl font-bold">Form Input Profil Lulusan</h2>

        <form action="{{ route('profil-lulusan.store') }}" method="POST">
            @csrf
            <div>
                <label for="id_ps">Nama Program Studi:</label><br>
                @error('id_ps')
                    {{$message}}
                @enderror
                <select name="id_ps" id="id_ps"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2">
                    @foreach ( $program_studi as $ps )
                        <option value="{{$ps->id_ps}}">{{$ps->nama_prodi}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label for="profil_lulusan">Profil Lulusan:</label><br>
                @error('profil_lulusan')
                    {{$message}}
                @enderror
                <input type="text" id="profil_lulusan" name="profil_lulusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
            </div>
            <br>

            <div>
                <label for="desc">Deskripsi:</label><br>
                @error('desc')
                    {{$message}}
                @enderror
                <textarea id="desc" name="desc" rows="4" cols="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required></textarea>
            </div>
            <br>
            <div>
                <button type="submit" class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">Kirim</button>
            </div>
        </form>
    </div>


</body>
</html>