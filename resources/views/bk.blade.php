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

        <table border="1" cellpadding="5" class="w-full"> 
            <tr>
                <th class="border-2">Kode BK</th>
                <th class="border-2">aksi</th>
                <th class="border-2">Nama Program Studi</th>
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
                    <td class="border-2">{{ $bk->programstudi->nama_prodi }}</td>
                    <td class="border-2">{{ $bk->nama_bk }}</td>
                    <td class="border-2">{{ $bk->desc_bk_id }}</td>
                </tr>
            @endforeach
        </table>        
    </div>

    {{-- cpl dengan bk --}}
    <div class="mt-20 ml-72 mr-8">
        <h2 class="text-2xl font-bold mb-4">Tabel BK Berdasarkan CPL Program Studi (CPL)</h2>
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia neque nobis quas provident cum dolorum? Blanditiis perferendis culpa illum adipisci accusamus, provident, 
            odit porro pariatur dolor repudiandae labore fugit asperiores?
        </p>

        <a href="{{ route('bk-cpl-mapping.edit') }}" class="mt-12 mb-2 text-white bg-[#5FA9C8] px-2 py-2 rounded-lg hover:bg-[#2b7798]">Edit</a>

        {{-- tabel mapping cpl --}}
        <table border="1" cellpadding="5" class="border-black mt-4 w-full text-center mb-24 rounded-md"> 
            <tr class="border-2 bg-gray-300">
                <th class="border-2 bg-gray-300">Kode CPL</th>
                <th class="border-2 bg-gray-300">Bahan Kajian</th>
            </tr>
            <tr class="font-bold bg-gray-100">
            </tr>
            @foreach ($cpl as $c)
                <tr>
                    <td class="border-2 text-2xl">{{$c->nama_kode_cpl}}</td>
                    <td class="border-2 py-10">
                        @foreach ($bahan_kajian as $bk)
                            @php
                                $cek = isset($bk_cpl_map[$c->id_cpl]) && in_array($bk->id_bk, $bk_cpl_map[$c->id_cpl]);
                            @endphp
                            @if ($cek)
                                <p class="text-2xl text-left">
                                    BK-{{ $bk->id_bk }} {{ $bk->nama_bk }}
                                </p>
                            @endif
                        @endforeach
                    </td>

                </tr>
            @endforeach
        </table>
    </div>

    {{-- bk dengan mk --}}
    <div class="mt-20 ml-72 mr-8">
        <h2 class="text-2xl font-bold mb-4">Tabel BK Berdasarkan Mata Kuliah Program Studi (CPL)</h2>
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia neque nobis quas provident cum dolorum? Blanditiis perferendis culpa illum adipisci accusamus, provident, 
            odit porro pariatur dolor repudiandae labore fugit asperiores?
        </p>

        <a href="{{ route('bk-mk-mapping.edit') }}" class="mt-12 mb-2 text-white bg-[#5FA9C8] px-2 py-2 rounded-lg hover:bg-[#2b7798]">Edit</a>

        {{-- Tabel Mapping MK ke BK --}}
        <table border="1" cellpadding="5" class="border-black mt-4 w-full text-center mb-24 rounded-md"> 
            <tr class="border-2 bg-gray-300">
                <th class="border-2 bg-gray-300">ID Mata Kuliah</th>
                <th class="border-2 bg-gray-300">Mata Kuliah</th>
                @foreach ($bahan_kajian as $bk)
                    <th class="border-2 bg-gray-300 text-xl">BK-{{ $bk->id_bk }}</th>
                @endforeach
            </tr>

            @foreach ($mata_kuliah as $mk)
                <tr>
                    <td class="border-2 text-left text-xl px-4 py-2">
                        MK-{{ $mk->id_mk }} 
                    </td>
                    <td class="border-2 text-left text-xl px-4 py-2">
                       {{ $mk->nama_matkul_id }}
                    </td>

                    @foreach ($bahan_kajian as $bk)
                        @php
                            $cek = isset($bk_mk_map[$bk->id_bk]) && in_array($mk->id_mk, $bk_mk_map[$bk->id_bk]);
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