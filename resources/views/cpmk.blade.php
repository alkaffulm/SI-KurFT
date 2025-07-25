<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel CPMK</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="ml-72 mx-8 mt-24">
        {{-- <h2>Tabel CPMK</h2> --}}
        <h2 class="text-2xl font-bold">Capaian Pembelajaran Mata Kuliah (CPMK)</h2>

        <a href="{{ route('cpmk.create') }}">Tambah </a>
        <a href="{{ route('cpmk.editAll') }}">Edit </a>

        {{-- <table  cellpadding="5" > 
            <tr >
                <th class="border-2">Kode CPMK</th>
                <th class="border-2 ">aksi</th>
                <th class="border-2 ">Nama Program Studi</th>
                <th class="border-2">Nama MK</th>
                <th class="border-2">CPMK</th>
            </tr>
            @foreach ($cpmk as $cp )
                <tr >
                    <td class="border-2">{{ $cp->nama_kode_cpmk }}</td>
                    <td class="border-2">
                        <form action="{{ route('cpmk.destroy', $cp) }}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('cpmk.edit', $cp) }}">Edit</a>
                    </td>
                    <td class="border-2">{{ $cp->programstudi->nama_prodi }}</td>
                    <td class="border-2">{{ $cp->matakuliah->nama_matkul_id }}</td>
                    <td class="border-2">{{ $cp->desc_cpmk_id }}</td>
                </tr>
            @endforeach
        </table> --}}

        <table  cellpadding="5" border="1" class="w-full mb-24 text-center"> 
            <tr >
                <th class="border-2">Kode MK</th>
                <th class="border-2">Nama MK</th>
                <th class="border-2">CPMK</th>
            </tr>
            @foreach ($cpmk as $cp )
                <tr >
                    <td class="border-2">{{ $cp->matakuliah->kode_mk }}</td>
                    <td class="border-2">{{ $cp->matakuliah->nama_matkul_id }}</td>
                    <td class="border-2">{{ $cp->desc_cpmk_id }}</td>
                </tr>
            @endforeach
        </table>

        <h2 class="text-2xl font-bold">Sub CPMK</h2>

        <a href="{{ route('sub-cpmk.create') }}">Tambah </a>


        <table  border="1" cellpadding="5" class="w-full mb-24 text-center" > 
            <tr >
                <th class="border-2">Kode Sub CPMK</th>
                <th class="border-2 ">aksi</th>
                <th class="border-2">Nama Program Studi</th>
                <th class="border-2">Sub CPMK</th>
            </tr>
            @foreach ($sub_cpmk as $scp )
                <tr >
                    <td class="border-2">{{ $scp->nama_kode_sub_cpmk }}</td>
                    <td class="border-2">
                        <form action="{{ route('sub-cpmk.destroy', $scp) }}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('sub-cpmk.edit', $scp) }}">Edit</a>
                    </td>
                    <td class="border-2">{{ $scp->programstudi->nama_prodi }}</td>
                    <td class="border-2">{{ $scp->desc_sub_cpmk_id }}</td>
                </tr>
            @endforeach
        </table>

    </div>
    

    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>