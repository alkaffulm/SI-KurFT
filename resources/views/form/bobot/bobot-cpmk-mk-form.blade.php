<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bobot CPMK per Mata Kuliah</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')



    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 max-w-screen mx-auto">
                <a href="{{ route('cpmk.index') }}"
                    class="mb-12 px-6 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    Batal
                </a>
                <div class="p-8 bg-white mt-12 rounded-md">
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif
                    <h1 class="text-2xl font-bold mb-4 text-biru-custom">
                        Bobot CPMK untuk Mata Kuliah: {{ $mk->nama_mk }}
                    </h1>
                    <p class="text-gray-600 mb-6 text-justify">
                        Setiap Mata Kuliah memiliki CPMK yang telah diatur. Setiap CPMK di dalam Mata Kuliah memiliki bobotnya masing-masing. Total seluruh bobot untuk seluruh CPMK di dalam satu Mata Kuliah harus bernilai <strong>100</strong> 
                    </p>
                    <form id="bobotForm" action="{{ route('bobot.cpmk.update', $mk->id_mk) }}" method="POST">
                        @csrf

                        <div class="overflow-x-auto border rounded-lg">
                            <table class="w-full text-sm">
                                <thead class="bg-teks-biru-custom text-white uppercase">
                                    <tr>
                                        <th class="px-6 py-4">Kode CPMK</th>
                                        <th class="px-6 py-4">Deskripsi</th>
                                        <th class="px-6 py-4">Menyusun ke CPL</th>
                                        <th class="px-6 py-4">Bobot</th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    @foreach ($mapping as $map)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td class="px-6 py-4 font-medium">
                                                {{ $map->cpmk->nama_kode_cpmk }}
                                            </td>
                                            <td class="px-6 py-4 text-left">
                                                {{ $map->cpmk->desc_cpmk_id }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $map->cpl->nama_kode_cpl ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <input 
                                                    type="number"
                                                    class="bobot-input border p-2 rounded w-24 text-center"
                                                    name="bobot[{{ $map->id_mk_cpmk_cpl }}]"
                                                    value="{{ $bobots[$map->id_mk_cpmk_cpl] ?? 0 }}"
                                                >
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <p id="totalWarning" class="mt-3 text-sm font-semibold"></p>

                        <button 
                            id="submitBtn"
                            class="mt-4 px-4 py-2 bg-teks-biru-custom text-white rounded-lg"
                        >
                            Simpan Bobot
                        </button>
                    </form>

                    <script>
                    document.addEventListener('DOMContentLoaded', () => {

                        const inputs = document.querySelectorAll('.bobot-input');
                        const submitBtn = document.getElementById('submitBtn');
                        const warning = document.getElementById('totalWarning');

                        function updateTotal() {
                            let total = 0;

                            inputs.forEach(input => {
                                total += Number(input.value) || 0;
                            });

                            if (total !== 100) {
                                submitBtn.disabled = true;
                                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                                warning.textContent = `Total bobot harus 100. Saat ini: ${total}`;
                                warning.classList.add('text-red-600');
                            } else {
                                submitBtn.disabled = false;
                                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                                warning.textContent = "Total bobot sudah 100";
                                warning.classList.remove('text-red-600');
                                warning.classList.add('text-green-600');
                            }
                        }

                        inputs.forEach(input => {
                            input.addEventListener('input', updateTotal);
                        });

                        updateTotal();
                    });
                    </script>

                </div>
        </main>
    </div>    
</body>
</html>
