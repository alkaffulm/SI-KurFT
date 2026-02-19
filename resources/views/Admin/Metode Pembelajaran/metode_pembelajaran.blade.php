<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembelajaran</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
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
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Metode Pembelajaran</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Metode Pembelajaran</h1>
                <p class="text-gray-600 mb-6 text-justify">
                        Cara atau pendekatan praktis yang digunakan dosen dalam interaksi belajar-mengajar. Metode bersifat lebih mikro dibanding model, 
                        dan merupakan implementasi nyata dalam kegiatan perkuliahan sehari-hari.
                </p>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Metode Pembelajaran</h2>
                    <div class="space-x-2">
                        <a href="{{ route('metode-pembelajaran.edit') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Metode Pembelajaran
                        </a>
                        <a href="{{ route('metode-pembelajaran.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Metode Pembelajaran
                        </a>
                    </div>
                </div>

                {{-- Tabel Metode Pembelajaran --}}
                <div class="overflow-hidden rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-white uppercase bg-teks-biru-custom">
                            <tr>
                                {{-- <th scope="col" class="px-6 py-4 whitespace-nowrap">
                                    Nomor
                                </th> --}}
                                <th scope="col" class="px-6 py-4">
                                    Nama Metode Pembelajaran
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Tipe Metode Pembelajaran
                                </th>
                                {{-- <th scope="col" class="px-6 py-4">
                                    Kategori Teknik Penilaian
                                </th> --}}
                            </tr>
                        </thead>
                            <tbody>
                                @forelse ($metode_pembelajaran as $mp)
                                    <tr class="bg-white border-t border-gray-400">
                                        {{-- <th scope="row"
                                            class="py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">
                                            {{ $loop->iteration }}
                                        </th> --}}
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">
                                            {{ $mp->nama_metode_pembelajaran }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">
                                            {{ $mp->tipe_metode_pembelajaran }}
                                        </th>
                                        {{-- <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">
                                            {{ $tp->kategori }}
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr class="bg-white border-t border-gray-400">
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                            Data Kriteria Penilaian masih kosong.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                    </table>
                </div>
                {{-- menampilkan pagination --}}
                {{-- <div>
                   {{$peo->links()}} 
                </div> --}}
            </div>
        </main>
    </div>

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
