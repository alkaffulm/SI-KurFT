{{-- resources/views/kurikulum.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/logo ulm 1.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <title>SI-KurFT Kurikulum</title>
</head>
<body class="bg-gray-100 font-sans">
    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])
    {{-- Bagian CRUD Tabel Kurikulum --}}
    <div class="flex flex-col gap-12 mt-24 ml-72 mr-10">
        {{-- bagian judul atas tabel --}}
        <div class="flex flex-col text-justify">
            <h1 class="font-bold text-5xl">
                Kurikulum 
            </h1>
            <p class="mt-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore eaque magnam distinctio eius deserunt, autem eveniet velit, 
                cum non aperiam quaerat temporibus, repellat fuga maiores? Nihil cum similique atque fuga! Lorem ipsum dolor sit amet, consectetur 
                adipisicing elit. Inventore eaque magnam distinctio eius deserunt, autem eveniet velit, cum non aperiam quaerat temporibus, repellat fuga 
                maiores? Nihil cum similique atque fuga
            </p>
        </div>

        {{-- bagian tombol tambah data --}}
        <a href="/kurikulum/create/"  class="px-4 py-2 bg-yellow-300 w-44 font-sm text-center rounded-lg hover:bg-yellow-500">
            Tambah Kurikulum
        </a>

        {{-- bagian tabel --}}
        <div class="w-full mb-24">
            <table class="px-6 py-2 text-center table-auto border-2 border-black w-full">
                {{-- bagian head --}}
                <thead class="bg-gray-200 border">
                    <th class="px-2 py-4">ID Kurikulum</th>
                    <th class="px-2 py-4">ID Program Studi</th>
                    <th class="px-2 py-4">Program Studi</th>
                    <th class="px-2 py-4">Tahun Kurikulum</th>
                    <th class="py-4" colspan="2">Aksi</th>
                </thead>

                {{-- bagian isi tabel --}}
                @foreach ($kurikulum as $klm)
                    <tr class="bg-white border-t border-gray-300">
                        <td class="px-2 py-4">
                            {{$klm->id_kurikulum}}
                        </td>
                        <td class="px-2 py-4">
                            {{$klm->id_ps}}
                        </td>
                        <td class="px-2 py-4">
                            {{ $programStudi->where('id_ps', $klm->id_ps)->first()->nama_prodi ?? '-' }}
                        </td>
                        <td class="px-2 py-4">
                            {{$klm->tahun}}
                        </td>
                        <td class="px-2 py-4 ">
                            <form action="/kurikulum/{{ $klm->id_kurikulum }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-300 rounded-md px-4 py-2 hover:bg-red-600" type="submit">Hapus</button>
                            </form>
                        </td>
                        <td class="px-2 py-4 ">
                            <a href="/kurikulum/{{$klm->id_kurikulum}}/edit" class="bg-yellow-300 rounded-md px-4 py-2 hover:bg-yellow-500">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>



    </div>
</body>
</html>
