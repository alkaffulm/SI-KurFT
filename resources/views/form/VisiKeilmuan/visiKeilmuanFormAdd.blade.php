<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visi Keilmuan</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">
    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 mb-5 max-w-5xl mx-auto">
            <form action="{{ route('visi-keilmuan.store') }}" method="POST">
                @csrf

                <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">
                <input type="hidden" name="id_kurikulum" value="{{ session('id_kurikulum_aktif') }}">

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-10">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah Visi Keilmuan</h1>
                    </div>

                    {{-- Pesan error --}}
                    @if ($errors->any())
                        <div class="mb-8 p-4 text-sm text-red-800 rounded-lg bg-red-100">
                            <span class="font-bold">Terjadi Kesalahan!</span>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form isi visi --}}
                    <div class="space-y-10">
                        <div>
                            <label for="" class="block text-base font-medium text-gray-700 mb-2">Visi Keilmuan (Indonesia)</label>
                            <textarea id="desc_vk_id" name="desc_vk_id" rows="5"
                                class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-base"
                                required>
                            </textarea>
                        </div>

                        <div>
                            <label for="" class="block text-base font-medium text-gray-700 mb-2">Visi Keilmuan (English)</label>
                            <textarea id="desc_vk_en" name="desc_vk_en" rows="5"
                                class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-base"
                                required>
                            </textarea>
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('dashboard') }}"
                            class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-3 text-base font-medium text-white bg-biru-custom rounded-lg hover:opacity-90">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
