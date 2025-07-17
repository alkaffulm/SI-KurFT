<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Mata Kuliah</title>
</head>
<body>

    <h2>Tabel Mata Kuliah</h2>

    <a href="/mata-kuliah/create">Tambah </a>

    <table border="1" cellpadding="5"> 
        <tr>
            <th>ID Mata Kuliah</th>
            <th>aksi</th>
            <th>ID Program Studi</th>
            <th>Nama Mata Kuliah</th>
            <th>Jumlah SKS</th>
            <th>Semester</th>
        </tr>
        @foreach ($mata_kuliah as $mk )
            <tr>
                <td>{{$mk->id_mk}}</td>
                <td>
                   <form action="/mata-kuliah/{{ $mk->id_mk }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form> 
                    | <a href="/mata-kuliah/{{$mk->id_mk}}/edit">Edit</a>
                </td>
                {{-- <td>{{$mk->cpmk?->nama_kode_cpmk ?? '-'}}</td>
                <td>{{$mk?->id_cpmk ?? '-'}}</td> --}}
                <td>{{$mk->programstudi->nama_prodi}}</td>
                <td>{{$mk->nama_matkul}}</td>
                <td>{{$mk->jumlah_sks}}</td>
                <td>{{$mk->semester}}</td>
            </tr>
        @endforeach
    </table>

    <script>
        alert("{{session('success')}}");
    </script>
    
</body>
</html>