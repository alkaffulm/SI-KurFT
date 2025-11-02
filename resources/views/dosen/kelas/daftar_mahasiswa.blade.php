<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa per Kelas</title>
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

        @if ($kelas->mahasiswa->isEmpty())

            <div class="mt-20 max-w-8xl mx-auto">
                <div class="bg-white p-4 rounded-xl shadow-lg">
                    <a href="{{ route('dosen_kelas.index') }}"
                        class="mt-2 inline-block px-4 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        Kembali
                    </a>
                    <div class="mt-5">
                        <h1 class="text-3xl font-bold text-gray-700">Daftar Mahasiswa Tidak Ditemukan</h1>
                        <p class="text-gray-500 text-base">Belum ada mahasiswa yang terdaftar di kelas ini, silahkan hubungi admin program studi anda</p>
                    </div>
                </div>
            </div>
        @else
            <main class="mt-20 max-w-8xl mx-auto">
                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    {{-- button --}}
                    <a href="{{ route('dosen_kelas.index') }}"
                        class="mb-12 mt-12 px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        Kembali
                    </a>

                    <div class="mb-5 mt-12">
                        <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Daftar Mahasiswa Kelas</h1>
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-biru-custom">List Daftar Mahasiswa untuk Ini</h2>
                        </div>
                    </div>

                    {{-- table per mahasiswa per kelas --}}
                    <div class="overflow-x-auto rounded-lg border border-gray-400 mt-12">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                                <tr>
                                    <th scope="col" class="text-center px-6 py-3 border-r border-gray-400">NIM</th>
                                    <th scope="col" class="text-center px-6 py-3 border-r border-gray-400">Nama Lengkap</th>
                                    <th scope="col" class="text-center px-6 py-3 border-r border-gray-400">Angkatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas->mahasiswa as $mhs)
                                    <tr class="text-black">
                                        <td class="text-center px-6 py-4">{{ $mhs->nim }}</td>
                                        <td class="text-center px-6 py-4">{{ $mhs->nama_lengkap }}</td>
                                        <td class="text-center px-6 py-4">{{ $mhs->angkatan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        @endif

    </div>

    {{-- Script to initialize Select2 --}}
    {{-- <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Pilih CPL untuk Mata Kuliah ini",
                allowClear: true
            });
        });
    </script> --}}
</body>

</html>
