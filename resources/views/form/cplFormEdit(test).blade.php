<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Edit CPL</h2>
    <form action="/cpl/{{$cpl->id_cpl}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nama_kode_cpl">Kode CPL:</label><br>
            @error('nama_kode_cpl')
                {{$message}}
            @enderror
            <input type="text" id="nama_kode_cpl" name="nama_kode_cpl" value="{{ old('nama_kode_cpl', $cpl->nama_kode_cpl)}}" required>
        </div>
        <br>
        <div>
            <label for="id_ps">ID Prodi:</label><br>
            @error('id_ps')
                {{$message}}
            @enderror
            <select name="id_ps" id="id_ps">
                @foreach ( $ps as $p )
                    <option value="{{$p->id_ps}}" {{ old('id_ps', $cpl->id_ps) == $p->id_ps ? 'selected' : '' }}>{{$p->nama_prodi}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="id_kurikulum">ID Kurikulum:</label><br>
            @error('id_kurikulum')
                {{$message}}
            @enderror
            <select name="id_kurikulum" id="id_kurikulum">
                @foreach ( $krk as $k )
                    <option value="{{$k->id_kurikulum}}" {{ old('id_ps', $cpl->id_kurikulum) == $k->id_kurikulum ? 'selected' : '' }}>{{$k->tahun}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="bobot_maksimum">Bobot Maksimum:</label><br>
            @error('bobot_maksimum')
                {{$message}}
            @enderror
            <input type="text" id="bobot_maksimum" name="bobot_maksimum" value="{{ old('bobot_maksimum', $cpl->bobot_maksimum)}}" required>
        </div>
        <br>
        <div>
            <label for="desc">Deskripsi:</label><br>
            @error('desc')
                {{$message}}
            @enderror
            <textarea id="desc" name="desc" rows="4" cols="50" required>{{ old('desc', $cpl->desc)}}</textarea>
        </div>
        <br>
        <div>
            <button type="submit">Kirim</button>
        </div>
    </form>

</body>
</html>