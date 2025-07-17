<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Edit Mata Kuliah</h2>

    <form action="/mata-kuliah/{{$mata_kuliah->id_mk}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="id_ps">ID Program Studi:</label><br>
            @error('id_ps')
                {{$message}}
            @enderror
            <select name="id_ps" id="id_ps">
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
            <input type="text" id="nama_matkul" name="nama_matkul" value="{{old('nama_matkul', $mata_kuliah->nama_matkul)}}" required>
        </div>
        <br>
        <div>
            <label for="jumlah_sks">Jumlah SKS:</label><br>
            @error('jumlah_sks')
                {{$message}}
            @enderror
            <input type="text" id="jumlah_sks" name="jumlah_sks" value="{{old('jumlah_sks', $mata_kuliah->jumlah_sks)}}" required>
        </div>
        <br>
        <div>
            <label for="semester">Semester:</label><br>
            @error('semester')
                {{$message}}
            @enderror
            <input type="text" id="semester" name="semester" value="{{old('semester', $mata_kuliah->semester)}}" required>
        </div>
        <br>
        <div>
            <button type="submit">update</button>
        </div>
    </form>

</body>
</html>