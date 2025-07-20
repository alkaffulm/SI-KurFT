<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Mata Kuliah</title>
</head>
<body>

    <h2>Tabel Profil Lulusan</h2>

    <a href="{{ route('profil-lulusan.create') }}">Tambah </a>

    <table border="1" cellpadding="5"> 
        <tr>
            <th>ID Profil Lulusan</th>
            <th>aksi</th>
            <th>Nama Program Studi</th>
            <th>Profil Lulusan</th>
            <th>Deskripsi</th>
        </tr>
        @foreach ($profil_lulusan as $pl )
            <tr>
                <td>{{$pl->id_pl}}</td>
                <td>
                   <form action="{{ route('profil-lulusan.destroy', $pl) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form> 
                    | <a href="{{ route('profil-lulusan.edit', $pl) }}">Edit</a>
                </td>
                <td>{{$pl->programstudi->nama_prodi}}</td>
                <td>{{$pl->profil_lulusan}}</td>
                <td>{{$pl->desc}}</td>
            </tr>
        @endforeach
    </table>

    <script>
        alert("{{session('success')}}");
    </script>
    
</body>
</html>