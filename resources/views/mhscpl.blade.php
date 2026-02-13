<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capaian Pembelajaran Lulusan (CPL) Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.0.1/dist/chartjs-plugin-annotation.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.0.1/dist/chartjs-plugin-annotation.min.js"></script> --}}
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole ?? null])
    @include('layouts.sidebar', ['userRole' => $userRole ?? null])

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li><span class="text-sm text-gray-500">Laporan > </span></li>
                    <li><span class="text-sm font-medium text-gray-900">Laporan CPL Mahasiswa</span></li>
                </ol>
            </nav>

            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-black mb-6">CAPAIAN PEMBELAJARAN LULUSAN (CPL) MAHASISWA</h1>
                @livewire('laporan-cpl-mahasiswa')
            </div>
        </main>
    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>
