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

    {{-- tabel cpl --}}
    <div class="ml-72 mx-8 mt-24 "> 
        <h2 class="text-2xl font-bold mb-6">Capaian Profil Lulusan (CPL)</h2>
    
        <a href="{{ route('cpl.create') }}" class="mt-2 mb-2 text-white bg-[#5FA9C8] px-2 py-2 rounded-lg hover:bg-[#2b7798]">Tambah</a>
    
    
        <table border="1" cellpadding="5" class="mt-4 w-full text-center"> 
            <tr>
                <th class="border-2">Kode CPL</th>
                <th class="border-2">aksi</th>
                <th class="border-2">Nama Program Studi</th>
                <th class="border-2">Deskripsi CPL</th>
            </tr>
            @foreach ($cpl as $c )
                <tr>
                    <td class="border-2">{{ $c->nama_kode_cpl }}</td>
                    <td class="border-2">
                       <form action="{{ route('cpl.destroy', $c) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('cpl.edit', $c) }}">Edit</a>
                    </td>
                    <td class="border-2">{{ $c->programstudi->nama_prodi }}</td>
                    <td class="border-2">{{ $c->desc }}</td>
                </tr>
            @endforeach
        </table> 
    </div>



    <div class="ml-72 mx-8 mt-24 "> 
        
    {{-- bagian mapping --}}
        <h2 class="text-2xl font-bold mb-4">Tabel Korelasi CPL dengan Profil Lulusan (PL)</h2>
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia neque nobis quas provident cum dolorum? Blanditiis perferendis culpa illum adipisci accusamus, provident, 
            odit porro pariatur dolor repudiandae labore fugit asperiores?
        </p>
    
        <a href="mapping/edit-cpl-pl" class="mt-12 mb-2 text-white bg-[#5FA9C8] px-2 py-2 rounded-lg hover:bg-[#2b7798]">Edit</a>
    
        {{-- tabel mapping cpl --}}
        <table border="1" cellpadding="5" class="border-black mt-4 w-full text-center mb-24 rounded-md"> 
            <tr class="border-2 bg-gray-300">
                <th class="border-2 bg-gray-300">Kode CPL</th>
                @foreach ($profil_lulusan as $pl)
                    <th class="border-2">{{ $pl->kode_pl }}</th>
                @endforeach
            </tr>

            @foreach ($cpl as $c)
                <tr>
                    <td class="border-2">{{ $c->nama_kode_cpl }}</td>
                    @foreach ($profil_lulusan as $pl)
                        @php
                            $cek = isset($cpl_pl_map[$c->id_cpl]) && in_array($pl->id_pl, $cpl_pl_map[$c->id_cpl]);
                        @endphp
                        <td class="border-2 text-center text-xl">
                            {!! $cek ? 'ada' : '' !!} 
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>

        {{-- table mapping cpl peo --}}
        <h2 class="text-2xl font-bold mb-4">Tabel Korelasi CPL dengan Programme Educational Objective (PEO)</h2>
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia neque nobis quas provident cum dolorum? Blanditiis perferendis culpa illum adipisci accusamus, provident, 
            odit porro pariatur dolor repudiandae labore fugit asperiores?
        </p>
        <table border="1" cellpadding="5" class="mt-4 w-full text-center mb-24">
            <tr>
                <th class="border-2">Kode CPL</th>
                @foreach ($peo as $p)
                    <th class="border-2">{{ $p->kode_peo }}</th>
                @endforeach
            </tr>

            @foreach ($cpl as $c)
                <tr>
                    <td class="border-2">{{ $c->nama_kode_cpl }}</td>
                    @foreach ($peo as $p)
                        @php
                            $cek = isset($cpl_peo_map[$c->id_cpl]) && in_array($p->id_peo, $cpl_peo_map[$c->id_cpl]);
                        @endphp
                        <td class="border-2 text-center text-xl">
                            {!! $cek ? 'V' : '' !!}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>


    </div>

    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>