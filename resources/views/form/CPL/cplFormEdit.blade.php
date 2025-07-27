<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Capaian Pembelajaran Lulusan (CPL)</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
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

            <form action="{{ route('cpl.updateAll') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-10">
                        <h1 class="text-4xl font-bold text-gray-800">Edit CPL</h1>
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
                        @forelse ($cpl_data as $cpl)
                            <div x-data="{ isDeleting: false }" class="transition-opacity"
                                :class="{ 'is-deleting': isDeleting }">
                                <div class="grid grid-cols-12 gap-x-6 gap-y-4">

                                    {{-- Kolom untuk Kode CPL, Bobot, dan Kurikulum --}}
                                    <div class="col-span-12 sm:col-span-4 space-y-4">
                                        {{-- Input Kode CPL --}}
                                        <div>
                                            <label for="nama_kode_cpl_{{ $cpl->id_cpl }}"
                                                class="block text-base font-medium text-gray-700 mb-2">Kode CPL</label>
                                            <input type="text" id="nama_kode_cpl_{{ $cpl->id_cpl }}"
                                                name="cpl[{{ $cpl->id_cpl }}][nama_kode_cpl]" :disabled="isDeleting"
                                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                                value="{{ old('cpl.' . $cpl->id_cpl . '.nama_kode_cpl', $cpl->nama_kode_cpl) }}"
                                                required>
                                        </div>

                                        {{-- Input Bobot Maksimum --}}
                                        <div>
                                            <label for="bobot_maksimum_{{ $cpl->id_cpl }}"
                                                class="block text-base font-medium text-gray-700 mb-2">Bobot
                                                Maksimum</label>
                                            <input type="text" id="bobot_maksimum_{{ $cpl->id_cpl }}"
                                                name="cpl[{{ $cpl->id_cpl }}][bobot_maksimum]" :disabled="isDeleting"
                                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                                value="{{ old('cpl.' . $cpl->id_cpl . '.bobot_maksimum', $cpl->bobot_maksimum) }}"
                                                required>
                                        </div>

                                        {{-- Dropdown Kurikulum --}}
                                        <div>
                                            <label for="id_kurikulum_{{ $cpl->id_cpl }}"
                                                class="block text-base font-medium text-gray-700 mb-2">Kurikulum</label>
                                            <select name="cpl[{{ $cpl->id_cpl }}][id_kurikulum]"
                                                id="id_kurikulum_{{ $cpl->id_cpl }}" :disabled="isDeleting"
                                                class="select-custom w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition">
                                                @foreach ($kurikulum as $krk)
                                                    <option value="{{ $krk->id_kurikulum }}"
                                                        {{ old('cpl.' . $cpl->id_cpl . '.id_kurikulum', $cpl->id_kurikulum) == $krk->id_kurikulum ? 'selected' : '' }}>
                                                        {{ $krk->tahun }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Kolom Deskripsi --}}
                                    <div class="col-span-11 sm:col-span-7">
                                        <label for="desc_{{ $cpl->id_cpl }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Deskripsi</label>
                                        <textarea id="desc_{{ $cpl->id_cpl }}" name="cpl[{{ $cpl->id_cpl }}][desc]" rows="9" :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>{{ old('cpl.' . $cpl->id_cpl . '.desc', $cpl->desc) }}</textarea>
                                    </div>

                                    {{-- Kolom Delete Checkbox --}}
                                    <div class="col-span-1 flex items-center justify-center pt-8">
                                        <input type="checkbox" id="delete_{{ $cpl->id_cpl }}" name="delete_cpl[]"
                                            value="{{ $cpl->id_cpl }}" class="hidden" x-model="isDeleting">
                                        <label for="delete_{{ $cpl->id_cpl }}"
                                            class="cursor-pointer text-gray-400 hover:text-red-600 transition"
                                            title="Tandai untuk dihapus">
                                            <svg :class="{ '!text-red-600': isDeleting }" class="w-7 h-7" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </label>
                                    </div>
                                </div>

                                @if (!$loop->last)
                                    <hr class="mt-10 border-gray-200">
                                @endif
                            </div>
                        @empty
                            <div class="text-center py-16 border-2 border-dashed border-gray-200 rounded-lg">
                                <p class="text-base text-gray-500">Data CPL belum tersedia untuk diedit.</p>
                            </div>
                        @endforelse
                    </div>

                    @if ($cpl_data->isNotEmpty())
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
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                    </path>
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    @endif
                </div>
            </form>
        </main>
    </div>
</body>

</html>
