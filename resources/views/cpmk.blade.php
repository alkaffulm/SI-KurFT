<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel CPMK</title>
</head>
<body>

    <h2>Tabel CPMK</h2>

    <a href="{{ route('cpmk.create') }}">Tambah </a>

    <table border="1" cellpadding="5"> 
        <tr>
            <th>id CPMK</th>
            <th>aksi</th>
            <th>Nama Matkul</th>
            <th>Nama CPMK</th>
            <th>Kode CPMK</th>
            <th>Deskripsi</th>
        </tr>
        @foreach ($cpmk as $cp )
            <tr>
                <td>{{ $cp->id_cpmk }}</td>
                <td>
                   <form action="{{ route('cpmk.destroy', $cp) }}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form> 
                    | <a href="{{ route('cpmk.edit', $cp) }}">Edit</a>
                </td>
                <td>{{ $cp->matakuliah->nama_matkul }}</td>
                <td>{{ $cp->nama_kode_cpmk }}</td>
                <td>{{ $cp->kode_cpmk }}</td>
                <td>{{ $cp->desc }}</td>
            </tr>
        @endforeach
    </table>

    <script>
        alert("{{session('success')}}");
    </script>
    
</body>
</html>