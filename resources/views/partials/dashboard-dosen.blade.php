{{-- Main Content --}}
<div class="px-8">
    <main>
        {{-- Breadcrumb --}}
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Menu Utama</span>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Dashboard</span>
                    </div>
                </li>
            </ol>
        </nav>
        {{-- End Breadcrumb --}}

        {{-- Welcome Card --}}
        <div class="bg-white p-8 rounded-2xl shadow-lg flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-biru-custom">Selamat Datang,</h1>
                <h2 class="text-3xl font-bold text-gray-800 mt-2">{{ session('userName', 'Andreyan Rizky Baskara') }}
                </h2>
            </div>
            <div>
                {{-- You can place your illustration SVG or image file here --}}
                <img src="{{ asset('images/Workspace with laptop and table lamp.png') }}" alt="Dashboard Illustration" class="h-40">
            </div>
        </div>
            {{-- End Welcome Card --}}
        <div class="p-4 mt-8 mb-8 rounded-lg bg-white">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Mata Kuliah yang Diampu</h2>
            <p>Selamat datang, Dosen. Halaman ini berisi daftar mata kuliah yang Anda ampu. Silakan pilih mata kuliah untuk
            mengelola RPS dan memasukkan nilai asesmen mahasiswa.</p>
            {{-- Contoh list mata kuliah --}}
            <div class="overflow-x-auto rounded-lg border border-gray-400 my-4">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-r border-gray-400">Kode MK</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-400">Pengembang RPS</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-400">Koordinator MK</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-400">Nama Mata Kuliah</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-400">SKS</th>
                            <th scope="col" class="px-6 py-3">Semester</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tanggungJawabDosen as $tjd )
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                                    {{ $tjd->kode_mk }}
                                </td>
                                <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                                    {{ $tjd->pengembangRps->username }}
                                </td>
                                <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                                    {{ $tjd->koordinatorMk->username }}
                                </td>
                                <td class="px-6 py-4 border-r border-gray-400">
                                    <p>{{ $tjd->nama_matkul_id }}</p> 
                                    <p class="italic text-sm text-[#7397b6]">{{ $tjd->nama_matkul_en }}</p>
                                </td>
                                <td class="px-6 py-4 border-r border-gray-400">
                                    {{ $tjd->jumlahSks }}
                                </td>
                                <td class="px-6 py-4">
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
        </div>
    </mainlass=>
</div>
