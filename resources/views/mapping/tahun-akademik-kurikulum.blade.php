<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit CPMK untuk setiap CPL per Mata Kuliah</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

    {{-- Select2 CSS and JS for searchable dropdowns --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Custom styles to make Select2 fit the Tailwind design --}}
    <style>
        .select2-container--default .select2-selection--multiple {
            border-radius: 0.5rem;
            /* rounded-lg */
            border-color: #D1D5DB;
            /* border-gray-300 */
            padding: 0.35rem;
            min-height: 42px;
            /* Sets a minimum height */
        }

        .select2-container {
            width: 100% !important;
            /* Forces the element to fill its container */
        }
    </style>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 max-w-4xl mx-auto">
                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Tambah Tahun Akademik</h1>
                        <p class="text-gray-500 mt-2 text-base">Tambah Tahun Akademik Sesuai dengan Kurikulum</p>
                    </div>

                    {{-- form nambah tahun_akademik ke tabel kurikulum_tahun_akademik_map --}}
                    <form action="{{ route('ta.update') }}" method="POST" onsubmit="return disableButton(this)">
                        @csrf
                        {{-- @method('PUT') --}}

                        {{-- pilih kurikulum --}}
                        <div>
                            <label for="id_kurikulum" class="block text-base font-medium text-gray-700 mb-2">
                                Pilih Kurikulum
                            </label>

                            <select id="id_kurikulum" name="id_kurikulum"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                required>
                                <option value="">-- Pilih Kurikulum --</option>
                                @foreach ($kurikulums as $kurikulum)
                                    <option value="{{ $kurikulum->id_kurikulum }}"
                                        {{ old('id_kurikulum') == $kurikulum->id_kurikulum ? 'selected' : '' }}>
                                        {{ $kurikulum->tahun }}
                                    </option>
                                @endforeach
                            </select>

                            @error('id_kurikulum')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- masukan tahun akademik --}}
                        <div>
                            <label for="tahun_akademik" class="mt-8 block text-base font-medium text-gray-700 mb-2">Tambah Tahun Akademik</label>
                            <input type="text" id="tahun_akademik" name="tahun_akademik"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                placeholder="Contoh: 2022/2023" value="{{ old('tahun_akademik') }}" required>
                            @error('tahun_akademik')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Action Buttons --}}
                        <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                            <a href="{{ route('ta.index') }}" {{-- Ganti route kembali ke cpl.index --}}
                                class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                                Kembali
                            </a>
                            <button type="submit"
                                class="flex items-center gap-x-2 text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                    </path>
                                </svg>
                                Tambah Tahun Akademik
                            </button>
                        </div>
                    </form>
        </main>
    </div>

    {{-- Script to initialize Select2 --}}
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Pilih CPL untuk Mata Kuliah ini",
                allowClear: true
            });
        });
    </script>
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
