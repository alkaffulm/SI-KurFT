{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teknik Penilaian</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Transisi halus untuk efek visual */
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

            <form action="{{ route('teknik-penilaian.updateAll') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-10">
                        <h1 class="text-4xl font-bold text-gray-800">Edit Teknik Penilaian</h1>
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
                        @forelse ($teknik_penilaian as $tp)
                            <div x-data="{ isDeleting: false }" class="transition-opacity"
                                :class="{ 'is-deleting': isDeleting }">
                                <div class="grid grid-cols-12 gap-x-6 gap-y-4">
                                    <div class="col-span-12 sm:col-span-4">
                                        <label for="nama_kode_cpl_{{ $cpl->id_cpl }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Kode CPL</label>
                                        <input type="text" id="nama_kode_cpl_{{ $cpl->id_cpl }}"
                                            name="cpl[{{ $cpl->id_cpl }}][nama_kode_cpl]" :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                            value="{{ old('cpl.' . $cpl->id_cpl . '.nama_kode_cpl', $cpl->nama_kode_cpl) }}"
                                            required>
                                    </div>


                                    <div class="col-span-11">
                                        <label for="desc_cpl_id_{{ $cpl->id_cpl }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Deskripsi CPL
                                            (Indonesia)</label>
                                        <textarea id="desc_cpl_id_{{ $cpl->id_cpl }}" name="cpl[{{ $cpl->id_cpl }}][desc_cpl_id]" rows="4"
                                            :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>{{ old('cpl.' . $cpl->id_cpl . '.desc_cpl_id', $cpl->desc_cpl_id) }}</textarea>
                                    </div>

                                    <div class="col-span-1 flex items-center justify-center pt-8">
                                        <input type="checkbox" id="delete_{{ $cpl->id_cpl }}" name="delete_teknik_penilaian[]"
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

                                    <div class="col-span-11">
                                        <label for="desc_cpl_en_{{ $cpl->id_cpl }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Deskripsi CPL
                                            (English)</label>
                                        <textarea id="desc_cpl_en_{{ $cpl->id_cpl }}" name="cpl[{{ $cpl->id_cpl }}][desc_cpl_en]" rows="4"
                                            :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>{{ old('cpl.' . $cpl->id_cpl . '.desc_cpl_en', $cpl->desc_cpl_en) }}</textarea>
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

</html> --}}


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teknik Penilaian</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Transisi halus untuk efek visual */
        .transition-opacity {
            transition: opacity 0.3s ease-in-out;
        }

        .is-deleting {
            opacity: 0.4;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 mb-5 max-w-5xl mx-auto">

            <form id="form-update" action="{{ route('teknik-penilaian.updateAll') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-10">
                        <h1 class="text-4xl font-bold text-gray-800">Edit Teknik Penilaian</h1>
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
                        @forelse ($teknik_penilaian as $tp)
                            <div x-data="{ isDeleting: false }" class="transition-opacity"
                                :class="{ 'is-deleting': isDeleting }">
                                <div class="grid grid-cols-12 gap-x-6 gap-y-4">
                                    <div class="col-span-12 sm:col-span-5">
                                        <label for="nama_teknik_penilaian_{{ $tp->id_teknik_penilaian }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Nama Teknik Penilaian</label>
                                        <input type="text" id="nama_teknik_penilaian_{{ $tp->id_teknik_penilaian }}"
                                            name="teknik_penilaian[{{ $tp->id_teknik_penilaian }}][nama_teknik_penilaian]" :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                            value="{{ old('teknik_penilaian.' . $tp->id_teknik_penilaian . '.nama_teknik_penilaian', $tp->nama_teknik_penilaian) }}"
                                            required>
                                    </div>

                                    <div class="col-span-11 sm:col-span-6">
                                        <label for="kategori_{{ $tp->id_teknik_penilaian }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Kategori</label>
                                        <select id="kategori_{{ $tp->id_teknik_penilaian }}" name="teknik_penilaian[{{ $tp->id_teknik_penilaian }}][kategori]" :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>
                                            <option value="">Pilih Kategori</option>
                                            <option value="test" {{ old('teknik_penilaian.' . $tp->id_teknik_penilaian . '.kategori', $tp->kategori) == 'test' ? 'selected' : '' }}>Test</option>
                                            <option value="non-test" {{ old('teknik_penilaian.' . $tp->id_teknik_penilaian . '.kategori', $tp->kategori) == 'non-test' ? 'selected' : '' }}>Non-Test</option>
                                        </select>
                                    </div>

                                    <div class="col-span-1 flex items-center justify-center pt-8">
                                        <input type="checkbox" id="delete_{{ $tp->id_teknik_penilaian }}" name="delete_teknik_penilaian[]"
                                            value="{{ $tp->id_teknik_penilaian }}" class="hidden" x-model="isDeleting">
                                        <label for="delete_{{ $tp->id_teknik_penilaian }}"
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
                                <p class="text-base text-gray-500">Data Teknik Penilaian belum tersedia untuk diedit.</p>
                            </div>
                        @endforelse
                    </div>

                    @if ($teknik_penilaian->isNotEmpty())
                        <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                            <a href="{{ route('teknik-penilaian.index') }}"
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

    <script>
        document.getElementById('form-update').addEventListener('submit', function(e) {
            // 1. Cegah form submit langsung
            e.preventDefault();

            // 2. Hitung berapa checkbox hapus yang dicentang
            const deleteCheckboxes = document.querySelectorAll('input[name="delete_teknik_penilaian[]"]:checked');
            const deleteCount = deleteCheckboxes.length;
            
            // 3. Tentukan Pesan & Warna berdasarkan apakah ada yang dihapus
            let title = 'Simpan Perubahan?';
            let text = 'Pastikan data yang Anda masukkan sudah benar.';
            let icon = 'question';
            let confirmButtonColor = '#3085d6'; // Biru
            let confirmButtonText = 'Ya, Simpan!';

            // Jika ada item yang dipilih untuk DIHAPUS
            if (deleteCount > 0) {
                title = 'PERINGATAN!';
                text = `Anda menandai ${deleteCount} data untuk DIHAPUS permanen. Data yang lain akan diperbarui.`;
                icon = 'warning';
                confirmButtonColor = '#d33'; // Merah
                confirmButtonText = 'Ya, Hapus & Simpan';
            }

            // 4. Tampilkan SweetAlert
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                showCancelButton: true,
                confirmButtonColor: confirmButtonColor,
                cancelButtonColor: '#6c757d',
                confirmButtonText: confirmButtonText,
                cancelButtonText: 'Batal'
            }).then((result) => {
                // 5. Jika user klik "Ya", submit form secara manual
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
</body>

</html>