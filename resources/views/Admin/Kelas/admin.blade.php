<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Admin SiKurFT</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
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
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Role Admin</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md mb-8">

                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Role Admin</h1>
                <p class="text-gray-600 mb-6">
                    Pindahkan ke halaman admin kena jop lah
                </p>

                {{-- @livewire('kurikulum-tahun-selector') --}}
                {{-- kurikulum dan tahun akademik --}}
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold text-biru-custom">Tabel Tahun Akademik dan Kurikulum</h2>
                    <div class="space-x-2">
                        <a href="{{ route('ta-kurikulum-mapping.add') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Tahun Akademik
                        </a>
                    </div>
                </div>
                <livewire:kurikulum-tahun-selector />

                <br><br><br><br>
                <div class="flex justify-between items-center mb-4 mt-12">
                    <h2 class="text-2xl font-bold text-biru-custom">Tabel Kelas per Tahun Akademik dan Kurikulum</h2>
                    <div class="space-x-2">
                        <a href="{{ route('kelas.add') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Kelas
                        </a>
                    </div>
                </div>
                <livewire:tahun-kelas-selector />



    </div>

    @livewireScripts
</body>

</html>
