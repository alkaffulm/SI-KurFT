{{-- resources/views/kurikulumAdd(test).blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/logo ulm 1.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <title>SI-KurFT Tambah Kurikulum</title>
</head>
<body class="bg-gray-100 font-sans">
    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])
    {{-- Bagian CRUD Tabel Kurikulum --}}
    <div class="flex flex-col gap-8 mt-24 ml-72 mr-10 mb-24">
        {{-- bagian judul atas tabel --}}
        <div class="flex flex-col text-justify">
            {{-- bagian tombol kembali --}}
            <a href="/kurikulum"  class="mb-12 px-4 py-2 bg-yellow-300 w-24 font-sm text-center rounded-lg hover:bg-yellow-500">
                Kembali
            </a>
            <h1 class="font-bold text-5xl">
                Tambah Kurikulum 
            </h1>
            <p class="mt-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore eaque magnam distinctio eius deserunt, autem eveniet velit, 
                cum non aperiam quaerat temporibus, repellat fuga maiores? Nihil cum similique atque fuga! Lorem ipsum dolor sit amet, consectetur 
                adipisicing elit. Inventore eaque magnam distinctio eius deserunt, autem eveniet velit, cum non aperiam quaerat temporibus, repellat fuga 
                maiores? Nihil cum similique atque fuga
            </p>
        </div>

        {{-- bagian form input kurikulum --}}
        <div class="bg-white rounded-lg w-full h-96 p-10">
            <h1 class="font-bold text-4xl mb-4">
                Form Tambah Data
            </h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit atque in deleniti! Laborum iusto ab reprehenderit alias quisquam sunt cumque 
                veritatis vitae unde nam molestiae, veniam delectus natus. Est, itaque!
            </p>

            {{-- form --}}
            <form action="{{ route('kurikulum.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                {{-- Input ID Program Studi --}}
                <div>
                    <label for="id_ps" class="mb-1 font-semibold text-gray-700">ID Program Studi: </label> 
                    @error('id_ps')
                        {{$message}}
                    @enderror
                    <select name="id_ps" id="id_ps" class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        <option value="" disabled selected>---Silahkan pilih Program Studi---</option>
                        @foreach ( $programStudi as $ps )
                            <option value="{{$ps->id_ps}}">{{$ps->id_ps}}-{{$ps->nama_prodi}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- input tahun kurikulum --}}
                <div>
                    <label for="tahun" class="mb-1 font-semibold text-gray-700">Tahun Kurikulum:</label>
                    @error('tahun')
                        {{$message}}
                    @enderror
                    <input class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" type="text" id="tahun" name="tahun" required>
                </div>

                {{-- Tombol Submit --}}
                <div>
                    <button type="submit" class="px-4 py-2 bg-yellow-300 text-black rounded hover:bg-yellow-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
