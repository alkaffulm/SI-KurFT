<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit CPMK untuk setiap CPL per Mata Kuliah</title>
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

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 max-w-4xl mx-auto">
                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah Kelas untuk Setiap Tahun Akademik</h1>
                        <p class="text-gray-500 mt-2 text-base">Tambah Kelas Sesuai dengan Tahun Akademik Sesuai dan Kurikulum</p>
                    </div>

                {{-- ini buat formnya --}}
                {{-- <livewire:form-kelas-selector/> --}}
                <livewire:form-kelas-selector />



                {{-- button --}}
                <a href="{{ route('kelas.index') }}" {{-- Ganti route kembali ke cpl.index --}}
                    class="mt-12 px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    Kembali
                </a>

        </main>
    </div>

    {{-- Script to initialize Select2 --}}
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Pilih CPL untuk Mata Kuliah ini",
                allowClear: true
            });
        });
    </script>
</body>

</html>
