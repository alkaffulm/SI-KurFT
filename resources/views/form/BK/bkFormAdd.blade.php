<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bahan Kajian (BK)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 max-w-xl mx-auto">
            <form action="{{ route('bahan-kajian.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">
                <input type="hidden" name="id_kurikulum" value="{{ session('id_kurikulum_aktif') }}">

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah BK Baru</h1>
                        <p class="text-gray-500 mt-2 text-base">Isi formulir di bawah ini untuk menambahkan Bahan Kajian
                            baru.</p>
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

                    <div class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label for="nama_kode_bk" class="block text-base font-medium text-gray-700 mb-2">Kode
                                    BK</label>
                                <input type="text" id="nama_kode_bk" name="nama_kode_bk"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                    placeholder="Contoh: BK-1" value="{{ old('nama_kode_bk') }}" required>
                                @error('nama_kode_bk')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="kategori"
                                    class="block text-base font-medium text-gray-700 mb-2">Kategori</label>
                                <input type="text" id="kategori" name="kategori"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                    placeholder="Contoh: Inti" value="{{ old('kategori') }}" required>
                                @error('kategori')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="nama_bk_id" class="block text-base font-medium text-gray-700 mb-2">Nama Bahan
                                Kajian (Indonesia)</label>
                            <input type="text" id="nama_bk_id" name="nama_bk_id"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: Algoritma dan Struktur Data" value="{{ old('nama_bk_id') }}" required>
                            @error('nama_bk_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nama_bk_en" class="block text-base font-medium text-gray-700 mb-2">Nama Bahan
                                Kajian (English)</label>
                            <input type="text" id="nama_bk_en" name="nama_bk_en"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: Algorithms and Data Structures" value="{{ old('nama_bk_en') }}" required>
                            @error('nama_bk_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="desc_bk_id" class="block text-base font-medium text-gray-700 mb-2">Deskripsi
                                (Indonesia)</label>
                            <textarea id="desc_bk_id" name="desc_bk_id" rows="4"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Jelaskan deskripsi bahan kajian dalam bahasa Indonesia di sini..." required>{{ old('desc_bk_id') }}</textarea>
                            @error('desc_bk_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="desc_bk_en" class="block text-base font-medium text-gray-700 mb-2">Deskripsi
                                (English)</label>
                            <textarea id="desc_bk_en" name="desc_bk_en" rows="4"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Describe the study material in English here..." required>{{ old('desc_bk_en') }}</textarea>
                            @error('desc_bk_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('bahan-kajian.index') }}"
                            class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">Batal</a>
                        <button type="submit"
                            class="flex items-center gap-x-2 text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah BK
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>

</html>
