<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
            {{-- Bagian 1: Tabel Mata Kuliah --}}
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
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Mata Kuliah</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Mata Kuliah</h1>
                <p class="text-gray-600 mb-6">
                    Mata Kuliah adalah unit pembelajaran yang mencakup serangkaian topik atau bahan kajian tertentu,
                    yang dirancang untuk mencapai Capaian Pembelajaran Lulusan (CPL).
                </p>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Pembentukan Mata Kuliah</h2>
                    <div class="space-x-2">
                        <a href="{{ route('mata-kuliah.editAll') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit MK
                        </a>
                        <a href="{{ route('mata-kuliah.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah MK
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500 table-fixed">
                        <thead class=" text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-3 py-4 w-24">Kode MK</th>
                                <th scope="col" class="px-3 py-4 w-48">Nama Mata Kuliah</th>
                                <th scope="col" class="px-3 py-4 w-24">RPS</th>
                                <th scope="col" class="px-3 py-4  w-48">Pengembang RPS</th>
                                <th scope="col" class="px-3 py-4 w-48">Koordinator MK</th>
                                <th scope="col" class="px-3 py-4 w-24">Semester</th>
                                <th scope="col" class="px-3 py-4 w-24">SKS</th>   
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mata_kuliah as $mk)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $mk->kode_mk }}
                                    </th>
                                    <td class="px-3 py-4 text-left border-r border-gray-400">
                                        <p>{{ $mk->nama_matkul_id }}</p>
                                        <p class="italic text-sm text-[#7397b6]">{{ $mk->nama_matkul_en }}</p>
                                    </td>
                                    <td class="px-3 py-4  border-r border-gray-400">
                                        @if ($mk->rps->where('id_kurikulum', session('id_kurikulum_aktif'))->first() )
                                            <a href="{{ route('rps.show', $mk->rps->where('id_kurikulum', session('id_kurikulum_aktif'))->first()) }}" class="font-medium text-blue-600 hover:underline">Lihat RPS</a>
                                        @else
                                            {{-- <a href="{{ route('rps.create', ['id_mk' => $mk->id_mk]) }}" class="font-medium text-green-600 hover:underline">Buat RPS</a> --}}
                                            <i>Belum Ada RPS</i>
                                        @endif
                                    </td>
                                    <td class="px-3 py-4 text-left border-r border-gray-400">
                                        <p>{{ $mk->pengembangRps->username ?? 'Pengembang RPS Belum Ditentukan'}} </p>
                                    </td>
                                    <td class="px-3 py-4 text-left border-r border-gray-400">
                                        <p>{{ $mk->koordinatorMk->username ?? 'Koordinator Mata Kuliah Belum Ditentukan'}}</p>
                                    </td>                                  
                                    <td class="px-3 py-4 border-r border-gray-400">
                                        <p class="text-center">{{ $mk->semester }}</p>
                                    </td>
                                    <td class="px-3 py-4 border-r border-gray-400">
                                        <p class="text-center">{{ $mk->jumlahSks }}</p>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-t border-gray-400">
                                    <td colspan="6" class="px-3 py-4 text-center text-gray-500">
                                        Data Mata Kuliah masih kosong.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- menampilkan pagination --}}
                <div>
                    {{$mata_kuliah->links()}}
                </div>

                {{-- Bagian 2: Tabel Susunan Mata Kuliah per Semester --}}
                <h2 class="text-xl font-bold text-biru-custom mt-8 mb-4">Tabel Susunan Mata Kuliah</h2>
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" rowspan="2" class="px-6 py-3">Kode MK
                                </th>
                                <th scope="col" rowspan="2" class="px-6 py-3">Nama MK
                                </th>
                                <th scope="col" rowspan="2" class="px-6 py-3">SKS</th>
                                <th scope="col" colspan="8" class="px-6 py-3">Semester</th>
                            </tr>
                            <tr>
                                @for ($i = 1; $i <= 8; $i++)
                                    <th scope="col" class="px-4 py-3">
                                        {{ $i }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mata_kuliah as $mk)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $mk->kode_mk }}
                                    </th>
                                    <td class="px-6 py-4 text-left border-r border-gray-400">
                                        {{ $mk->nama_matkul_id }}
                                    </td>
                                    <td class="px-6 py-4 border-r border-gray-400">
                                        {{ $mk->jumlahSks }}
                                    </td>
                                    @for ($i = 1; $i <= 8; $i++)
                                        <td class="px-6 py-4 border-r border-gray-400">
                                            @if ($mk->semester == $i)
                                                <span class="text-black-500 font-bold">✓</span>
                                            @endif
                                        </td>
                                    @endfor
                                </tr>
                            @empty
                                <tr class="bg-white border-t border-gray-400">
                                    <td colspan="11" class="px-6 py-4 text-center text-gray-500">
                                        Data Susunan Mata Kuliah masih kosong.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- menampilkan pagination --}}
                <div>
                    {{$mata_kuliah->links()}}
                </div>

                {{-- Bagian 3: Tabel Pemetaan BK-CPL-MK --}}
                {{-- <h2 class="text-xl font-bold text-biru-custom mt-8 mb-4">Tabel Pemetaan BK - CPL - MK</h2>
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-3">BK / CPL</th>
                                @foreach ($cpl as $c)
                                    <th scope="col" class="px-6 py-3">{{ $c->nama_kode_cpl }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody> --}}
                            {{-- @foreach ($bahan_kajian as $bk)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $bk->nama_kode_bk }}
                                    </th>
                                    @foreach ($cpl as $c)
                                        <td class="px-2 py-1 border-r border-gray-400 text-xs">
                                            @if ($bk->cpls->contains('id_cpl', $c->id_cpl)) --}}
                                                {{-- Tampilkan semua MK yang berelasi dengan BK ini --}}
                                                {{-- {{ $bk->mataKuliah->pluck('kode_mk')->implode(', ') }}
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach --}}
                        {{-- </tbody>
                    </table>
                </div> --}}



                {{-- Bagian 4: Tabel Bobot SKS --}}
                <h2 class="text-xl font-bold text-biru-custom mt-8 mb-4">Tabel Bobot SKS</h2>
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-4">Kode MK</th>
                                <th scope="col" class="px-6 py-4">Nama Mata Kuliah</th>
                                <th scope="col" class="px-6 py-4">CPL yang Dibebankan</th>
                                <th scope="col" class="px-6 py-4">Bobot SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mata_kuliah as $mk)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $mk->kode_mk }}
                                    </th>
                                    <td class="px-6 py-4 text-left border-r border-gray-400">
                                        {{ $mk->nama_matkul_id }}
                                    </td>
                                    <td class="px-6 py-4 border-r border-gray-400 text-center">
                                         {{$mk->uniqueCpls}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $mk->jumlah_sks }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-t border-gray-400">
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        Data Bobot SKS masih kosong.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{$mata_kuliah->links()}}
                </div>
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
