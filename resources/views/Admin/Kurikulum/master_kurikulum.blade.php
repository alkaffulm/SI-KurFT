<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurikulum Penilaian</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/LOGO_ULM.png') }}" type="image/x-icon">
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="py-8 px-16 lg:ml-64">
        <main class="mt-16">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Menu Utama</span>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Kurikulum</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Kurikulum</h1>
                <p class="text-gray-600 mb-6 text-justify">
                    Seperangkat rencana dan pengaturan mengenai tujuan, isi, dan bahan pelajaran, serta cara yang digunakan sebagai pedoman penyelenggaraan kegiatan pembelajaran. 
                </p>
                <p class="text-gray-600 mb-6 text-justify">
                    Kurikulum berbeda beda untuk setiap program studi. Pastikan untuk menyesuaikan kebutuhan Kurikulum di Program Studi Anda.
                </p>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-3">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Kurikulum</h2>
                    <div class="flex flex-wrap gap-2">
                        {{-- href="{{ route('kriteria-penilaian.edit') }}" --}}
                        <a href="{{ route('kurikulum.editAll') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Kurikulum
                        </a>
                        <a href="{{ route('kurikulum.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Kurikulum
                        </a>
                    </div>
                </div>


                {{-- Tabel Kurikulum --}}
                <div class="overflow-hidden rounded-lg border border-gray-400">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-white uppercase bg-teks-biru-custom">
                            <tr>
                                <th scope="col" class="px-6 py-4">
                                    ID Kurikulum
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    ID Program Studi
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Tahun Kurikulum
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($kurikulum as $item)
                                <tr class="bg-white border-t border-gray-400">

                                    <td class="px-6 py-4 font-medium text-gray-900 border-r border-gray-400">
                                        {{ $item->id_kurikulum }}
                                    </td>

                                    <td class="px-6 py-4 font-medium text-gray-900 border-r border-gray-400">
                                        {{ $item->id_ps }}
                                    </td>

                                    <td class="px-6 py-4 font-medium text-gray-900 border-r border-gray-400">
                                        {{ $item->tahun }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-t border-gray-400">
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        Data Kurikulum masih kosong.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-4">
                    {{ $kurikulum->links() }}
                </div>
</body>

</html>
