<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <main class="p-6 sm:ml-64">
        <form action="{{ route('master-mahasiswa.update', $mahasiswa->id_mhs) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg mt-24">
                <div class="mb-10">
                    <h1 class="text-3xl font-bold text-gray-800">Edit Data Mahasiswa</h1>
                </div>

                {{-- Notifikasi Error --}}
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- ID Program Studi --}}
                    {{-- <div>
                        <label for="id_ps" class="block text-base font-medium text-gray-700 mb-2">Program Studi</label>
                        <input type="number" id="id_ps" name="id_ps"
                            value="{{ old('id_ps', $mahasiswa->id_ps) }}"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>
                    </div> --}}

                    {{-- NIM --}}
                    <div>
                        <label for="nim" class="block text-base font-medium text-gray-700 mb-2">NIM</label>
                        <input type="text" id="nim" name="nim"
                            value="{{ old('nim', $mahasiswa->nim) }}"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>
                    </div>

                    {{-- Nama Lengkap --}}
                    <div>
                        <label for="nama_lengkap" class="block text-base font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label for="jenis_kelamin" class="block text-base font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>
                                
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="LAKI-LAKI" {{ (old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' || old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'LAKI-LAKI') ? 'selected' : '' }}>Laki-laki</option>
                                <option value="PEREMPUAN" {{ (old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' || old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'PEREMPUAN') ? 'selected' : '' }}>Perempuan</option>

                            </select>
                    </div>

                    {{-- Angkatan --}}
                    <div>
                        <label for="angkatan" class="block text-base font-medium text-gray-700 mb-2">Angkatan</label>
                        <input type="number" id="angkatan" name="angkatan"
                            value="{{ old('angkatan', $mahasiswa->angkatan) }}"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                    <a href="{{ route('master-mahasiswa.index') }}"
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
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>
