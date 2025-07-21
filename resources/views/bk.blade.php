<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel BK</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])
    
    <div class="ml-72 mx-8 mt-24"> 
        <h2 class="text-2xl font-bold">Bahan Kajian (BK)</h2>

        <a href="{{ route('bahan-kajian.create') }}">Tambah </a>

        <table border="1" cellpadding="5"> 
            <tr>
                <th class="border-2">Kode BK</th>
                <th class="border-2">aksi</th>
                <th class="border-2">BK</th>
                <th class="border-2">Deskripsi BK</th>
            </tr>
            @foreach ($bahan_kajian as $bk )
                <tr>
                    <td class="border-2">{{ $bk->id_bk }}</td>
                    <td class="border-2">
                    <form action="{{ route('bahan-kajian.destroy', $bk) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('bahan-kajian.edit', $bk) }}">Edit</a>
                    </td>
                    <td class="border-2">{{ $bk->nama_bk }}</td>
                    <td class="border-2">{{ $bk->desc }}</td>
                </tr>
            @endforeach
        </table>        
    </div>



    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>