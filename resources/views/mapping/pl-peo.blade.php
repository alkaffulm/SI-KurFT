<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Korelasi PL dan PEO</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

    {{-- Select2 CSS and JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- STYLES TO FIX SELECT2 WIDTH AND HEIGHT --}}
    <style>
        /* Custom styles to make Select2 fit the Tailwind design */
        .select2-container--default .select2-selection--multiple {
            border-radius: 0.5rem;
            /* rounded-lg */
            border-color: #D1D5DB;
            /* border-gray-300 */
            padding: 0.35rem;
            /* This sets a minimum height to prevent the box from collapsing */
            min-height: 42px;
        }

        /* This forces the entire Select2 component to fill the parent container (the <td>) */
        .select2-container {
            width: 100% !important;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 max-w-4xl mx-auto">
            <form action="{{ route('pl-peo-mapping.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Edit Korelasi PL dan PEO</h1>
                        <p class="text-gray-500 mt-2 text-base">Pilih PEO yang relevan untuk setiap Profil Lulusan (PL).
                        </p>
                    </div>

                    <div class="overflow-hidden rounded-lg border border-gray-400">
                        <table class="w-full text-sm text-center text-gray-500">
                            {{-- Table Header --}}
                            <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                                <tr>
                                    <th scope="col" class="px-6 py-4 whitespace-nowrap">Kode Profil Lulusan</th>
                                    <th scope="col" class="px-6 py-4 whitespace-nowrap">Programme Educational
                                        Objective (PEO)</th>
                                </tr>
                            </thead>
                            {{-- Table Body (No changes needed here) --}}
                            <tbody>
                                @foreach ($profil_lulusan as $pl)
                                    <tr class="bg-white border-t border-gray-400">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                            {{ $pl->kode_pl }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <select class="select2 w-full" multiple="multiple"
                                                name="peo_mappings[{{ $pl->id_pl }}][]">
                                                @foreach ($peo as $item)
                                                    <option value="{{ $item->id_peo }}"
                                                        @if (isset($pl_peo_map[$pl->id_pl]) && in_array($item->id_peo, $pl_peo_map[$pl->id_pl])) selected @endif>
                                                        {{ $item->kode_peo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                        <a href="{{ route('profil-lulusan.index') }}"
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
                placeholder: "Pilih PEO",
                allowClear: true
            });
        });
    </script>
</body>

</html>
