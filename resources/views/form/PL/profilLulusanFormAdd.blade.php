<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Profil Lulusan (PL)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-14 max-w-xl mx-auto">

            <form action="{{ route('profil-lulusan.store') }}" method="POST" onsubmit="return disableButton(this)">
                @csrf

                <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">
                <input type="hidden" name="id_kurikulum" value="{{ session('id_kurikulum_aktif') }}">

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">

                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah PL Baru</h1>
                        <p class="text-gray-500 mt-2 text-base">Isi formulir di bawah ini untuk menambahkan Profil
                            Lulusan baru.</p>
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
                            <label for="kode_pl" class="block text-base font-medium text-gray-700 mb-2">Kode Profil
                                Lulusan</label>
                            <input type="text" id="kode_pl" name="kode_pl"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: PL-1" value="{{ old('kode_pl') }}" required>
                            @error('kode_pl')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nama_pl_id" class="block text-base font-medium text-gray-700 mb-2">Nama Profil
                                Lulusan (Indonesia)</label>
                            <input type="text" id="nama_pl_id" name="nama_pl_id"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: Analis Keamanan Siber" value="{{ old('nama_pl_id') }}"
                                required>
                            @error('nama_pl_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nama_pl_en" class="block text-base font-medium text-gray-700 mb-2">Nama Profil
                                Lulusan (English)</label>
                            <input type="text" id="nama_pl_en" name="nama_pl_en"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: cybersecurity analysis" value="{{ old('nama_pl_en') }}"
                                required>
                            @error('nama_pl_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="profesi" class="block text-base font-medium text-gray-700 mb-2">Profesi</label>
                            <input type="text" id="profesi" name="profesi"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: IT Auditor" value="{{ old('profesi') }}"
                                required>
                            @error('profesi')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="desc_pl_id"
                                class="block text-base font-medium text-gray-700 mb-2">Deskripsi Profil Lulusan (Indonesia)</label>
                            <textarea id="desc_pl_id" name="desc_pl_id" rows="4"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Jelaskan deskripsi profil lulusan di sini..." required>{{ old('desc_pl_id') }}</textarea>
                            @error('desc_pl_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="desc_pl_en"
                                class="block text-base font-medium text-gray-700 mb-2">Deskripsi Profil Lulusan (English)</label>
                            <textarea id="desc_pl_en" name="desc_pl_en" rows="4"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Describe the graduate profile here..." required>{{ old('desc_pl_en') }}</textarea>
                            @error('desc_pl_en')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('profil-lulusan.index') }}"
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
                            Tambah PL
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
