<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Input Mata Kuliah</h2>

    <form action="/mata-kuliah" method="POST">
        @csrf
        <div>
            <label for="id_ps">ID Program Studi:</label><br>
            @error('id_ps')
                {{$message}}
            @enderror
            <select name="id_ps" id="id_ps">
                @foreach ( $ps as $p )
                    <option value="{{$p->id_ps}}">{{$p->nama_prodi}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="nama_matkul">Nama Mata Kuliah:</label><br>
            @error('nama_matkul')
                {{$message}}
            @enderror
            <input type="text" id="nama_matkul" name="nama_matkul" required>
        </div>
        <br>
        <div>
            <label for="jumlah_sks">Jumlah SKS:</label><br>
            @error('jumlah_sks')
                {{$message}}
            @enderror
            <input type="text" id="jumlah_sks" name="jumlah_sks" required>
        </div>
        <br>
        <div>
            <label for="semester">Semester:</label><br>
            @error('semester')
                {{$message}}
            @enderror
            <input type="text" id="semester" name="semester" required>
        </div>
        <br>
        <div>
            <button type="submit">Kirim</button>
        </div>
    </form>

</body>
</html>