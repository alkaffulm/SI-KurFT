<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah (MK)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 max-w-xl mx-auto">

            <form action="{{ route('mata-kuliah.store') }}" method="POST">
                @csrf

                <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">
                <input type="hidden" name="id_kurikulum" value="{{ session('id_kurikulum_aktif') }}">

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">

                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah MK Baru</h1>
                        <p class="text-gray-500 mt-2 text-base">Isi formulir di bawah ini untuk menambahkan Mata Kuliah
                            baru. </p>
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
                        {{-- Grid for Kode, SKS, Semester --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label for="kode_mk" class="block text-base font-medium text-gray-700 mb-2">Kode
                                    MK</label>
                                <input type="text" id="kode_mk" name="kode_mk"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                    placeholder="Contoh: TIS123" value="{{ old('kode_mk') }}" required>
                                @error('kode_mk')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div>
                                <label for="jumlah_sks" class="block text-base font-medium text-gray-700 mb-2">Jumlah
                                    SKS</label>
                                <input type="number" id="jumlah_sks" name="jumlah_sks" min="1" max="6"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                    placeholder="Contoh: 3" value="{{ old('jumlah_sks') }}" required>
                                @error('jumlah_sks')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div>
                                <label for="sks_teori" class="block text-base font-medium text-gray-700 mb-2">Jumlah
                                    SKS Teori</label>
                                <input type="number" id="sks_teori" name="sks_teori"  max="6"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                    placeholder="Contoh: 3" value="{{ old('sks_teori') }}" required>
                                @error('sks_teori')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="sks_praktikum" class="block text-base font-medium text-gray-700 mb-2">Jumlah
                                    SKS Praktikum</label>
                                <input type="number" id="sks_praktikum" name="sks_praktikum"  max="6"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                    placeholder="Contoh: 3" value="{{ old('sks_praktikum') }}" required>
                                @error('sks_praktikum')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="semester"
                                    class="block text-base font-medium text-gray-700 mb-2">Semester</label>
                                <input type="number" id="semester" name="semester" min="1" max="8"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                    placeholder="1-8" value="{{ old('semester') }}" required>
                                @error('semester')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="muncul"
                                    class="block text-base font-medium text-gray-700 mb-2">Semester</label>
                                <select id="muncul" name="muncul"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                    required>
                                    <option value="" disabled selected>Pilih Kemunculan Mata Kuliah</option>
                                    <option value="ganjil" {{ old('muncul') == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                                    <option value="genap" {{ old('muncul') == 'genap' ? 'selected' : '' }}>Genap</option>
                                    <option value="semua" {{ old('munculr') == 'semua' ? 'selected' : '' }}>Semua</option>
                                </select>
                                @error('muncul')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div>
                            <label for="nama_matkul_id" class="block text-base font-medium text-gray-700 mb-2">Nama Mata
                                Kuliah (Indonesia)</label>
                            <input type="text" id="nama_matkul_id" name="nama_matkul_id"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: Pemrograman Web Lanjut" value="{{ old('nama_matkul_id') }}"
                                required>
                            @error('nama_matkul_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nama_matkul_en" class="block text-base font-medium text-gray-700 mb-2">Nama Mata
                                Kuliah (English)</label>
                            <input type="text" id="nama_matkul_en" name="nama_matkul_en"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: Advanced Web Programming" value="{{ old('nama_matkul_en') }}"
                                required>
                            @error('nama_matkul_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="matkul_desc_id" class="block text-base font-medium text-gray-700 mb-2">Deskripsi
                                (Indonesia)</label>
                            <textarea id="matkul_desc_id" name="matkul_desc_id" rows="4"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Jelaskan deskripsi mata kuliah di sini..." required>{{ old('matkul_desc_id') }}</textarea>
                            @error('matkul_desc_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="matkul_desc_en" class="block text-base font-medium text-gray-700 mb-2">Deskripsi
                                (English)</label>
                            <textarea id="matkul_desc_en" name="matkul_desc_en" rows="4"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Describe the course here..." required>{{ old('matkul_desc_en') }}</textarea>
                            @error('matkul_desc_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('mata-kuliah.index') }}"
                            class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">Batal</a>
                        <button type="submit"
                            class="flex items-center gap-x-2 text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah MK
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>

</body>

</html>
