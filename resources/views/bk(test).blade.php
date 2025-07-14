<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Form Input Buku Sederhana</h2>

    <a href="/bahan-kajian/create">Tambah Bahan Kajian Baru</a>

    <table border="1" cellpadding="5"> 
        <tr>
            <th>id BK</th>
            <th>aksi</th>
            <th>Nama BK</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
        </tr>
        @foreach ($bahan_kajian as $bk )
            <tr>
                <td>{{$bk->id_bk}}</td>
                <td>
                   <form action="/bahan-kajian/{{ $bk->id_bk }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form> 
                    | <a href="/bahan-kajian/{{$bk->id_bk}}/edit">Edit</a>
                </td>
                <td>{{$bk->nama_bk}}</td>
                <td>{{$bk->kategori}}</td>
                <td>{{$bk->desc}}</td>
            </tr>
        @endforeach
    </table>

    <script>
        alert("{{session('success')}}");
    </script>
    
</body>
</html>