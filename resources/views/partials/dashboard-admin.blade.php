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
                <h2 class="text-3xl font-bold text-gray-800 mt-2">{{ session('userName', 'Admin Program Studi') }}
                </h2>
            </div>
            <div>
                {{-- You can place your illustration SVG or image file here --}}
                <img src="{{ asset('images/Workspace with laptop and table lamp.png') }}" alt="Dashboard Illustration" class="h-40">
            </div>
        </div>


        {{-- Jobdesk Card --}}
        <div class="bg-white p-8 rounded-xl shadow-lg flex justify-between items-center mt-12">
            <div>
                {{-- <h1 class="text-4xl font-bold text-biru-custom">Selamat Datang,</h1> --}}
                <h2 class="text-3xl font-bold text-gray-800 mt-2">Admin:
                </h2>
                <p class="mt-4 text-xl text-justify">
                    Dalam sistem kurikulum berbasis OBE, halaman admin berfungsi sebagai
                    <span class="font-bold">
                        pusat pengelolaan data penting yang mendukung proses perencanaan dan evaluasi pembelajaran. 
                    </span>
                    Melalui halaman ini, admin memiliki kewenangan untuk 
                    <span class="font-bold">
                        melakukan proses CRUD (Create, Read, Update, Delete) 
                    </span>
                    terhadap berbagai komponen utama, seperti 
                    <span class="font-bold">
                        Teknik penilaian, Kriteria penilaian, Model pembelajaran, dan Metode pembelajaran. 
                    </span>
                    Fitur ini memastikan bahwa setiap data yang digunakan dalam penyusunan RPS maupun evaluasi capaian pembelajaran dapat dikelola secara terstruktur, konsisten, dan selalu diperbarui sesuai kebutuhan. Dengan demikian, keberadaan admin tidak hanya menjaga kelengkapan data, tetapi juga menjamin integritas informasi dalam mendukung penerapan kurikulum berbasis capaian secara efektif.
                </p>
            </div>
            {{-- <div>
                <img src="{{ asset('images/Workspace with laptop and table lamp.png') }}" alt="Dashboard Illustration" class="h-40">
            </div> --}}
        </div>
        {{-- End Welcome Card --}}

    </mainlass=>
</div>
