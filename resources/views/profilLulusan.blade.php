<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Lulusan (PL)</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
            {{-- Bagian Profil Lulusan --}}
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Kurikulum</span>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Profil Lulusan</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">PROFIL LULUSAN (PL)</h1>
                <p class="text-gray-600 mb-6">
                    Profil Lulusan (PL) adalah deskripsi tentang sikap, pengetahuan, dan keterampilan yang diharapkan
                    dimiliki oleh lulusan setelah menyelesaikan studi mereka. Ini menjadi acuan dalam pengembangan
                    kurikulum untuk memastikan relevansi lulusan dengan dunia kerja.
                </p>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel PL</h2>
                    <div class="space-x-2">
                        <a href="{{ route('profil-lulusan.editAll') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit PL
                        </a>
                        <a href="{{ route('profil-lulusan.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah PL
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-4">Kode PL</th>
                                <th scope="col" class="px-6 py-4">Profil Lulusan</th>
                                <th scope="col" class="px-6 py-4">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profil_lulusan as $pl)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $pl->kode_pl }}
                                    </th>
                                    <td class="px-6 py-4 text-left border-r border-gray-400">
                                        {{ $pl->profil_lulusan }}</td>
                                    <td class="px-6 py-4 text-left border-r border-gray-400">
                                        {{ $pl->desc }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Bagian Tabel Korelasi PL dan PEO --}}
                <h1 class="pt-10 text-3xl font-bold text-teks-biru-custom mb-4">Tabel Korelasi Profil Lulusan dan
                    Programme
                    Educational Objective (PEO)</h1>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Korelasi PL - PEO</h2>
                    <a href="{{ route('pl-peo-mapping.edit') }}"
                        class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Korelasi
                    </a>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center">
                        <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" rowspan="2" class="px-6 py-3">Kode PL
                                </th>
                                <th scope="col" colspan="{{ count($peo) }}" class="px-6 py-3">Programme Educational
                                    Objective (PEO)</th>
                            </tr>
                            <tr>
                                @foreach ($peo as $p)
                                    <th scope="col" class="px-6 py-3">
                                        {{ $p->kode_peo }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profil_lulusan as $pl)
                                <tr class="bg-white border-t border-gray-400">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border-r border-gray-400">
                                        {{ $pl->kode_pl }}
                                    </th>
                                    @foreach ($peo as $p)
                                        @php
                                            $isChecked =
                                                isset($pl_peo_map[$pl->id_pl]) &&
                                                in_array($p->id_peo, $pl_peo_map[$pl->id_pl]);
                                        @endphp
                                        <td class="px-6 py-4 border-r border-gray-400">
                                            @if ($isChecked)
                                                <span class="text-black-500 font-bold">✓</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
