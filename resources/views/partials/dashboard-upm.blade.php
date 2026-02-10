{{-- Main Content --}}
<div class="px-8 mb-8">
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
                <h2 class="text-3xl font-bold text-gray-800 mt-2">{{ session('userName', '-') }}</h2>
            </div>
            <div>
                {{-- You can place your illustration SVG or image file here --}}
                <img src="{{ asset('images/Workspace with laptop and table lamp.png') }}" alt="Dashboard Illustration" class="h-40">
            </div>
        </div>
        {{-- End Welcome Card --}}

    </main>
</div>
