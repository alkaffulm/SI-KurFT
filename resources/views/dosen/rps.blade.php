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
        <h2 class="text-2xl font-bold">RPS</h2>
       
        <a href="{{ route('rps.create') }}">Tambah </a>

        <table border="1" cellpadding="5"> 
            <tr>
                <th class="border-2">Kode MK</th>
                <th class="border-2">aksi</th>
                <th class="border-2">Nama Mata Kuliah</th>
                <th class="border-2">Deskripsi BK</th>
            </tr>
            @foreach ($mata_kuliah as $mk )
                <tr>
                    <td class="border-2">{{ $mk->kode_mk }}</td>
                    <td class="border-2">
                    <form action="{{ route('mata-kuliah.destroy', $mk) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('mata-kuliah.edit', $mk) }}">Edit</a>
                    </td>
                    <td class="border-2">{{ $mk->nama_matkul_id }}</td>
                    <td class="border-2">{{ $mk->matkul_desc_id }}</td>
                </tr>
            @endforeach
        </table>  
    </div>



    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>