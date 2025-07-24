<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programme Educational Objective (PEO)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="p-8 sm:ml-64">
        <main class="mt-16">
            <div class="bg-white p-8 rounded-lg shadow-md">
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
                                <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">PEO</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl font-bold text-gray-900 mb-4">PROGRAMME EDUCATIONAL OBJECTIVE (PEO)</h1>
                <p class="text-gray-600 mb-6">
                    Nilai-nilai utama secara resmi dinyatakan sebagai Tujuan Pendidikan Program (Program Educational
                    Objectives/PEO). Nilai-nilai utama ini dirumuskan sesuai dengan visi dan misi universitas, fakultas
                    teknik, dan program studi teknik elektro. Perumusan nilai-nilai utama ini umumnya mempertimbangkan
                    saran dari pengguna, dewan penasihat, alumni, dan asosiasi profesi.
                </p>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel PEO</h2>
                    <div class="space-x-2">
                        <a href="{{ route('peo.editAll') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit PEO
                        </a>
                        <a href="{{ route('peo.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah PEO
                        </a>
                    </div>
                </div>

                <div class="overflow-hidden rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-4 whitespace-nowrap">
                                    Kode PEO
                                </th>
                                <th scope="col" class="px-6 py-4 whitespace-nowrap">
                                    Nama Program Studi
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Deskripsi PEO
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($peo as $p)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">
                                        {{ $p->kode_peo }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400 text-center">
                                        {{ $p->programstudi->nama_prodi}}
                                    </th>
                                    <td class="px-6 py-4 text-left">
                                        {{ $p->desc_peo }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-t border-gray-400">
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                                        Data PEO masih kosong.
                                    </td>
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
