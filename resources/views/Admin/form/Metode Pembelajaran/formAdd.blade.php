<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Metode Pembelajaran</title>
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

            <form action="{{ route('metode-pembelajaran.store') }}" method="POST" onsubmit="return disableButton(this)">
                @csrf

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-10">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah Metode Pembelajaran</h1>
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
                                <label for="nama_metode_pembelajaran"
                                    class="block text-base font-medium text-gray-700 mb-2">
                                    Nama Metode Pembelajaran <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                    id="nama_metode_pembelajaran"
                                    name="nama_metode_pembelajaran" 
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    value="{{ old('nama_metode_pembelajaran') }}"
                                    placeholder="Contoh: Ceramah atau Tanya Jawab"
                                    required>
                                @error('nama_metode_pembelajaran')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-5">
                                <label for="nama_metode_pembelajaran"
                                    class="block text-base font-medium text-gray-700 mb-2">
                                    Tipe Metode Pembelajaran <span class="text-red-500">*</span>
                                </label>
                                <select name="tipe_metode_pembelajaran" id="tipe_metode_pembelajaran" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    value="{{ old('tipe_metode_pembelajaran') }}">
                                    <option value="">Pilih Tipe</option>
                                    <option value="tm">TM</option>
                                    <option value="bm">BM</option>
                                </select>
                                @error('tipe_metode_pembelajaran')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('metode-pembelajaran.index') }}"
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

    <script>
        function disableButton(form) {
            // Ambil tombol submit
            const btn = form.querySelector('button[type="submit"]');
            
            // Ubah teks dan matikan tombol
            btn.innerText = 'Menyimpan...';
            btn.disabled = true;
            btn.classList.add('opacity-50', 'cursor-not-allowed');

            return true; // Lanjutkan submit form
        }
    </script>
</body>

</html>