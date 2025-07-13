<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kurikulum Fakultas Teknik</title>

    <link rel="icon" href="{{ asset('images/logo ulm 1.png') }}" type="image/x-icon">

    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="{{ url('/') }}" class="flex items-center ms-2 md:me-24">
                        <img src="{{ asset('images/logo ulm 1.png') }}" alt="Logo Fakultas Teknik" class="h-10 me-3">
                        <div>
                            <div class="text-sm font-bold text-gray-900">Fakultas Teknik</div>
                            <div class="text-xs text-semibold text-gray-900 font-semibold">Universitas Lambung Mangkurat</div>
                        </div>
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('login') }}"
                        class="bg-biru-custom text-white px-6 py-2 rounded-full hover:opacity-90 transition-opacity font-bold">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                {{-- Home Link with Active State --}}
                <li>
                    <a href="{{ url('/') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('/') ? 'bg-gray-100' : '' }}">
                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 {{ request()->is('/') ? 'text-gray-900' : '' }}"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path
                                d="M11.47 3.84a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.06l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.06 1.06l8.69-8.69Z">
                            </path>
                            <path
                                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z">
                            </path>
                        </svg>
                        <span class="ms-3">Home</span>
                    </a>
                </li>
                {{-- Program Studi Link with Active State --}}
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('program-studi*') ? 'bg-gray-100' : '' }}">
                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 {{ request()->is('program-studi*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.03v11.94M18.066 12H5.934" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Program Studi</span>
                    </a>
                </li>
                {{-- Dashboard Link with Active State --}}
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('dashboard*') ? 'bg-gray-100' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 {{ request()->is('dashboard*') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="sm:ml-64">
        <main class="mt-14 p-8">
            <section class="bg-white rounded-lg shadow-md mb-8">
                <div class="container mx-auto p-6 grid md:grid-cols-2 gap-12 items-center">
                    <div class="relative">
                        <img src="{{ asset('images/IMG_4321 1.png') }}" alt="Gedung Fakultas Teknik"
                            class="rounded-lg shadow-lg w-full">
                        <div class="absolute inset-0 bg-black opacity-10 rounded-lg"></div>
                    </div>
                    <div class="text-left">
                        <h1 class="text-3xl md:text-4xl font-bold text-teks-hitam-custom">SISTEM KURIKULUM</h1>
                        <h2 class="text-3xl md:text-4xl font-bold text-biru-custom mb-4">FAKULTAS TEKNIK ULM</h2>
                        <p class="text-tekst-biru-custom leading-relaxed text-justify">
                            Website ini merupakan sistem kurikulum Fakultas Teknik Universitas Lambung Mangkurat yang
                            memberikan informasi terkait Capaian Pembelajaran Lulusan, Mata Kuliah, Capaian Pembelajaran
                            Mata Kuliah, dan Rencana Pembelajaran Semester.
                        </p>
                    </div>
                </div>
            </section>

            <section class="bg-white rounded-lg shadow-md">
                <div class="container mx-auto p-6 grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-teks-hitam-custom mb-4">Fakultas Teknik ULM</h2>
                        <p class="text-tekst-biru-custom leading-relaxed text-justify">
                            Fakultas Teknik Universitas Lambung Mangkurat didirikan pada tahun 1965. Fakultas Teknik
                            merupakan Fakultas ke-7 yang didirikan di Unlam setelah Fakultas Hukum (1960), Fakultas
                            Ekonomi (1960), Fakultas Sosial (1960), Fakultas Pertanian (1961), Fakultas Perikanan
                            (1964), dan Fakultas Kehutanan (1964). Pada saat Fakultas Teknik didirikan, Unlam sudah
                            menjadi Universitas Negeri yang memiliki 2 lokasi, yaitu Banjarmasin dan Banjarbaru.
                            Fakultas Teknik diresmikan pertama kali di Banjarbaru.
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('images/2.c-Sosialisasi-Poster-FT1 1.png') }}"
                            alt="Fakultas Teknik dari depan" class="rounded-lg shadow-lg w-full">
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-biru-custom text-putih-custom py-8 px-8">
            <div class="container mx-auto px-6 space-y-4">
                <div class="flex items-start space-x-4">
                    <svg class="w-6 h-6 text-putih-custom shrink-0 mt-1" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <div>
                        <div>Jl. Jenderal Achmad Yani KM 35.5 Banjarbaru, Kalimantan Selatan - 70714</div>
                        <div>Jl. Brigadir Jenderal H. Hasan Basry, Banjarmasin, Kalimantan Selatan 70123</div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <svg class="w-6 h-6 text-putih-custom shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                    <div>(0511) 3304405, 3304503, 4773856</div>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>
