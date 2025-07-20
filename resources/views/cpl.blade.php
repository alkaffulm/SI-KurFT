<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel CPL</title>
</head>
<body>

    <h2>Tabel Capaian Profil Lulusan</h2>

    <a href="{{ route('cpl.create') }}">Tambah</a>

    <table border="1" cellpadding="5"> 
        <tr>
            <th>id CPL</th>
            <th>aksi</th>
            <th>ID Prodi</th>
            <th>Kode CPL</th>
            <th>Desc</th>
            <th>Bobot Maksimum</th>
        </tr>
        @foreach ($cpl as $c )
            <tr>
                <td>{{ $c->id_cpl }}</td>
                <td>
                   <form action="{{ route('cpl.destroy', $c) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form> 
                    | <a href="{{ route('cpl.edit', $c) }}">Edit</a>
                </td>
                <td>{{ $c->programstudi->nama_prodi }}</td>
                <td>{{ $c->nama_kode_cpl }}</td>
                <td>{{ $c->desc }}</td>
                <td>{{ $c->bobot_maksimum }}</td>
            </tr>
        @endforeach
    </table>

    <script>
        alert("{{session('success')}}");
    </script>
    
</body>
</html>