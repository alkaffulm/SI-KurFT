<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Input Bahan Kajian</h2>

    <form action={{ route('bahan-kajian.store') }} method="POST">
        @csrf
        <div>
            <label for="nama_bk">Nama Bahan Kajian:</label><br>
            @error('nama_bk')
                {{$message}}
            @enderror
            <input type="text" id="nama_bk" name="nama_bk" required>
        </div>
        <br>
        <div>
            <label for="kategori">Kategori:</label><br>
            @error('kategori')
                {{$message}}
            @enderror
            <input type="text" id="kategori" name="kategori" required>
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