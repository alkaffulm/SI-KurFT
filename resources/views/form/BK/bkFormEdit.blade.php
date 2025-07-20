<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Edit Bahan Kajian</h2>

    <form action="{{ route('bahan-kajian.update', $bahan_kajian) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nama_bk">Nama Bahan Kajian:</label><br>
            @error('nama_bk')
                {{$message}}
            @enderror
            <input type="text" id="nama_bk" name="nama_bk" value="{{ old('nama_bk', $bahan_kajian->nama_bk)}}" required>
        </div>
        <br>
        <div>
            <label for="kategori">Kategori:</label><br>
            @error('kategori')
                {{$message}}
            @enderror
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $bahan_kajian->kategori)}}" required>
        </div>
        <br>
        <div>
            <label for="desc">Deskripsi:</label><br>
            @error('desc')
                {{$message}}
            @enderror
            <textarea id="desc" name="desc" rows="4" cols="50" required>{{ old('kategori', $bahan_kajian->kategori)}}</textarea>
        </div>
        <br>
        <div>
            <button type="submit">update</button>
        </div>
    </form>

</body>
</html>