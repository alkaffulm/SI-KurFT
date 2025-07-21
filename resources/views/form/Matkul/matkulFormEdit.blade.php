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
        <h2 class="text-2xl font-bold">Form Edit Mata Kuliah</h2>

        <form action="{{ route('mata-kuliah.update', $mata_kuliah) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="id_ps">ID Program Studi:</label><br>
                @error('id_ps')
                    {{$message}}
                @enderror
                <select name="id_ps" id="id_ps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2">
                    @foreach ( $program_studi as $ps )
                        <option value="{{$ps->id_ps}}" {{old('id_ps', $mata_kuliah->id_ps) == $ps->id_ps ? 'selected' : ''}}>{{$ps->nama_prodi}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label for="nama_matkul">Nama Mata Kuliah:</label><br>
                @error('nama_matkul')
                    {{$message}}
                @enderror
                <input type="text" id="nama_matkul" name="nama_matkul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('nama_matkul', $mata_kuliah->nama_matkul)}}" required>
            </div>
            <br>
            <div>
                <label for="jumlah_sks">Jumlah SKS:</label><br>
                @error('jumlah_sks')
                    {{$message}}
                @enderror
                <input type="text" id="jumlah_sks" name="jumlah_sks" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('jumlah_sks', $mata_kuliah->jumlah_sks)}}" required>
            </div>
            <br>
            <div>
                <label for="semester">Semester:</label><br>
                @error('semester')
                    {{$message}}
                @enderror
                <input type="text" id="semester" name="semester" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" value="{{old('semester', $mata_kuliah->semester)}}" required>
            </div>
            <br>
            <div>
                <button type="submit">update</button>
            </div>
        </form>   
    </div>


</body>
</html>