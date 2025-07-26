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
        <h2 class="text-2xl font-bold">Tabel Pembentukan Mata Kuliah (MK)</h2>
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia neque nobis quas provident cum dolorum? Blanditiis perferendis culpa illum adipisci accusamus, provident, 
            odit porro pariatur dolor repudiandae labore fugit asperiores?
        </p>

        <a href="{{ route('mata-kuliah.create') }}">Tambah </a>
        <a href="{{ route('mata-kuliah.editAll')}}">Edit</a>

        <br><br>

        {{-- tabel penjelasan mata kuliah  --}}
        <table border="1" cellpadding="5" class="w-full mb-24 text-center">
            <tr class="bg-gray-300">
                <th class="border-2" rowspan="2">Kode Mata Kuliah</th>
                <th class="border-2" rowspan="2">Nama Mata Kuliah</th>
                <th class="border-2" rowspan="2">Deskripsi Indonesia</th>
                <th class="border-2" rowspan="2">Deskripsi Inggris</th>
            </tr>
            <tbody>
                @foreach ($mata_kuliah as $mk)
                    <tr>
                        <td class="border-2">{{ $mk->kode_mk }}</td>
                        <td class="border-2">{{ $mk->nama_matkul_id }}</td>
                        <td class="border-2 text-left px-2">{{ $mk->matkul_desc_id }}</td>
                        <td class="border-2 text-left px-2">{{ $mk->matkul_desc_en }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- tabel susunan mata kuliah  per semester--}}
        <h2 class="text-2xl font-bold">Tabel Susunan Mata Kuliah (MK)</h2>
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia neque nobis quas provident cum dolorum? Blanditiis perferendis culpa illum adipisci accusamus, provident, 
            odit porro pariatur dolor repudiandae labore fugit asperiores?
        </p>
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



    {{-- mapping bk, mk, dan cpl --}}
    <div class="mt-20 mr-8">
        <h2 class="text-2xl font-bold mb-4">Tabel Pemetaan BK-CPL (Capaian Pembelajaran Lulusan) - MK</h2>
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia neque nobis quas provident cum dolorum? Blanditiis perferendis culpa illum adipisci accusamus, provident, 
            odit porro pariatur dolor repudiandae labore fugit asperiores?
        </p>
        {{-- Tabel Mapping MK ke BK --}}
        <table border="1" cellpadding="5" class="border-black mt-4 w-full text-center mb-24 rounded-md"> 
            <tr class="border-2 bg-gray-300">
                <th class="border-2 bg-gray-300">BK/CPL</th>
                @foreach ($cpl as $c)
                    <th class="border-2 bg-gray-300 text-xl">{{ $c->nama_kode_cpl }}</th>
                @endforeach
            </tr>
            @foreach ($bahan_kajian as $bk)
                <tr>
                    <td class="border-2 text-left text-xl px-4 py-2">
                        {{ $bk->nama_kode_bk }} 
                    </td>
                    {{-- isi kolom ini adalah kode_mk yang mana id_mknya sesuai dengan id_bk dan ic_cpl --}}
                    @foreach ($cpl as $c)
                        <td class="border-2 text-sm px-2 py-1">
                            @if (isset($bk_cpl_map[$c->id_cpl]) && in_array($bk->id_bk, $bk_cpl_map[$c->id_cpl]))
                                @php
                                    $mk_ids = $bk_mk_map[$bk->id_bk] ?? [];
                                    $kode_mk_list = collect($mata_kuliah)
                                        ->whereIn('id_mk', $mk_ids)
                                        ->pluck('kode_mk')
                                        ->toArray();
                                @endphp
                                {{ implode(', ', $kode_mk_list) }}
                            @else
                                -
                            @endif
                        </td>
                    @endforeach

                </tr>
            @endforeach
        </table>
    </div>
    
    {{-- tabel bobot sks  --}}
    <h2 class="text-2xl font-bold mb-4">Tabel Bobot SKS</h2>
    <p class="mb-4">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia neque nobis quas provident cum dolorum? Blanditiis perferendis culpa illum adipisci accusamus, provident, 
        odit porro pariatur dolor repudiandae labore fugit asperiores?
    </p>
    <table border="1" cellpadding="5" class="w-full mb-24 text-center">
        <tr class="bg-gray-300">
            <th class="border-2" rowspan="2">Kode Mata Kuliah</th>
            <th class="border-2" rowspan="2">Nama Mata Kuliah</th>
            <th class="border-2" rowspan="2">CPL yang Dibebankan</th>
            <th class="border-2" rowspan="2">Bobot SKS</th>
        </tr>
        <tbody>
            @foreach ($mata_kuliah as $mk)
                <tr>
                    <td class="border px-2">{{ $mk->kode_mk }}</td>
                    <td class="border px-2">{{ $mk->nama_matkul_id }}</td>
                    <td class="border px-2">
                        @php
                            $related_cpl_ids = $mk_cpl_map[$mk->id_mk] ?? [];
                            $related_cpls = collect($cpl)
                                ->whereIn('id_cpl', $related_cpl_ids)
                                ->pluck('nama_kode_cpl')
                                ->toArray();
                        @endphp
                        {{ implode(', ', $related_cpls) ?: '-' }}
                    </td>
                    {{-- bobot sks sesuai dengan id_mk --}}
                    <td  class="border px-2">
                        {{ $mk->jumlah_sks }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    </div>



    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>