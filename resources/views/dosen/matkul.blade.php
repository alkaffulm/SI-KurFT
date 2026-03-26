<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Pembelajaran Semester (RPS)</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/LOGO_ULM.png') }}" type="image/x-icon">
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

            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Rencana Pembelajaran Semester (RPS)</h1>

                
                <!-- Tabel Matkul Homebase-->
                @if (session('userRoleId' ) != 16)
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-biru-custom">Daftar Mata Kuliah</h2>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-400">
                        <table class="table-auto w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-white uppercase bg-teks-biru-custom text-center">
                                <tr>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400">Kode MK</th>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-[110px]">RPS</th>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-48">Nama Mata Kuliah</th>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-[110px]">SKS</th>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-[110px]">Semester</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tanggungJawabDosen as $tjd )
                                    <tr class="bg-white border-t border-gray-400">
                                        <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                                            {{ $tjd->kode_mk }}
                                        </td>
                                        <td class="px-6 py-4 border-r border-gray-400 text-center">
                                            @if ($tjd->rps->where('id_kurikulum', session('id_kurikulum_aktif'))->first() )
                                                <a href="{{ route('rps.show', $tjd->rps->where('id_kurikulum', session('id_kurikulum_aktif'))->first()) }}" class="font-medium text-blue-600 hover:underline">Lihat RPS</a>
                                            @elseif($tjd->id_pengembang_rps == Auth::id())
                                                <a href="{{ route('rps.create', ['id_mk' => $tjd->id_mk]) }}" class="font-medium text-green-600 hover:underline">Buat RPS</a>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4  border-r border-gray-400">
                                            <p>{{ $tjd->nama_matkul_id }}</p> 
                                            <p class="italic text-sm text-[#7397b6]">{{ $tjd->nama_matkul_en }}</p>
                                        </td>
                                        <td class="px-6 py-4 text-center border-r border-gray-400">
                                            {{ $tjd->jumlahSks }}
                                        </td>
                                        <td class="px-6 py-4 text-center border-r border-gray-400">
                                            {{ $tjd->semester }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr >
                                        <td colspan="6" class="p-4 text-center ">Belum Ada Mata Kuliah Yang Diampu</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{$tanggungJawabDosen->links()}}
                    </div>
                @endif


                {{-- Tabel Matkul Lintas Prodi --}}
                <div class=" mb-8 rounded-lg bg-white">
                    <h2 class="text-xl font-bold text-biru-custom mb-4">Daftar Mata Kuliah Lintas Prodi yang Diampu</h2>
                    {{-- Contoh list mata kuliah --}}
                    <div class=" my-4">
                        <div class="overflow-x-auto rounded-lg border border-gray-400">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-center text-white uppercase bg-teks-biru-custom">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 border-r border-gray-400">Kode MK</th>
                                        <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-[110px]">RPS</th>
                                        <th scope="col" class="px-6 py-3 border-r border-gray-400">Program Studi</th>
                                        <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-48">Nama Mata Kuliah</th>
                                        <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-[110px]">SKS</th>
                                        <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-[110px]">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $kelas as $itemKelas )
                                        <tr class="bg-white border-t border-gray-400">
                                            <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                                                {{ $itemKelas->mataKuliahModel->kode_mk }}
                                            </td>
                                            <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900 text-center">
                                                @if($itemKelas->mataKuliahModel->rps->isNotEmpty())
                                                    @php 
                                                        $rps = $itemKelas->mataKuliahModel->rps->first(); 
                                                    @endphp
                                                    <a href="{{ route('rps.show', $rps->id_rps) }}" class="font-medium text-blue-600 hover:underline">
                                                        Lihat RPS
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                                                {{ $itemKelas->mataKuliahModel->programStudi->nama_prodi }}
                                            </td>
                                            <td class="px-6 py-4 border-r border-gray-400">
                                                <p>{{ $itemKelas->mataKuliahModel->nama_matkul_id }}</p> 
                                                <p class="italic text-sm text-[#7397b6]">{{ $itemKelas->mataKuliahModel->nama_matkul_en }}</p>
                                            </td>
                                            <td class="px-6 py-4 border-r border-gray-400 text-center">
                                                {{ $itemKelas->mataKuliahModel->jumlahSks }}
                                            </td>
                                            <td class="px-6 py-4 border-r border-gray-400 text-center">
                                                {{ $itemKelas->mataKuliahModel->semester }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr >
                                            <td colspan="6" class="p-4 text-center ">Belum Ada Mata Kuliah Yang Diampu</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
    </div>

</body>
</html>

