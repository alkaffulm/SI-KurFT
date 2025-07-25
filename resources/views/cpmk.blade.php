<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel CPMK</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    {{-- Select2 CSS and JS for searchable dropdowns --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Custom styles to make Select2 fit the Tailwind design --}}
    <style>
        .select2-container--default .select2-selection--multiple {
            border-radius: 0.5rem;
            /* rounded-lg */
            border-color: #D1D5DB;
            /* border-gray-300 */
            padding: 0.35rem;
            min-height: 42px;
            /* Sets a minimum height */
        }

        .select2-container {
            width: 100% !important;
            /* Forces the element to fill its container */
        }
    </style>
</head>
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="ml-72 mx-8 mt-24">


        {{-- <h2>Tabel CRUD CPMK</h2> --}}
        <h2 class="text-2xl font-bold mb-4">Capaian Pembelajaran Mata Kuliah (CPMK)</h2>
        <p class="text-gray-600 mb-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus molestiae maxime eius doloribus accusantium doloremque ea! 
            Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus 
            molestiae maxime eius doloribus accusantium doloremque ea! Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. 
        </p>        

        <a href="{{ route('cpmk.create') }}" class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>>
            Tambah 
        </a>
        <a href="{{ route('cpmk.editAll') }}"                             class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>>
            Edit 
        </a>

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

        {{-- tabel cpmknya --}}
        <table  cellpadding="5" border="1" class="w-full mt-6 mb-24 text-center"> 
            <tr >
                <th class="border-2">Kode CPMK</th>
                <th class="border-2">Deskripsi Bahasa Indonesia</th>
                <th class="border-2">Deskripsi Bahasa Inggris</th>
            </tr>
            @foreach ($cpmk as $cp )
                <tr >
                    <td class="border-2">{{ $cp->nama_kode_cpmk }}</td>
                    <td class="border-2">{{ $cp->desc_cpmk_id }}</td>
                    <td class="border-2">{{ $cp->desc_cpmk_en }}</td>
                </tr>
            @endforeach
        </table>


        {{-- ======================================================================================================== --}}

        {{-- mapping mk dengan cpmk coi --}}
        <h2 class="text-2xl font-bold">Tabel Mapping Antara Mata Kuliah dan CPMK</h2>
        <p class="text-gray-600 mb-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus molestiae maxime eius doloribus accusantium doloremque ea! 
            Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus 
            molestiae maxime eius doloribus accusantium doloremque ea! Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. 
        </p>
        <table  border="1" cellpadding="5" class="w-full mb-24 text-center" > 
            <tr >
                <th class="border-2">Kode Mata Kuliah</th>
                <th class="border-2 ">Deskripsi Mata Kuliah Indonesia</th>
                <th class="border-2 ">Deskripsi Mata Kuliah Inggris</th>
                <th class="border-2">Kode CPMK</th>
                <th class="border-2">Aksi</th>
            </tr>
            @foreach ($mata_kuliah as $mk )
                <tr >
                    <td class="border-2">{{ $mk->kode_mk }}</td>
                    <td class="border-2">{{ $mk->matkul_desc_id }}</td>
                    <td class="border-2">{{ $mk->matkul_desc_en }}</td>
                    <td class="border-2">
                        @php
                            $map = $mk_cpmk_sub_cpmk_map[$mk->id_mk] ?? null;
                        @endphp

                        @if ($map)
                            @foreach ($map as $id_cpmk => $sub_cpmk_ids)
                                @php
                                    $cpmk_found = $cpmk->firstWhere('id_cpmk', $id_cpmk);
                                @endphp

                                @if ($cpmk_found)
                                    <div>
                                        <strong>{{ $cpmk_found->nama_kode_cpmk }}</strong>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div><i>Tidak ada CPMK</i></div>
                        @endif
                    </td>

                    <td class="border-2">
                        <form action="{{ route('sub-cpmk.destroy', $mk) }}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form> 
                        | <a href="{{ route('sub-cpmk.edit', $mk) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>       
        {{-- ======================================================================================================== --}}
        {{-- tabel sub cpmk --}}
        <h2 class="text-2xl font-bold">Tabel Sub CPMK</h2>
        <p class="text-gray-600 mb-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus molestiae maxime eius doloribus accusantium doloremque ea! 
            Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus 
            molestiae maxime eius doloribus accusantium doloremque ea! Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. 
        </p>
        <a href="{{ route('sub-cpmk.create') }}">Tambah </a>
        <table  border="1" cellpadding="5" class="w-full mb-24 text-center" > 
            <tr >
                <th class="border-2">Kode Sub CPMK</th>
                <th class="border-2">Nama Kode CPMK</th>
                <th class="border-2 ">aksi</th>
                <th class="border-2">Nama Program Studi</th>
                <th class="border-2">Sub CPMK</th>
            </tr>
            @foreach ($sub_cpmk as $scp )
                <tr >
                    <td class="border-2">{{ $scp->nama_kode_sub_cpmk }}</td>
                    <td class="border-2">{{ $scp->cpmk->nama_kode_cpmk }}</td>
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

        {{-- mapping per matkul untuk memuncul cpmk dan sub cpmk --}}
        <h2 class="text-2xl font-bold mb-2">Mapping CPMK dan Sub CPMK Berdasarkan Mata Kuliah</h2>
   

    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
    
</body>
</html>