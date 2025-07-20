<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Edit Sub CPMK</h2>

    <form action="{{ route('sub-cpmk.update', $sub_cpmk) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nama_kode_sub_cpmk">Nama Sub CPMK:</label><br>
            @error('nama_kode_sub_cpmk')
                {{$message}}
            @enderror
            <input type="text" id="nama_kode_sub_cpmk" name="nama_kode_sub_cpmk" value="{{ old('nama_kode_sub_cpmk', $sub_cpmk->nama_kode_sub_cpmk)}}" required>
        </div>
        <br>
        <div>
            <label for="kode_sub_cpmk">Kode Sub CPMK:</label><br>
            @error('kode_sub_cpmk')
                {{$message}}
            @enderror
            <input type="text" id="kode_sub_cpmk" name="kode_sub_cpmk"  value="{{ old('kode_sub_cpmk', $sub_cpmk->kode_sub_cpmk)}}" required>
        </div>
        <br>
        <div>
            <label for="id_cpmk">ID CPMK:</label><br>
            @error('id_cpmk')
                {{$message}}
            @enderror
            <select name="id_cpmk" id="id_cpmk">
                @foreach ( $cpmk as $c )
                    <option value="{{$c->id_cpmk}}" {{ old('id_cpmk', $sub_cpmk->id_cpmk) == $c->id_cpmk ? 'selected' : '' }}>{{$c->nama_kode_cpmk}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="desc">Deskripsi:</label><br>
            @error('desc')
                {{$message}}
            @enderror
            <textarea id="desc" name="desc" rows="4" cols="50" required>{{ old('desc', $sub_cpmk->desc)}}</textarea>
        </div>
        <br>
        <div>
            <button type="submit">update</button>
        </div>
    </form>

</body>
</html>