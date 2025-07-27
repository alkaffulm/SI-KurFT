<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Kajian (BK)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
            {{-- Bagian Bahan Kajian --}}
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
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Bahan Kajian</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">BAHAN KAJIAN (BK)</h1>
                <p class="text-gray-600 mb-6">
                    Bahan Kajian (BK) merupakan komponen-komponen ilmu atau materi yang membentuk suatu program studi
                    dan menjadi dasar penyusunan mata kuliah.
                </p>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Bahan Kajian</h2>
                    <div class="space-x-2">
                        <a href="{{ route('bahan-kajian.editAll') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit BK
                        </a>
                        <a href="{{ route('bahan-kajian.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah BK
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-4">Kode BK</th>
                                <th scope="col" class="px-6 py-4">BK</th>
                                <th scope="col" class="px-6 py-4">Deskripsi BK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bahan_kajian as $bk)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $bk->nama_kode_bk }}
                                    </th>
                                    <td class="px-6 py-4 text-left border-r border-gray-400">
                                        {{ $bk->nama_bk }}
                                    </td>
                                    <td class="px-6 py-4 text-left">
                                        {{ $bk->desc_bk_id }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-t border-gray-400">
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                        Data Bahan Kajian masih kosong.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Bagian Tabel Korelasi BK dan CPL --}}
                <h1 class="text-3xl font-bold text-teks-biru-custom mt-8 mb-4">Tabel Pemetaan Bahan Kajian terhadap CPL</h1>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Korelasi BK - CPL</h2>
                    <a href="{{ route('bk-cpl-mapping.edit') }}"
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
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-3">Kode CPL</th>
                                <th scope="col" class="px-6 py-3">Bahan Kajian Terkait</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cpl as $c)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $c->nama_kode_cpl }}
                                    </th>
                                    <td class="px-6 py-4 text-left">
                                        <div class="flex flex-wrap gap-2">
                                            {{-- *** CHANGE IS HERE *** --}}
                                            @php $found = false; @endphp
                                            @foreach ($bahan_kajian as $bk)
                                                @if (isset($bk_cpl_map[$c->id_cpl]) && in_array($bk->id_bk, $bk_cpl_map[$c->id_cpl]))
                                                    <span
                                                        class="bg-gray-200 text-gray-800 text-xs font-medium px-2.5 py-1 rounded-full">
                                                        {{ $bk->nama_kode_bk }} - {{ $bk->nama_bk }}
                                                    </span>
                                                    @php $found = true; @endphp
                                                @endif
                                            @endforeach
                                            @if (!$found)
                                                <span class="text-gray-400">Tidak ada</span>
                                            @endif
                                            {{-- *** END CHANGE *** --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Bagian Tabel Korelasi BK dan MK --}}
                <h1 class="text-3xl font-bold text-teks-biru-custom mt-8 mb-4">Tabel Pemetaan Bahan Kajian terhadap Mata
                    Kuliah</h1>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Korelasi BK - MK</h2>
                    <a href="{{ route('bk-mk-mapping.edit') }}"
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
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                {{-- *** CHANGE IS HERE *** --}}
                                <th scope="col" class="px-6 py-3">Kode MK</th>
                                <th scope="col" class="px-6 py-3">Mata Kuliah</th>
                                {{-- *** END CHANGE *** --}}
                                @foreach ($bahan_kajian as $bk)
                                    <th scope="col" class="px-6 py-3">
                                        {{ $bk->nama_kode_bk }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mata_kuliah as $mk)
                                <tr class="bg-white border-t border-gray-400">
                                    {{-- *** CHANGE IS HERE *** --}}
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $mk->kode_mk }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-left">
                                        {{ $mk->nama_matkul_id }}
                                    </th>
                                    {{-- *** END CHANGE *** --}}
                                    @foreach ($bahan_kajian as $bk)
                                        @php
                                            $isChecked =
                                                isset($bk_mk_map[$bk->id_bk]) &&
                                                in_array($mk->id_mk, $bk_mk_map[$bk->id_bk]);
                                        @endphp
                                        <td class="px-6 py-4 border-r border-gray-400">
                                            @if ($isChecked)
                                                <span class="text-black-500 font-bold">✓</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
