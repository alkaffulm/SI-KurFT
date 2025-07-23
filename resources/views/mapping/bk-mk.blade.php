<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Profi Lulusan</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</head>
<body>
    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])


    <div class="ml-72 mx-8 mt-24 mb-24">
        <a href="../bahan-kajian" class="mr-2 px-10 py-2 text-white bg-[#5FA9C8] rounded-lg hover:bg-[#2b7798]">
            Kembali
        </a>
        {{-- bagian judul --}}
        <div class="flex flex-col gap-4 mt-4">
            <h1 class="font-bold text-3xl">Edit Tabel Bahan Kajian Berdasarkan Mata Kuliah Program Studi (bk)</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem inventore mollitia ab soluta accusamus ducimus, tempore praesentium at cumque nemo cupiditate est, 
                odit illo ratione. Cum, nulla id. At, totam.
            </p>
        </div>

        {{-- bagian tabel untuk mapping --}}
        <div class="flex flex-col">
            {{-- Form action menunjuk ke route update yang baru --}}
            <form action="{{ route('bk-mk-mapping.update') }}" name="editBKMK" method="post">
                @csrf
                @method('PUT')
                <table border="1" cellpadding="5" class="mb-2 text-center w-full mt-4"> 
                    <tr class="bg-gray-300">
                        <th class="border-2" rowspan="2">Kode bk</th>
                        <th class="border-2" colspan="1">Kode Bahan Kajian</th>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="border-2">Pilihan Kode mk</td>
                    </tr>
                    @foreach ($bahan_kajian as $bk)
                        <tr>
                            <td class="border-2">BK-{{$bk->id_bk}}</td>
                            <td class="border-2">
                                {{-- Tambahkan name attribute dan value untuk option --}}
                            <select class="select2 w-full" multiple="multiple" style="width:100%" name="mk_mappings[{{ $bk->id_bk }}][]">
                                    @foreach ($mata_kuliah as $mk)
                                        <option value="{{ $mk->id_mk }}" 
                                            @if (isset($bk_mk_map[$bk->id_bk]) && in_array($mk->id_mk, $bk_mk_map[$bk->id_bk])) 
                                                selected 
                                            @endif>
                                            {{ $mk->id_mk }} - {{ $mk->nama_mk }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </table>  
                <button type="submit" class="w-36 mb-24 px-4 py-2 text-white bg-[#5FA9C8] rounded-lg hover:bg-[#2b7798]">Ubah Data</button>
            </form>
        </div>

    </div>



    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>