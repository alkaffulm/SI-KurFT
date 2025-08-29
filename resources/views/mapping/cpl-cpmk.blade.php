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
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 max-w-4xl mx-auto">
            <form action="{{ route('cpl-cpmk-mapping.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Edit CPMK untuk setiap CPL per Mata Kuliah</h1>
                        <p class="text-gray-500 mt-2 text-base">Pilih Capaian Mata Kuliah (CPMK) untuk setiap Capaian Profil Lulusan (CPL) per Mata Kuliah</p>
                    </div>

                    <div class="overflow-hidden rounded-lg border border-gray-400">
                        <table class="w-full text-sm text-center text-gray-500">
                            {{-- Table Header --}}
                            <thead class="text-sm text-white uppercase bg-teks-biru-custom">
                                <tr>
                                    <th scope="col" class="px-6 py-4 whitespace-nowrap">Mata Kuliah</th>
                                    <th scope="col" class="px-6 py-4 whitespace-nowrap">Capaian Mata Kuliah (CPMK) per Capaian Profil Lulusan (CPL)
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($mata_kuliah as $mk)
                                    <tr class="bg-white border-t border-gray-400">
                                        {{-- daftar mata kuliah --}}
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r text-left border-gray-400">
                                            {{ $mk->kode_mk }} - {{ $mk->nama_matkul_id }}
                                        </th>

                                        <td class="px-6 py-4">
                                            {{-- Loop hanya CPL yang terhubung dengan MK ini --}}
                                            @if (isset($mk_cpmk_cpl_map[$mk->id_mk]))
                                                @foreach ($mk_cpmk_cpl_map[$mk->id_mk] as $id_cpl => $cpmk_ids)
                                                    @php
                                                        $cplItem = $cpl->firstWhere('id_cpl', $id_cpl);
                                                    @endphp

                                                    @if ($cplItem)
                                                        <div class="mb-2">
                                                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                                                {{ $cplItem->nama_kode_cpl }}
                                                            </label>
                                                            <input type="hidden" name="cpmk_map[{{ $mk->id_mk }}][{{ $cplItem->id_cpl }}]" value="">
                                                            <select class="select2 w-full"
                                                                    name="cpmk_map[{{ $mk->id_mk }}][{{ $cplItem->id_cpl }}][]"
                                                                    multiple="multiple" required>

                                                                @foreach ($cpmk as $cpmk_item)
                                                                    <option value="{{ $cpmk_item->id_cpmk }}"
                                                                        {{ in_array($cpmk_item->id_cpmk, $cpmk_ids) ? 'selected' : '' }}>
                                                                        {{ $cpmk_item->nama_kode_cpmk }} - {{ $cpmk_item->deskripsi_id }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('cpmk.index') }}" {{-- Ganti route kembali ke cpl.index --}}
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
                            Simpan Perubahan
                        </button>
                    </div>
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
</body>

</html>
