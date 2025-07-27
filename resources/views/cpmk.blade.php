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
    @livewireStyles


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
        <h2 class="text-2xl font-bold mb-4">CRUD Capaian Pembelajaran Mata Kuliah (CPMK) </h2>
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
                <th class="border-2">Deskripsi CPMK</th>
            </tr>
            @foreach ($cpmk as $cp )
                <tr >
                    <td class="border-2">{{ $cp->nama_kode_cpmk }}</td>
                    <td class="border-2">{{ $cp->desc_cpmk_id }}</td>
                </tr>
            @endforeach
        </table>

        {{-- ======================================================================================================== --}}
        {{-- tabel sub cpmk --}}
        <h2 class="text-2xl font-bold">CRUD Tabel Sub CPMK</h2>
        <p class="text-gray-600 mb-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus molestiae maxime eius doloribus accusantium doloremque ea! 
            Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus 
            molestiae maxime eius doloribus accusantium doloremque ea! Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. 
        </p>

        <a href="{{ route('sub-cpmk.create') }}">Tambah </a>
        <a href="{{ route('sub-cpmk.editAll') }}">Edit </a>

        <table  border="1" cellpadding="5" class="w-full mb-24 text-center" > 
            <tr >
                <th class="border-2">Kode Sub CPMK</th>
                <th class="border-2">Sub CPMK</th>
                <th class="border-2">Nama Kode CPMK</th>
                <th class="border-2">Nama Program Studi</th>
            </tr>
            @foreach ($sub_cpmk as $scp )
                <tr >
                    <td class="border-2">{{ $scp->nama_kode_sub_cpmk }}</td>
                    <td class="border-2">{{ $scp->desc_sub_cpmk_id }}</td>
                    <td class="border-2">{{ $scp->cpmk->nama_kode_cpmk }}</td>
                    <td class="border-2">{{ $scp->programstudi->nama_prodi }}</td>
                </tr>
            @endforeach
        </table>

        {{-- ======================================================================================================== --}}

        {{-- mapping mk dengan cpmk coi --}}
        
        <h2 class="text-2xl font-bold">Tabel Mapping Antara Mata Kuliah dan CPMK</h2>
        <a href="{{ route('mk-cpmk-mapping.edit') }}">Edit </a>
        <p class="text-gray-600 mb-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus molestiae maxime eius doloribus accusantium doloremque ea! 
            Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus 
            molestiae maxime eius doloribus accusantium doloremque ea! Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. 
        </p>
        <table border="1" cellpadding="5" class="w-full mb-24 text-center">
            <thead>
                <tr>
                    <th class="border-2">Mata Kuliah</th>
                    @foreach ($cpmk as $cp)
                        <th class="border-2">{{ $cp->nama_kode_cpmk }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($mata_kuliah as $mk)
                    <tr>
                        <td class="border-2">{{ $mk->nama_matkul_id }}</td>
                        @foreach ($cpmk as $cp)
                            <td class="border-2">
                                @if ($mk->cpmks->contains($cp))
                                    v
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>      

        {{-- ======================================================================================================== --}} 
        {{-- mapping antara cpmk dan cpl --}}
        <h2 class="text-2xl font-bold">Tabel Mapping Antara CPMK dengan Capaian Profil Lulusan (CPL)</h2>
        <a href="{{ route('cpmk-cpl-mapping.edit') }}">Edit </a>
        <p class="text-gray-600 mb-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus molestiae maxime eius doloribus accusantium doloremque ea! 
            Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus 
            molestiae maxime eius doloribus accusantium doloremque ea! Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. 
        </p>
        <table  border="1" cellpadding="5" class="w-full mb-24 text-center" > 
            <thead>
                <tr >
                    <th class="border-2">Kode CPMK</th>
                    @foreach ($cpl as $c)
                        <th class="border-2">{{$c->nama_kode_cpl}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ( $cpmk as $cp )
                    <tr >
                        <td class="border-2">{{ $cp->nama_kode_cpmk }}</td>
                        @foreach ($cpl as $c )
                            <td class="border-2">
                                @if ($cp->cpl->contains($c))
                                    v
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table> 

        {{-- bk cpmk --}}
        <h2 class="text-2xl font-bold">Tabel Mapping Antara BK dan CPMK</h2>
        <p class="text-gray-600 mb-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus molestiae maxime eius doloribus accusantium doloremque ea! 
            Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum, neque totam repellendus 
            molestiae maxime eius doloribus accusantium doloremque ea! Odit magnam qui fuga perferendis impedit provident velit, sint recusandae temporibus. 
        </p>
            <table border="1" cellpadding="5" class="w-full mb-24 text-center">
                <thead >
                    <tr>
                        <th class="border-2">Mata Kuliah</th>
                        <th class="border-2">Bahan Kajian Terkait</th>
                        <th  class="border-2">CPMK Terkait</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mata_kuliah as $mk)
                        <tr>
                            <td class="border-2"">
                                {{ $mk->kode_mk }} - {{ $mk->nama_matkul_id }}
                            </td>
                            <td class="border-2">
                                @if (isset($bk_mk_map[$mk->id_mk]))
                                    <ul class="list-disc list-inside">
                                        @foreach ($bk_mk_map[$mk->id_mk] as $bk_id)
                                            @php
                                                // Cari objek Bahan Kajian berdasarkan ID
                                                $bk_item = $bahan_kajian->firstWhere('id_bk', $bk_id);
                                            @endphp
                                            @if ($bk_item)
                                                <li>{{ $bk_item->nama_kode_bk }} - {{ $bk_item->nama_bk }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Tidak ada Bahan Kajian terkait.</p>
                                @endif
                            </td>
                            <td class="border-2">
                                @if (isset($mk_cpmk_sub_cpmk_map[$mk->id_mk]))
                                    <ul class="list-disc list-inside">
                                        @foreach ($mk_cpmk_sub_cpmk_map[$mk->id_mk] as $cpmk_id => $sub_cpmk_ids)
                                            @php
                                                $cpmk_item = $cpmk->firstWhere('id_cpmk', $cpmk_id);
                                            @endphp
                                            @if ($cpmk_item)
                                                <li>
                                                    <strong>{{ $cpmk_item->nama_kode_cpmk }}</strong>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Tidak ada CPMK terkait.</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        {{-- ======================================================================================================== --}}

        {{-- mapping per matkul untuk memuncul cpmk dan sub cpmk --}}
        <h2 class="text-2xl font-bold mb-2">Mapping CPMK dan Sub CPMK Berdasarkan Mata Kuliah (pake Livewire)</h2>
   
        <div class="mb-24">
            <livewire:show-sub-cpmk/>
        </div>

   
    {{-- <script>
        alert("{{session('success')}}");
    </script> --}}
@livewireScripts

</body>
</html>