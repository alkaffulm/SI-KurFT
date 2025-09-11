<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Pembelajaran Semester (RPS)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <!-- STRUKTUR HALAMAN UTAMA (MENGIKUTI DESAIN BARU) -->
    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
            <!-- Breadcrumb untuk Navigasi -->
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Menu Utama</span>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">RPS</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- KOTAK KONTEN PUTIH DENGAN SHADOW -->
            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Rencana Pembelajaran Semester (RPS)</h1>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Daftar Mata Kuliah</h2>
                    <!-- Di sini bisa ditambahkan tombol 'Tambah' jika suatu saat diperlukan -->
                </div>

                <!-- TABEL DENGAN DESAIN BARU -->
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-3 border-r border-gray-400">Kode MK</th>
                                <th scope="col" class="px-6 py-3 border-r border-gray-400">Aksi</th>
                                <th scope="col" class="px-6 py-3 border-r border-gray-400">Nama Mata Kuliah</th>
                                <th scope="col" class="px-6 py-3 border-r border-gray-400">SKS</th>
                                <th scope="col" class="px-6 py-3">Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mata_kuliah as $mk )
                                <tr class="bg-white border-t border-gray-400">
                                    <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                                        {{ $mk->kode_mk }}
                                    </td>
                                    <td class="px-6 py-4 border-r border-gray-400">
                                        @if ($mk->rps->where('id_kurikulum', session('id_kurikulum_aktif'))->first() )
                                            <a href="{{ route('rps.show', $mk->rps->where('id_kurikulum', session('id_kurikulum_aktif'))->first()) }}" class="font-medium text-blue-600 hover:underline">Lihat RPS</a>
                                        @else
                                            <a href="{{ route('rps.create', ['id_mk' => $mk->id_mk]) }}" class="font-medium text-green-600 hover:underline">Buat RPS</a>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 border-r border-gray-400">
                                        {{ $mk->nama_matkul_id }}
                                    </td>
                                    <td class="px-6 py-4 border-r border-gray-400">
                                        {{ $mk->jumlahSks }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $mk->semester }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION DIBERI JARAK ATAS -->
                <div class="mt-4">
                    {{$mata_kuliah->links()}}
                </div>
            </div>
        </main>
    </div>

</body>
</html>

