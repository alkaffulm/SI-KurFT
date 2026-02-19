<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Korelasi CPL dan PL</title>
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
            border-color: #D1D5DB;
            padding: 0.35rem;
            min-height: 42px;
        }

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
            <form action="{{ route('cpl-pl-mapping.update') }}" method="POST" onsubmit="return disableButton(this)">
                @csrf
                @method('PUT')

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Edit Korelasi CPL dan PL</h1>
                        <p class="text-gray-500 mt-2 text-base">Pilih Profil Lulusan (PL) yang relevan untuk setiap
                            Capaian Pembelajaran Lulusan (CPL).</p>
                    </div>

                    <div class="overflow-hidden rounded-lg border border-gray-400">
                        <table class="w-full text-sm text-center text-gray-500">
                            {{-- Table Header --}}
                            <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                                <tr>
                                    <th scope="col" class="px-6 py-4 whitespace-nowrap">Kode CPL</th>
                                    <th scope="col" class="px-6 py-4 whitespace-nowrap">Profil Lulusan (PL)</th>
                                </tr>
                            </thead>
                            {{-- Table Body --}}
                            <tbody>
                                @foreach ($cpl as $c)
                                    <tr class="bg-white border-t border-gray-400">
                                        {{-- PERUBAHAN 1: Menambahkan title pada kode CPL untuk hover --}}
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400"
                                            title="{{ $c->desc_cpl_id }}">
                                            {{ $c->nama_kode_cpl }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{-- Select2 dropdown for PL selection --}}
                                            <select class="select2 w-full" multiple="multiple"
                                                name="pl_mappings[{{ $c->id_cpl }}][]">
                                                @foreach ($profil_lulusan as $item)
                                                    {{-- PERUBAHAN 2: Menambahkan title pada opsi PL untuk hover --}}
                                                    <option value="{{ $item->id_pl }}" title="{{ $item->desc_pl_id }}"
                                                        @if (isset($cpl_pl_map[$c->id_cpl]) && in_array($item->id_pl, $cpl_pl_map[$c->id_cpl])) selected @endif>
                                                        {{ $item->kode_pl }} - {{ $item->nama_pl_id }}
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
                        <a href="{{ route('cpl.index') }}"
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

    {{-- PERUBAHAN 3: Menambahkan skrip Select2 yang sama seperti di pl-peo --}}
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Pilih PL", // Menyesuaikan placeholder
                allowClear: true,
                templateResult: function(data) {
                    if (!data.id) {
                        return data.text;
                    }
                    var $option = $(data.element);
                    var $wrapper = $('<span></span>');
                    $wrapper.attr('title', $option.attr('title'));
                    $wrapper.text(data.text);
                    return $wrapper;
                }
            });

            $('.select2').on('select2:select', function(e) {
                $(this).next().find('.select2-selection__choice').each(function() {
                    var $this = $(this);
                    var option_title = e.params.data.element.title;
                    if ($this.attr('title') === undefined && e.params.data.text === $this.text()
                        .replace('×', '')) {
                        $this.attr('title', option_title);
                    }
                });
            }).on('select2:open', function() {
                var values = $(this).val();
                if (values) {
                    var $options = $(this).find('option');
                    var $list = $('.select2-results__options').find('li');
                    $options.each(function(i, opt) {
                        if (values.indexOf($(opt).val()) > -1) {
                            $($list[i]).attr('title', $(opt).attr('title'));
                        }
                    });
                }
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
