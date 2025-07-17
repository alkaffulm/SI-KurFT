<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Input CPMK</h2>

    <form action="/cpmk" method="POST">
        @csrf
        <div>
            <label for="nama_kode_cpmk">Nama CPMK:</label><br>
            @error('nama_kode_cpmk')
                {{$message}}
            @enderror
            <input type="text" id="nama_kode_cpmk" name="nama_kode_cpmk" required>
        </div>
        <br>
        <div>
            <label for="kode_cpmk">Kode CPMK:</label><br>
            @error('kode_cpmk')
                {{$message}}
            @enderror
            <input type="text" id="kode_cpmk" name="kode_cpmk" required>
        </div>
        <br>
        <div>
            <label for="id_mk">ID Matkul:</label><br>
            @error('id_mk')
                {{$message}}
            @enderror
            <select name="id_mk" id="id_mk">
                @foreach ( $mata_kuliah as $mk )
                    <option value="{{$mk->id_mk}}">{{$mk->nama_matkul}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="desc">Deskripsi:</label><br>
            @error('desc')
                {{$message}}
            @enderror
            <textarea id="desc" name="desc" rows="4" cols="50" required></textarea>
        </div>
        <br>
        <div>
            <button type="submit">Kirim</button>
        </div>
    </form>

</body>
</html>