<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Capaian Pembelajaran Lulusan (CPL)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-14 max-w-xl mx-auto">

            <form action="{{ route('cpl.store') }}" method="POST">
                @csrf

                <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">

                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah CPL Baru</h1>
                        <p class="text-gray-500 mt-2 text-base">Isi formulir di bawah ini untuk menambahkan CPL baru.
                        </p>
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
                        <div>
                            <label for="nama_kode_cpl" class="block text-base font-medium text-gray-700 mb-2">Kode
                                CPL</label>
                            <input type="text" id="nama_kode_cpl" name="nama_kode_cpl"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: CPL-1" value="{{ old('nama_kode_cpl') }}" required>
                            @error('nama_kode_cpl')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="id_kurikulum"
                                class="block text-base font-medium text-gray-700 mb-2">Kurikulum</label>
                            <select name="id_kurikulum" id="id_kurikulum"
                                class="select-custom w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition">
                                @foreach ($kurikulum as $krk)
                                    <option value="{{ $krk->id_kurikulum }}">{{ $krk->tahun }}</option>
                                @endforeach
                            </select>
                            @error('id_kurikulum')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="bobot_maksimum" class="block text-base font-medium text-gray-700 mb-2">Bobot
                                Maksimum</label>
                            <input type="text" id="bobot_maksimum" name="bobot_maksimum"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Masukkan bobot maksimum" value="{{ old('bobot_maksimum') }}" required>
                            @error('bobot_maksimum')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="desc"
                                class="block text-base font-medium text-gray-700 mb-2">Deskripsi</label>
                            <textarea id="desc" name="desc" rows="4"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Jelaskan deskripsi CPL di sini..." required>{{ old('desc') }}</textarea>
                            @error('desc')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('cpl.index') }}"
                            class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            Batal
                        </a>
                        <button type="submit"
                            class="flex items-center gap-x-2 text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah CPL
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>

</body>

</html>
