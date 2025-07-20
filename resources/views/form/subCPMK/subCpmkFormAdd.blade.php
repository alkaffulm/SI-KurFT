<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Input Sub CPMK</h2>

    <form action="{{ route('sub-cpmk.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama_kode_sub_cpmk">Nama Sub CPMK:</label><br>
            @error('nama_kode_sub_cpmk')
                {{$message}}
            @enderror
            <input type="text" id="nama_kode_sub_cpmk" name="nama_kode_sub_cpmk" required>
        </div>
        <br>
        <div>
            <label for="kode_sub_cpmk">Kode Sub CPMK:</label><br>
            @error('kode_sub_cpmk')
                {{$message}}
            @enderror
            <input type="text" id="kode_sub_cpmk" name="kode_sub_cpmk" required>
        </div>
        <br>
        <div>
            <label for="id_cpmk">ID CPMK:</label><br>
            @error('id_cpmk')
                {{$message}}
            @enderror
            <select name="id_cpmk" id="id_cpmk">
                @foreach ( $cpmk as $c )
                    <option value="{{$c->id_cpmk}}">{{$c->nama_kode_cpmk}}</option>
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