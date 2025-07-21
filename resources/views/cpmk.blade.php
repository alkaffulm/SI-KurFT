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

        <table  cellpadding="5" > 
            <tr >
                <th class="border-2">Kode MK</th>
                <th class="border-2 ">aksi</th>
                <th class="border-2">Nama MK</th>
                <th class="border-2">CPMK</th>
            </tr>
            @foreach ($cpmk as $cp )
                <tr >
                    <td class="border-2">{{ $cp->id_mk }}</td>
                    <td class="border-2">
                        <form action="{{ route('cpmk.destroy', $cp) }}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('cpmk.edit', $cp) }}">Edit</a>
                    </td>
                    <td class="border-2">{{ $cp->matakuliah->nama_matkul }}</td>
                    <td class="border-2">{{ $cp->desc }}</td>
                </tr>
            @endforeach
        </table>

        <h2 class="text-2xl font-bold">Sub CPMK</h2>

        <a href="{{ route('sub-cpmk.create') }}">Tambah </a>


        <table  cellpadding="5" > 
            <tr >
                <th class="border-2">Kode Sub CPMK</th>
                <th class="border-2 ">aksi</th>
                <th class="border-2">Sub CPMK</th>
            </tr>
            @foreach ($sub_cpmk as $scp )
                <tr >
                    <td class="border-2">{{ $scp->id_sub_cpmk }}</td>
                    <td class="border-2">
                        <form action="{{ route('sub-cpmk.destroy', $scp) }}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('sub-cpmk.edit', $scp) }}">Edit</a>
                    </td>
                    <td class="border-2">{{ $scp->desc }}</td>
                </tr>
            @endforeach
        </table>

        {{-- <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-md text-white uppercase bg-[#264450] ">
                    <tr class="">
                        <th scope="col" class="px-6 py-3 border border-gray-700">
                            Kode Mata Kuliah
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-700">
                            Nama Mata Kuliah
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-700">
                            CPMK
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-700">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cpmk as $cp)
                        <tr class="bg-white border-b  border-gray-200 ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-700">
                                {{$cp->id_mk}}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-700">
                                {{$cp->matakuliah->nama_matkul}}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-700">
                                {{$cp->desc}}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-700">
                                <form action="{{ route('cpmk.destroy', $cp) }}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form> 
                                | <a href="{{ route('cpmk.edit', $cp) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div> --}}


        {{-- <section class="bg-gray-50  p-3 sm:p-5">
            <div class="mx-auto  ">
            <!-- Start coding here -->
            <div class="bg-white  relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{route('cpmk.create')}}" class="flex items-center justify-center text-gray-500 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2  focus:outline-none ">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambah
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-50 ">
                        <thead class="text-xs text-white uppercase bg-[#264450] ">
                            <tr>
                                <th scope="col" class="px-4 py-3">Kode Mata Kuliah</th>
                                <th scope="col" class="px-4 py-3">Nama Mata Kuliah</th>
                                <th scope="col" class="px-4 py-3">CPMK</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cpmk as $cp)
                                <tr class="border-b ">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap border border-gray-700">{{$cp->id_mk}}</th>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap border border-gray-700">{{$cp->matakuliah->nama_matkul}}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap border border-gray-700">{{$cp->desc}}</td>
                                    <td class="px-4 py-3 flex items-center justify-end border border-gray-700">
                                        <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none " type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="apple-imac-27-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                                            <ul class="py-1 text-sm text-gray-700" aria-labelledby="apple-imac-27-dropdown-button">
                                                <li>
                                                    <a href="{{ route('cpmk.edit', $cp) }}" class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                                                </li>
                                            </ul>
                                                <div class="py-1">
                                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 ">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>    
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </section>  --}}
    </div>
    

    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>