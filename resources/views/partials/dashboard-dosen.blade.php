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
        <div class="bg-white p-8 rounded-2xl shadow-lg flex justify-between items-center gap-4">
            <div>
                <h1 class="text-4xl font-bold text-biru-custom">Selamat Datang,</h1>
                <h2 class="text-3xl font-bold text-gray-800 mt-2">{{ session('userName', '-') }}
                </h2>
            </div>
            <div>
                {{-- You can place your illustration SVG or image file here --}}
                <img src="{{ asset('images/Workspace with laptop and table lamp.png') }}" alt="Dashboard Illustration" class="h-40 hidden sm:block flex-shrink-0 object-contain">
            </div>
        </div>
            {{-- End Welcome Card --}}

        {{-- matkul dosen homebase, ditarik dari MataKuliahModel --}}
        @if (session('userRoleId') != 16)
            <div class="p-8 mt-8 mb-8 rounded-lg bg-white">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Mata Kuliah yang Diampu</h2>
                {{-- Contoh list mata kuliah --}}
                <div class=" my-4">
                    @livewire('mata-kuliah-dashboard')
                </div>
            </div>
        @endif

        {{-- matkul dosen Umum, ditarik dari KelasModel --}}
            <div class="p-8 mt-8 mb-8 rounded-lg bg-white">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Mata Kuliah Lintas Prodi yang Diampu</h2>
                {{-- Contoh list mata kuliah --}}
                <div class=" my-4">
                    <div class="overflow-x-auto rounded-lg border border-gray-400">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-white uppercase bg-teks-biru-custom text-center">
                                <tr>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400">Kode MK</th>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-48">Program Studi</th>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-48">Nama Mata Kuliah</th>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-[110px]">SKS</th>
                                    <th scope="col" class="px-6 py-3 border-r border-gray-400 min-w-[110px]">Semester</th>
                                    <th scope="col" class="px-6 py-3">Kurikulum</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $kelas as $itemKelas )
                                    <tr class="bg-white border-t border-gray-400">
                                        <td class="px-6 py-4 border-r border-gray-400 font-medium text-gray-900">
                                            {{ $itemKelas->mataKuliahModel->kode_mk }}
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
                                        <td class="px-6 py-4 text-center">
                                            {{ $itemKelas->mataKuliahModel->kurikulum->tahun }}
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
    </mainlass=>
</div>
