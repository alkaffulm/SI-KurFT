{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah kriteria Penilaian</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Transisi halus untuk efek visual */
        .transition-opacity {
            transition: opacity 0.3s ease-in-out;
        }

        .is-deleting {
            opacity: 0.4;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 mb-5 max-w-5xl mx-auto">

            <form action="{{ route('kriteria-penilaian.store') }}" method="POST">
                @csrf

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-10">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah Kriteria Penilaian</h1>
                    </div>

                    @if ($errors->any())
                        <div class="mb-8 p-4 text-sm text-red-800 rounded-lg bg-red-100" role="alert">
                            <span class="font-bold">Terjadi Kesalahan:</span>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="space-y-10">
                        <div class="grid grid-cols-12 gap-x-6 gap-y-4">
                            <div class="col-span-12 sm:col-span-5">
                                <label for="nama_kriteria_penilaian"
                                    class="block text-base font-medium text-gray-700 mb-2">
                                    Nama kriteria Penilaian <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                    id="nama_kriteria_penilaian"
                                    name="nama_kriteria_penilaian" 
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    value="{{ old('nama_kriteria_penilaian') }}"
                                    placeholder="Contoh: Quiz, Ujian Tulis, Observasi, dll."
                                    required>
                                @error('nama_kriteria_penilaian')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('kriteria-penilaian.index') }}"
                            class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            Batal
                        </a>
                        <button type="submit"
                            class="flex items-center gap-x-2 text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                </path>
                            </svg>
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Teknik Penilaian</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Transisi halus untuk efek visual */
        .transition-opacity {
            transition: opacity 0.3s ease-in-out;
        }

        .is-deleting {
            opacity: 0.4;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 mb-5 max-w-5xl mx-auto">

            <form action="{{ route('teknik-penilaian.store') }}" method="POST">
                @csrf

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-10">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah Teknik Penilaian</h1>
                    </div>

                    @if ($errors->any())
                        <div class="mb-8 p-4 text-sm text-red-800 rounded-lg bg-red-100" role="alert">
                            <span class="font-bold">Terjadi Kesalahan:</span>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="space-y-10">
                        <div class="grid grid-cols-12 gap-x-6 gap-y-4">
                            <div class="col-span-12 sm:col-span-5">
                                <label for="nama_teknik_penilaian"
                                    class="block text-base font-medium text-gray-700 mb-2">
                                    Nama Teknik Penilaian <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                    id="nama_teknik_penilaian"
                                    name="nama_teknik_penilaian" 
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    value="{{ old('nama_teknik_penilaian') }}"
                                    placeholder="Contoh: Quiz, Ujian Tulis, Observasi, dll."
                                    required>
                                @error('nama_teknik_penilaian')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-11 sm:col-span-6">
                                <label for="kategori"
                                    class="block text-base font-medium text-gray-700 mb-2">
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <select id="kategori" 
                                    name="kategori" 
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                    required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="test" {{ old('kategori') == 'test' ? 'selected' : '' }}>Test</option>
                                    <option value="non-test" {{ old('kategori') == 'non-test' ? 'selected' : '' }}>Non-Test</option>
                                </select>
                                @error('kategori')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('teknik-penilaian.index') }}"
                            class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            Batal
                        </a>
                        <button type="submit"
                            class="flex items-center gap-x-2 text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                </path>
                            </svg>
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>

</html>