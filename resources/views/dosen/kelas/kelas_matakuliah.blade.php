<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas yang diampu</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">
    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
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
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Kelas Per Mata Kuliah</span>
                        </div>
                    </li>
                </ol>
            </nav>

            {{-- Tampilkan Tabel Kelas yang Diampu oleh dosen ini tapi pilih dulu  --}}
            <!-- KOTAK KONTEN PUTIH DENGAN SHADOW -->
            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Kelas untuk Setiap Kurikulum</h1>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Daftar Kelas</h2>
                    <!-- Di sini bisa ditambahkan tombol 'Tambah' jika suatu saat diperlukan -->
                </div>

                <!-- TABEL DENGAN DESAIN BARU -->
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="text-center px-6 py-3 border-r border-gray-400">Kurikulum</th>
                                <th scope="col" class="text-center px-6 py-3 border-r border-gray-400">Tahun Akademik</th>
                                <th scope="col" class="text-center px-6 py-3 border-r border-gray-400">Mata Kuliah</th>
                                <th scope="col" class="text-center px-6 py-3 border-r border-gray-400">ID Mata Kuliah</th>
                                <th scope="col" class="text-center px-6 py-3 border-r border-gray-400">ID Kelas</th>
                                <th scope="col" class=" text-center px-6 py-3 border-r border-gray-400">Urutan Paralel</th>
                                <th scope="col" class=" text-center px-6 py-3 border-r border-gray-400">Jumlah Mahasiswa</th>
                                <th scope="col" colspan="3" class=" text-center px-6 py-3 border-r border-gray-400">Mahasiswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kelas as $k)
                                <tr class="bg-white border-b hover:bg-gray-50 text-black">
                                    <td class="text-center px-6 py-4">{{ $k->tahun_kurikulum }}</td>
                                    <td class="text-center px-6 py-4">{{ $k->tahun_akademik }}</td>
                                    <td class="text-center px-6 py-4">{{ $k->nama_matkul_id }}</td>
                                    <td class="text-center px-6 py-4">{{ $k->kode_mk }}</td>
                                    <td class="text-center px-6 py-4">{{ $k->id_kelas }}</td>
                                    <td class="text-center px-6 py-4">{{ $k->paralel_ke}}</td>
                                    <td class="text-center px-6 py-4">
                                        {{ $k->jumlah_mhs}}
                                    </td>
                                    <td class="text-center px-6 py-4">
                                        <a class="text-black hover:underline" href="{{ route('dosen.kelas.lihat', $k->id_kelas) }}">Lihat Daftar Mahasiswa</a>
                                    </td>
                                    <td class="text-center px-6 py-4">
                                        <a class="text-black hover:underline" href="{{ route('dosen.kelas.penilaian', $k->id_kelas) }}">Penilaian Mahasiswa</a>
                                    </td>
                                    <td class="text-center px-6 py-4">
                                        <a class="text-yellow-600 hover:underline" href="{{ route('capaian_ratarata.index', $k->id_kelas) }}">Capaian Rata-Rata</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4 text-gray-500">Belum ada kelas yang diampu</td>
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
