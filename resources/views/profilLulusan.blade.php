<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Profi Lulusan</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body>
    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])


    <div class="ml-72 mx-8 mt-24"> 
        <h2 class="text-2xl font-bold">Profil Lulusan (PL)</h2>

        <a href="{{ route('profil-lulusan.create') }}">Tambah </a>

        <table border="1" cellpadding="5" class="mb-20 text-center w-full"> 
            <tr class="bg-gray-100">
                <th class="border-2">ID Profil Lulusan</th>
                <th class="border-2">ID Program Studi</th>
                <th class="border-2">Deskripsi</th>
                <th class="border-2">Aksi</th>
            </tr>
            @foreach ($profil_lulusan as $pl )
                <tr>
                    <td class="border-2">{{$pl->id_pl}}</td>
                    <td class="border-2">{{$pl->id_ps}}</td>
                    <td class="border-2">{{$pl->desc}}</td>
                    <td class="border-2 mb-2">
                        <div class="flex flex-col gap-4">
                            <form action="{{ route('profil-lulusan.destroy', $pl) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-2 px-5 py-2 text-white bg-[#5FA9C8] rounded-lg hover:bg-[#2b7798]">
                                    Hapus
                                </button><br>
                            </form>
                            <a href="{{ route('profil-lulusan.edit', $pl) }}" class="ml-2 py-2 text-white bg-[#5FA9C8] rounded-lg hover:bg-[#2b7798]">
                                Edit
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>        
    </div>

    <div class="ml-72 mx-8 mt-4 mb-24">
        {{-- bagian judul --}}
        <div class="flex flex-col gap-4 ">
            <h1 class="font-bold text-3xl">Tabel Korelasi Profil Lulusan dan Programme Educational Objective (PEO)</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem inventore mollitia ab soluta accusamus ducimus, tempore praesentium at cumque nemo cupiditate est, 
                odit illo ratione. Cum, nulla id. At, totam.
            </p>
        </div>

        {{-- bagian tombol edit dan tambah --}}
        <div class="text-right mt-4 mb-4">
            {{-- button edit --}}
            <a href="mapping/edit-pl-peo" class="mr-2 px-10 py-2 text-white bg-[#5FA9C8] rounded-lg hover:bg-[#2b7798]">
                Edit
            </a>
        </div>

        {{-- bagian tabel untuk mapping --}}
        <div>
            <table border="1" cellpadding="5" class="mb-20 text-center w-full mt-4"> 
                <tr class="bg-gray-300">
                    <th class="border-2" rowspan="2">Kode Profil Lulusan</th>
                    {{-- Ganti colspan="18" ini dengan dinamis jika jumlah PEO bisa berubah --}}
                    <th class="border-2" colspan="{{ count($peo) }}">Programme Educational Objective (PEO)</th> 
                </tr>
                <tr class="bg-gray-100">
                    {{-- Loop melalui objek PEO untuk header --}}
                    @foreach ($peo as $p)
                        <td class="border-2">{{ $p->kode_peo }}</td>
                    @endforeach
                </tr>
                @foreach ($profil_lulusan as $pl )
                    <tr>
                        <td class="border-2">{{$pl->kode_pl}}</td>
                        @foreach ($peo as $p)
                            @php
                                $cek = isset($pl_peo_map[$pl->id_pl]) && in_array($p->id_peo, $pl_peo_map[$pl->id_pl]);
                            @endphp
                            <td class="border-2 text-center text-xl">
                                {!! $cek ? 'ada' : '' !!} 
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>  
        </div>

    </div>

    </div>



    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>