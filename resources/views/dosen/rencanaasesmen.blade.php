<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Asesmen</title>
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
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Rencana Asesmen</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Rencana Asesmen</h1>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Rencana Asesmen Manajemen Proyek TI</h2>
                    <div class="space-x-2">
                        <a href="#"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Rencana Asesmen
                        </a>
                        <a href="#"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Rencana Asesmen
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-16 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-r">
                                    Komponen Evaluasi
                                </th>
                                <th scope="col" class="px-6 py-3 w-24 text-center">
                                    CPMK-1
                                </th>
                                <th scope="col" class="px-6 py-3 w-24 text-center">
                                    CPMK-2
                                </th>
                                <th scope="col" class="px-6 py-3 w-24 text-center">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">
                                    1
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                    Tugas 1 <br>
                                    <span class="text-xs text-gray-500 font-normal">Assignment 1</span><br>
                                    <span class="text-xs text-gray-500 font-normal italic">Studi Kasus (Case Method)</span>
                                </th>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    10%
                                </td>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    0%
                                </td>
                                <td class="px-6 py-4 text-center font-semibold text-gray-900">
                                    30%
                                </td>
                            </tr>
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">
                                    2
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                    Tugas 2 <br>
                                    <span class="text-xs text-gray-500 font-normal">Assignment 2</span><br>
                                    <span class="text-xs text-gray-500 font-normal italic">Studi Kasus (Case Method)</span>
                                </th>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    20%
                                </td>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    0%
                                </td>
                                <td class="px-6 py-4 text-center font-semibold text-gray-900">
                                    20%
                                </td>
                            </tr>
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">
                                    3
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                    Tugas 3 <br>
                                    <span class="text-xs text-gray-500 font-normal">Assignment 3</span><br>
                                    <span class="text-xs text-gray-500 font-normal italic">Studi Kasus (Case Method)</span>
                                </th>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    10%
                                </td>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    10%
                                </td>
                                <td class="px-6 py-4 text-center font-semibold text-gray-900">
                                    20%
                                </td>
                            </tr>
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">
                                    4
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                    Penilaian Tengah Semester <br>
                                    <span class="text-xs text-gray-500 font-normal">Mid Exam</span><br>
                                    <span class="text-xs text-gray-500 font-normal italic">Studi Kasus (Case Method)</span>
                                </th>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    15%
                                </td>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    0%
                                </td>
                                <td class="px-6 py-4 text-center font-semibold text-gray-900">
                                    30%
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="font-semibold text-gray-900 bg-white border-t border-gray-400">
                                <th scope="row" colspan="4" class="px-6 py-3 text-base text-left border-r border-gray-400">TOTAL CPMK</th>
                                <td class="px-6 py-3 text-center text-base">100%</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="flex justify-between items-center mt-8 mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Rencana Asesmen Struktur data</h2>
                    <div class="space-x-2">
                        <a href="#"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Rencana Asesmen
                        </a>
                        <a href="#"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Rencana Asesmen
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-16 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-r">
                                    Komponen Evaluasi
                                </th>
                                <th scope="col" class="px-6 py-3 w-24 text-center">
                                    CPMK-1
                                </th>
                                <th scope="col" class="px-6 py-3 w-24 text-center">
                                    CPMK-2
                                </th>
                                <th scope="col" class="px-6 py-3 w-24 text-center">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">
                                    1
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                    Tugas 1 <br>
                                    <span class="text-xs text-gray-500 font-normal">Assignment 1</span><br>
                                    <span class="text-xs text-gray-500 font-normal italic">Studi Kasus (Case Method)</span>
                                </th>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    10%
                                </td>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    0%
                                </td>
                                <td class="px-6 py-4 text-center font-semibold text-gray-900">
                                    30%
                                </td>
                            </tr>
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">
                                    2
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                    Tugas 2 <br>
                                    <span class="text-xs text-gray-500 font-normal">Assignment 2</span><br>
                                    <span class="text-xs text-gray-500 font-normal italic">Studi Kasus (Case Method)</span>
                                </th>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    20%
                                </td>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    0%
                                </td>
                                <td class="px-6 py-4 text-center font-semibold text-gray-900">
                                    20%
                                </td>
                            </tr>
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">
                                    3
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                    Tugas 3 <br>
                                    <span class="text-xs text-gray-500 font-normal">Assignment 3</span><br>
                                    <span class="text-xs text-gray-500 font-normal italic">Studi Kasus (Case Method)</span>
                                </th>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    10%
                                </td>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    10%
                                </td>
                                <td class="px-6 py-4 text-center font-semibold text-gray-900">
                                    20%
                                </td>
                            </tr>
                            <tr class="bg-white border-t border-gray-400">
                                <td class="px-6 py-4 text-center font-medium text-gray-900 border-r border-gray-400">
                                    4
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                    Penilaian Tengah Semester <br>
                                    <span class="text-xs text-gray-500 font-normal">Mid Exam</span><br>
                                    <span class="text-xs text-gray-500 font-normal italic">Studi Kasus (Case Method)</span>
                                </th>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    15%
                                </td>
                                <td class="px-6 py-4 text-center border-r border-gray-400">
                                    0%
                                </td>
                                <td class="px-6 py-4 text-center font-semibold text-gray-900">
                                    30%
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="font-semibold text-gray-900 bg-white border-t border-gray-400">
                                <th scope="row" colspan="4" class="px-6 py-3 text-base text-left border-r border-gray-400">TOTAL CPMK</th>
                                <td class="px-6 py-3 text-center text-base">100%</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
