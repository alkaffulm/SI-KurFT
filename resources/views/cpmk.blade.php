<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPMK dan Sub-CPMK</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
    @livewireStyles
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
            {{-- Bagian 1: Tabel CPMK --}}
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
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">CPMK</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md mb-8">

                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">CAPAIAN PEMBELAJARAN MATA KULIAH (CPMK)</h1>
                <p class="text-gray-600 mb-6">
                    CPMK adalah kemampuan spesifik yang dijabarkan dari CPL yang dibebankan pada mata kuliah, yang dapat
                    diukur dan dinilai.
                </p>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel CPMK</h2>
                    <div class="space-x-2">
                        <a href="{{ route('cpmk.editAll') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit CPMK
                        </a>
                        <a href="{{ route('cpmk.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah CPMK
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-4">Kode CPMK</th>
                                <th scope="col" class="px-6 py-4">Deskripsi CPMK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cpmk as $cp)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $cp->nama_kode_cpmk }}
                                    </th>
                                    <td class="px-6 py-4 text-left">
                                        <p>{{ $cp->desc_cpmk_id }}</p>
                                        <p class="italic text-sm text-[#7397b6]">{{ $cp->desc_cpmk_en }}</p>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-t border-gray-400">
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                                        Data CPMK masih kosong.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- menampilkan pagination --}}
                <div>
                    {{ $cpmk->links() }}
                </div>

                {{-- Bagian 2: Tabel Sub-CPMK --}}
                <div class="flex justify-between items-center mt-8 mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Sub-CPMK</h2>
                    <div class="space-x-2">
                        <a href="{{ route('sub-cpmk.editAll') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Sub-CPMK
                        </a>
                        <a href="{{ route('sub-cpmk.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Sub-CPMK
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-4">Kode Sub-CPMK</th>
                                <th scope="col" class="px-6 py-4">Deskripsi Sub-CPMK</th>
                                <th scope="col" class="px-6 py-4">CPMK Induk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sub_cpmk as $scp)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $scp->nama_kode_sub_cpmk }}
                                    </th>
                                    <td class="px-6 py-4 text-left border-r border-gray-400">
                                        <p>{{ $scp->desc_sub_cpmk_id }}</p>
                                        <p class="italic text-sm text-[#7397b6]">{{ $scp->desc_sub_cpmk_en }}</p>
                                    </td>
                                    <td class="px-6 py-4 border-r border-gray-400">
                                        {{ $scp->cpmk?->nama_kode_cpmk ?? 'Belum Terhubung' }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-t border-gray-400">
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                        Data Sub-CPMK masih kosong.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- menampilkan pagination --}}
                <div>
                    {{ $sub_cpmk->links() }}
                </div>

                {{-- Bagian 3: Tabel Mapping MK dan CPL dengan CPMK --}}
                <div class="flex justify-between items-center mt-12 mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Korelasi Mata Kuliah dan CPL dengan CPMK</h2>
                    <div>
                        <a href="{{ route('mk-cpl-mapping.edit') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Korelasi CPL per Mata Kuliah
                        </a>
                        <a href="{{ route('cpl-cpmk-mapping.edit') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Korelasi CPMK per CPL
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500 table-fixed">
                        <thead class="text-sm text-white  bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="uppercase px-3 py-6 w-64">Mata Kuliah</th>
                                @forelse ($cpl as $cp)
                                    <th scope="col" class="px-3 py-6 w-32" title="{{ $cp->desc_cpl_id }}">
                                        {{ $cp->nama_kode_cpl }}
                                    </th>
                                @empty
                                    <th scope="col" class="px-6 py-3 text-gray-200">
                                        CPL Belum Ditetapkan
                                    </th>
                                @endforelse
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mata_kuliah as $mk)
                                <tr class="bg-white border-t border-gray-400">
                                    <th class="px-6 py-4 border-r text-left whitespace-normal">
                                        {{ $mk->nama_matkul_id }}
                                    </th>
                                    @foreach ($cpl as $cp)
                                        <td class="px-6 py-4 border-r">
                                            @php
                                                $relatedCpmkObjects = [];
                                                if (isset($mk_cpmk_cpl_map[$mk->id_mk][$cp->id_cpl])) {
                                                    foreach ($mk_cpmk_cpl_map[$mk->id_mk][$cp->id_cpl] as $cpmkId) {
                                                        $cpmkObj = $cpmkAll->firstWhere('id_cpmk', $cpmkId);
                                                        if ($cpmkObj) {
                                                            $relatedCpmkObjects[] = $cpmkObj;
                                                        }
                                                    }
                                                }
                                            @endphp
                                            @if (!empty($relatedCpmkObjects))
                                                <ul class="list-disc list-inside text-left">
                                                    @foreach ($relatedCpmkObjects as $cpmkData)
                                                        <li title="{{ $cpmkData->desc_cpmk_id }}">
                                                            {{ $cpmkData->nama_kode_cpmk }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">Data MK Masih Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{$mata_kuliah->links()}}
                </div>

                {{-- bagian pembobotan untuk setiap cpmk di dalam mata kuliah --}}
                <h2 class="text-xl font-bold text-biru-custom mt-8 mb-4">Tabel Bobot CPMK untuk Setiap Mata Kuliah</h2>
                <p class="text-gray-600 mb-6 text-justify">
                    Setiap Mata Kuliah memiliki CPMK yang telah diatur. Setiap CPMK di dalam Mata Kuliah memiliki bobotnya masing-masing. Total seluruh bobot untuk seluruh CPMK di dalam satu Mata Kuliah harus bernilai <strong>100</strong> 
                </p>
                {{-- ambil livewirenya --}}
                <livewire:mk-cpmk-bobot />


                {{-- bagian pembobotan CPMK ke CPL --}}
                {{-- <h2 class="text-xl font-bold text-biru-custom mt-8 mb-4">Tabel Bobot CPMK - CPL (Capaian Pembelajaran Lulusan)</h2>
                <livewire:pembobotan-cpmk-cpl> --}}

                {{-- Bagian 5: Livewire Component --}}
                <h2 class="text-xl font-bold text-biru-custom mt-8 mb-4">Detail Sub-CPMK per Mata Kuliah</h2>
                <livewire:show-sub-cpmk />
            </div>
        </main>
    </div>

    @livewireScripts

    {{-- Script untuk menangkap session flash data --}}
    <script>
        // Cek Session Sukses
        @if (session('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}", // Mengambil pesan dari Controller
                icon: "success",
                confirmButtonColor: "#3085d6", // Sesuaikan warna dengan tema projectmu
                confirmButtonText: "Oke"
            });
        @endif

        // Cek Session Error (Opsional, buat jaga-jaga)
        @if (session('error'))
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonColor: "#d33",
                confirmButtonText: "Tutup"
            });
        @endif
    </script>
</body>

</html>
