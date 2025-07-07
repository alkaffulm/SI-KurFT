<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kurikulum Fakultas Teknik</title>

    <link rel="icon" href="{{ asset('images/logo ulm 1.png') }}" type="image/x-icon">

    @vite('resources/css/app.css')
</head>
<body class="bg-putih-custom font-sans">

    <header class="bg-putih-custom shadow-sm px-8">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/logo ulm 1.png') }}" alt="Logo Fakultas Teknik" class="h-10">
                <div>
                    <div class="text-sm font-bold text-teks-hitam-custom">Fakultas Teknik</div>
                    <div class="text-xs text-tekst-biru-custom font-semibold">Universitas Lambung Mangkurat</div>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-4 font-bold">
                <a href="#" class="bg-gray-200 text-teks-hitam-custom px-4 py-2 rounded-md">
                    Home
                </a>
                <a href="#" class="text-tekst-biru-custom hover:bg-gray-100 hover:text-teks-hitam-custom px-4 py-2 rounded-md transition-colors">
                    Program Studi
                </a>
                <a href="#" class="text-tekst-biru-custom hover:bg-gray-100 hover:text-teks-hitam-custom px-4 py-2 rounded-md transition-colors">
                    Dashboard
                </a>
            </div>
            <div>
                <a href="#" class="bg-biru-custom text-white px-6 py-2 rounded-full hover:opacity-90 transition-opacity font-bold">
                    Login
                </a>
            </div>
        </nav>
    </header>

    <main>
        <section class="bg-bg-custom py-16 px-8">
            <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <img src="{{ asset('images/IMG_4321 1.png') }}" alt="Gedung Fakultas Teknik" class="rounded-lg shadow-lg w-full">
                    <div class="absolute inset-0 bg-black opacity-10 rounded-lg"></div>
                </div>

                <div class="text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-teks-hitam-custom">SISTEM KURIKULUM</h1>
                    <h2 class="text-3xl md:text-4xl font-bold text-biru-custom mb-4">FAKULTAS TEKNIK ULM</h2>
                    <p class="text-tekst-biru-custom leading-relaxed">
                        Website ini merupakan sistem kurikulum Fakultas Teknik Universitas Lambung Mangkurat yang memberikan informasi terkait Capaian Pembelajaran Lulusan, Mata Kuliah, Capaian Pembelajaran Mata Kuliah, dan Rencana Pembelajaran Semester.
                    </p>
                </div>
            </div>
        </section>

        <section class="bg-bg-custom py-20 px-8">
            <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-teks-hitam-custom mb-4">Fakultas Teknik ULM</h2>
                    <p class="text-tekst-biru-custom leading-relaxed">
                        Fakultas Teknik Universitas Lambung Mangkurat didirikan pada tahun 1965. Fakultas Teknik merupakan Fakultas ke-7 yang didirikan di Unlam setelah Fakultas Hukum (1960), Fakultas Ekonomi (1960), Fakultas Sosial (1960), Fakultas Pertanian (1961), Fakultas Perikanan (1964), dan Fakultas Kehutanan (1964). Pada saat Fakultas Teknik didirikan, Unlam sudah menjadi Universitas Negeri yang memiliki 2 lokasi, yaitu Banjarmasin dan Banjarbaru. Fakultas Teknik diresmikan pertama kali di Banjarbaru.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('images/2.c-Sosialisasi-Poster-FT1 1.png') }}" alt="Fakultas Teknik dari depan" class="rounded-lg shadow-lg w-full">
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-biru-custom text-putih-custom py-8 px-8">
        <div class="container mx-auto px-6 space-y-4">
            <div class="flex items-start space-x-4">
                <svg class="w-6 h-6 text-putih-custom shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <div>
                    <div>Jl. Jenderal Achmad Yani KM 35.5 Banjarbaru, Kalimantan Selatan - 70714</div>
                    <div>Jl. Brigadir Jenderal H. Hasan Basry, Banjarmasin, Kalimantan Selatan 70123</div>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <svg class="w-6 h-6 text-putih-custom shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                <div>(0511) 3304405, 3304503, 4773856</div>
            </div>
        </div>
    </footer>

</body>
</html>
