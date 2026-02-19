<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programme Educational Objective (PEO)</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/logo ulm 1.png') }}" type="image/x-icon">
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
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">PROGRAMME EDUCATIONAL OBJECTIVE (PEO)</h1>
                <p class="text-gray-600 mb-6">
                    Nilai-nilai utama secara resmi dinyatakan sebagai Tujuan Pendidikan Program (Program Educational
                    Objectives/PEO). Nilai-nilai utama ini dirumuskan sesuai dengan visi dan misi universitas, fakultas
                    teknik, dan program studi teknik elektro. Perumusan nilai-nilai utama ini umumnya mempertimbangkan
                    saran dari pengguna, dewan penasihat, alumni, dan asosiasi profesi.
                </p>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel PEO</h2>
                </div>

                @livewire('pimpinan-upm.peo-all')
            </div>
        </main>
    </div>
</body>

</html>
