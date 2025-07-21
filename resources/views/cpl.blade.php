<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel CPL</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="ml-72 mx-8 mt-24"> 
        <h2 class="text-2xl font-bold">Capaian Profil Lulusan (CPL)</h2>
    
        <a href="{{ route('cpl.create') }}">Tambah</a>
    
    
        <table border="1" cellpadding="5"> 
            <tr>
                <th class="border-2">id CPL</th>
                <th class="border-2">aksi</th>
                <th class="border-2">Deskripsi CPL</th>
            </tr>
            @foreach ($cpl as $c )
                <tr>
                    <td class="border-2">{{ $c->id_cpl }}</td>
                    <td class="border-2">
                       <form action="{{ route('cpl.destroy', $c) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('cpl.edit', $c) }}">Edit</a>
                    </td>
                    <td class="border-2">{{ $c->desc }}</td>
                </tr>
            @endforeach
        </table> 
    </div>

    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>