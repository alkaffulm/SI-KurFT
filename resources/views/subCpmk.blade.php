<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel CPMK</title>
</head>
<body>

    <h2>Tabel Sub CPMK</h2>

    <a href="{{ route('sub-cpmk.create') }}">Tambah </a>

    <table border="1" cellpadding="5"> 
        <tr>
            <th>ID Sub CPMK</th>
            <th>aksi</th>
            <th>Nama CPMK</th>
            <th>ID CPMK</th>
            <th>Nama Sub CPMK</th>
            <th>Kode Sub CPMK</th>
            <th>Deskripsi</th>
        </tr>
        @foreach ($sub_cpmk as $scp )
            <tr>
                <td>{{$scp->id_sub_cpmk}}</td>
                <td>
                   <form action="{{ route('sub-cpmk.destroy', $scp) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form> 
                    | <a href="{{ route('sub-cpmk.edit', $scp) }}">Edit</a>
                </td>
                <td>{{$scp->cpmk?->nama_kode_cpmk ?? '-'}}</td>
                <td>{{$scp?->id_cpmk ?? '-'}}</td>
                <td>{{$scp->nama_kode_sub_cpmk}}</td>
                <td>{{$scp->kode_sub_cpmk}}</td>
                <td>{{$scp->desc}}</td>
            </tr>
        @endforeach
    </table>

    <script>
        alert("{{session('success')}}");
    </script>
    
</body>
</html>