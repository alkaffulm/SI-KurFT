<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Edit CPMK</h2>
    <form action="/cpmk/{{$cpmk->id_cpmk}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nama_kode_cpmk">Kode CPMK:</label><br>
            @error('nama_kode_cpmk')
                {{$message}}
            @enderror
            <input type="text" id="nama_kode_cpmk" name="nama_kode_cpmk" value="{{ old('nama_kode_cpmk', $cpmk->nama_kode_cpmk)}}" required>
        </div>
        <br>
        <div>
            <label for="kode_cpmk">Kode CPMK:</label><br>
            @error('kode_cpmk')
                {{$message}}
            @enderror
            <input type="text" id="kode_cpmk" name="kode_cpmk" value="{{ old('kode_cpmk', $cpmk->kode_cpmk)}}" required>
        </div>
        <br>
        <div>
            <label for="id_mk">ID Matkul:</label><br>
            @error('id_mk')
                {{$message}}
            @enderror
            <select name="id_mk" id="id_mk">
                @foreach ( $mk as $m )
                    <option value="{{$m->id_mk}}" {{ old('id_mk', $cpmk->id_mk) == $m->id_mk ? 'selected' : '' }}>{{$m->nama_matkul}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="desc">Deskripsi:</label><br>
            @error('desc')
                {{$message}}
            @enderror
            <textarea id="desc" name="desc" rows="4" cols="50" required>{{ old('desc', $cpmk->desc)}}</textarea>
        </div>
        <br>
        <div>
            <button type="submit">update</button>
        </div>
    </form>

</body>
</html>