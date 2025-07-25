<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Mata Kuliah</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="ml-72 mx-8 mt-24"> 
        <h2 class="text-2xl font-bold">Mata Kuliah</h2>

        <a href="{{ route('mata-kuliah.create') }}">Tambah </a>
        <a href="{{ route('mata-kuliah.editAll')}}">Edit</a>

        <br><br>

        <table border="1" cellpadding="5" class="w-full"> 
            <tr>
                <th class="border-2" rowspan="2">Kode MK</th>
                {{-- <th class="border-2" rowspan="2">aksi</th> --}}
                {{-- <th class="border-2" rowspan="2">Nama Prodi</th> --}}
                <th class="border-2" rowspan="2">Nama MK</th>
                <th class="border-2" rowspan="2">SKS</th>
                <th class="border-2" colspan="8">Semester</th>
            </tr>
            <tr>
                {{-- @for ($i = 1 ; $i <= 8 ; $i++) 
                    <th>{{$i}}</tr>                
                @endfor --}}
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
            </tr>
            <tr></tr>
            @foreach ($mata_kuliah as $mk )
                <tr>
                    <td class="border-2">{{$mk->kode_mk}}</td>
                    {{-- <td class="border-2">
                    <form action="{{ route('mata-kuliah.destroy', $mk) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('mata-kuliah.edit', $mk) }}">Edit</a>
                    </td> --}}
                    {{-- <td>{{$mk->programstudi->nama_prodi}}</td> --}}
                    {{-- <td>{{$mk->cpmk?->nama_kode_cpmk ?? '-'}}</td>
                    <td>{{$mk?->id_cpmk ?? '-'}}</td> --}}
                    <td class="border-2">{{$mk->nama_matkul_id}}</td>
                    <td class="border-2">{{$mk->jumlah_sks}}</td>
                    @for ($i = 1 ; $i <= 8 ; $i++) 
                        <td class="border-2">
                            @if ($mk->semester == $i)
                                <span>v</span>
                            @endif           
                        </td>
                    @endfor
                </tr>
            @endforeach
        </table>
    </div>



    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>