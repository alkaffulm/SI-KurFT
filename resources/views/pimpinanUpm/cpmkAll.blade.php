<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPMK dan Sub-CPMK</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/logo ulm 1.png') }}" type="image/x-icon">
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
                </div>

                @livewire('pimpinan-upm.cpmk-all')


                {{-- Bagian 2: Tabel Sub-CPMK --}}
                <div class="flex justify-between items-center mb-4 mt-8">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Sub-CPMK</h2>
                </div>

                @livewire('pimpinan-upm.sub-cpmk-all')

                {{-- Bagian 3: Tabel Mapping MK-CPMK-CPL --}}
                <div class="flex justify-between items-center mb-4 mt-8">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Korelasi Mata Kuliah dan CPL dengan CPMK</h2>
                </div>

                @livewire('pimpinan-upm.mapping-mk-cpmk-cpl-all')
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
