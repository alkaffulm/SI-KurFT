<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capaian Pembelajaran Lulusan (CPL)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
            {{-- Bagian CPL --}}
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Kurikulum</span>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">CPL</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">CAPAIAN PEMBELAJARAN LULUSAN (CPL)</h1>
                <p class="text-gray-600 mb-6">
                    CPL merupakan kompetensi yang diharapkan dimiliki mahasiswa setelah menyelesaikan program studi,
                    mencakup aspek sikap, pengetahuan, dan keterampilan.
                </p>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel CPL</h2>
                    <div class="space-x-2">
                        <a href="{{ route('cpl.editAll') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit CPL
                        </a>
                        <a href="{{ route('cpl.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah CPL
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-4">Kode CPL</th>
                                <th scope="col" class="px-6 py-4">Deskripsi CPL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cpl as $c)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400"
                                        title="{{ $c->desc_cpl_id }}">
                                        {{ $c->nama_kode_cpl }}
                                    </th>
                                    <td class="px-6 py-4 text-left">
                                        <p>{{ $c->desc_cpl_id }}</p>
                                        <p class="italic text-sm text-[#7397b6]">{{ $c->desc_cpl_en }}</p>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-t border-gray-400">
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                                        Data CPL masih kosong.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- menampilkan pagination --}}
                <div>
                    {{ $cpl->links() }}
                </div>

                {{-- Bagian Tabel Korelasi CPL dan PL --}}
                <h1 class="text-3xl font-bold text-teks-biru-custom mt-8 mb-4">Tabel Korelasi CPL dengan Profil Lulusan
                    (PL)
                </h1>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Korelasi CPL - PL</h2>
                    <a href="{{ route('cpl-pl-mapping.edit') }}"
                        class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Korelasi
                    </a>
                </div>
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-xs text-white  bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-3 uppercase">Kode CPL</th>
                                @forelse ($profil_lulusan as $pl)
                                    {{-- PERUBAHAN 1: Menambahkan title pada header PL --}}
                                    <th scope="col" class="px-6 py-3" title="{{ $pl->desc_pl_id }}">
                                        {{ $pl->kode_pl }}
                                    </th>
                                @empty
                                    <th scope="col" class="px-6 py-3 text-gray-200 italic font-normal">
                                         PL Belum Ditetapkan
                                    </th>                                
                                @endforelse
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cpl as $c)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $c->nama_kode_cpl }}
                                    </th>
                                    @foreach ($profil_lulusan as $pl)
                                        @php
                                            $isChecked =
                                                isset($cpl_pl_map[$c->id_cpl]) &&
                                                in_array($pl->id_pl, $cpl_pl_map[$c->id_cpl]);
                                        @endphp
                                        <td class="px-6 py-4 border-r border-gray-400">
                                            @if ($isChecked)
                                                <span class="text-black-500 font-bold">✓</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">Data Korelasi CPL-PL Masih Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $cpl->links() }}
                </div>

                {{-- Bagian Tabel Korelasi CPL dan PEO --}}
                <h1 class="text-3xl font-bold text-teks-biru-custom mt-8 mb-4">Tabel Korelasi CPL dengan Programme
                    Educational Objective (PEO)</h1>
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-xs text-white  bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="uppercase px-6 py-3">Kode CPL</th>
                                @forelse ($peo as $p)
                                    {{-- PERUBAHAN 2: Menambahkan title pada header PEO --}}
                                    <th scope="col" class="px-6 py-3" title="{{ $p->desc_peo_id }}">
                                        {{ $p->kode_peo }}
                                    </th>
                                @empty
                                    <th scope="col" class="px-6 py-3 text-gray-200 italic font-normal">
                                         PEO Belum Ditetapkan
                                    </th>
                                @endforelse
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cpl as $c)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $c->nama_kode_cpl }}
                                    </th>
                                    @foreach ($peo as $p)
                                        @php
                                            $hasRelation =
                                                isset($cpl_peo_map[$c->id_cpl]) &&
                                                in_array($p->id_peo, array_unique($cpl_peo_map[$c->id_cpl] ?? []));
                                        @endphp
                                        <td class="px-6 py-4 border-r border-gray-400">
                                            @if ($hasRelation)
                                                <span class="text-black-500 font-bold">✓</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">Data Korelasi CPL-PEO Masih Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
