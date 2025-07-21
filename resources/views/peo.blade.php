<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel PEO</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="ml-72 mx-8 mt-24"> 
        <h2 class="text-2xl font-bold">Programme Educational Objective (PEO)</h2>

        <a href="{{ route('peo.create') }}">Tambah </a>

        <table border="1" cellpadding="5"> 
            <tr>
                <th class="border-2">Kode PEO</th>
                <th class="border-2">aksi</th>
                <th class="border-2">Deskripsi</th>
            </tr>
            @foreach ($peo as $p )
                <tr>
                    <td class="border-2">{{$p->kode_peo}}</td>
                    <td class="border-2">
                    <form action="{{ route('peo.destroy', $p) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('peo.edit', $p) }}">Edit</a>
                    </td>
                    {{-- <td>{{$p->cpmk?->nama_kode_cpmk ?? '-'}}</td>
                    <td>{{$p?->id_cpmk ?? '-'}}</td> --}}
                    <td class="border-2">{{$p->desc_peo}}</td>
                </tr>
            @endforeach
        </table>
    </div>



    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>