<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Mahasiswa per Kelas</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

    {{-- Select2 --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

        {{-- 🔹 JIKA TIDAK ADA MAHASISWA --}}
        @if ($kelas->mahasiswa->isEmpty())
            <div class="mt-20 max-w-8xl mx-auto">
                <div class="bg-white p-4 rounded-xl shadow-lg">
                    <a href="{{ route('dosen_kelas.index') }}"
                        class="mt-2 inline-block px-4 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        Kembali
                    </a>
                    <div class="mt-5">
                        <h1 class="text-3xl font-bold text-gray-700">Daftar Mahasiswa Tidak Ditemukan</h1>
                        <p class="text-gray-500 text-base">
                            Belum ada mahasiswa yang terdaftar pada kelas ini untuk dilakukan penilaian.
                            Silahkan hubungi admin program studi Anda.
                        </p>
                    </div>
                </div>
            </div>

        {{-- 🔹 JIKA BELUM ADA ASESMEN --}}
        @elseif ($rencanaAsesmen->isEmpty() || $bobot->isEmpty())
            <div class="mt-20 max-w-8xl mx-auto">
                <div class="bg-white p-4 rounded-xl shadow-lg">
                    <a href="{{ route('dosen_kelas.index') }}"
                        class="mt-2 inline-block px-4 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        Kembali
                    </a>
                    <div class="mt-5">
                        <h1 class="text-3xl font-bold text-gray-700">Asesmen Belum Diatur</h1>
                        <p class="text-gray-500 text-base">
                            Asesmen pada mata kuliah ini belum diatur per-CPMK.
                            Silahkan hubungi <strong>Koordinator Mata Kuliah</strong> terkait untuk melengkapi komponen penilaian.
                        </p>
                    </div>
                </div>
            </div>

        {{-- 🔹 JIKA SUDAH ADA MAHASISWA & ASESMEN --}}
        @else
            <main class="mt-20 max-w-8xl mx-auto">
                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <a href="{{ route('dosen_kelas.index') }}"
                        class="mb-12 mt-12 px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        Kembali
                    </a>

                    <div class="mb-5 mt-12">
                        <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Penilaian Mahasiswa per Kelas</h1>
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-biru-custom">
                                List Daftar Mahasiswa untuk Penilaian Kelas
                            </h2>
                        </div>
                    </div>

                    {{-- 🔸 FORM PENILAIAN --}}
                    <form action="{{ route('dosen_kelas.simpanNilai', $kelas->id_kelas) }}" method="POST">
                        @csrf
                        <div class="overflow-x-auto rounded-lg border border-gray-400 mt-12">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-white uppercase bg-teks-biru-custom">
                                    {{-- 🔹 Baris 1: Kolom umum --}}
                                    <tr>
                                        <th rowspan="2" class="text-center px-6 py-3 border-r border-gray-400">NIM</th>
                                        <th rowspan="2" class="text-center px-6 py-3 border-r border-gray-400">Nama Lengkap</th>

                                        {{-- 🔸 Loop per Komponen Asesmen --}}
                                        @foreach($rencanaAsesmen as $ra)
                                            @php
                                                $cpmkForAsesmen = $bobot->where('id_rencana_asesmen', $ra->id_rencana_asesmen);
                                            @endphp
                                            <th colspan="{{ $cpmkForAsesmen->count() }}"
                                                class="text-center px-6 py-3 border-r border-gray-400 text-lg">
                                                {{ strtoupper($ra->tipe_komponen) }}
                                            </th>
                                        @endforeach
                                    </tr>

                                    {{-- 🔹 Baris 2: Subheader CPMK di bawah tiap Asesmen --}}
                                    <tr>
                                        {{-- @foreach($rencanaAsesmen as $ra)
                                            @php
                                                $cpmkForAsesmen = $bobot->where('id_rencana_asesmen', $ra->id_rencana_asesmen);
                                            @endphp
                                            @foreach($cpmkForAsesmen as $bc)
                                                @php
                                                    $cpmkData = $cpmk->firstWhere('id_cpmk', $bc->id_cpmk);
                                                @endphp
                                                <th class="text-center px-6 py-3 border-r border-gray-400">
                                                    {{ $cpmkData->nama_kode_cpmk ?? '-' }}
                                                    <br>
                                                    <span class="font-normal">Maks: {{ (int) $bc->bobot }}</span>
                                                </th>
                                            @endforeach
                                        @endforeach --}}

                                        @foreach($rencanaAsesmen as $ra)
                                            @php
                                                $cpmkForAsesmen = $bobot->where('id_rencana_asesmen', $ra->id_rencana_asesmen);
                                            @endphp
                                            @foreach($cpmkForAsesmen as $bc)
                                                <th class="text-center px-6 py-3 border-r border-gray-400">
                                                    {{ $bc->cpmk?->nama_kode_cpmk ?? '-' }}
                                                    <br>
                                                    <span class="font-normal">Maks: {{ (int) $bc->bobot }}</span>
                                                </th>
                                            @endforeach
                                        @endforeach

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($kelas->mahasiswa as $mhs)
                                        <tr class="text-black bg-gray-50 hover:bg-gray-100">
                                            <td class="text-center px-6 py-4 font-medium">{{ $mhs->nim }}</td>
                                            <td class="text-center px-6 py-4">{{ $mhs->nama_lengkap }}</td>
                                            @foreach($rencanaAsesmen as $ra)
                                                @php
                                                    $cpmkForAsesmen = $bobot->where('id_rencana_asesmen', $ra->id_rencana_asesmen);
                                                @endphp
                                                @foreach($cpmkForAsesmen as $bc)
                                                    @php
                                                        $nilaiLama = $penilaianMahasiswa
                                                            ->where('nim', $mhs->nim)
                                                            ->where('id_rencana_asesmen', $ra->id_rencana_asesmen)
                                                            ->where('id_cpmk', $bc->id_cpmk)
                                                            ->first();

                                                        $maxBobot = (int) ($bc->bobot ?? 0);
                                                    @endphp

                                                    <td class="text-center px-6 py-4">
                                                        <input type="number"
                                                            name="nilai[{{ $mhs->nim }}][{{ $ra->id_rencana_asesmen }}][{{ $bc->id_cpmk }}]"
                                                            class="nilai-input w-20 border rounded px-2 py-1 text-center focus:ring-2 focus:ring-biru-custom outline-none"
                                                            placeholder="0-{{ $maxBobot }}"
                                                            id="nilai-input"
                                                            min="0"
                                                            max="{{ $maxBobot }}"
                                                            step="1"
                                                            value="{{ $nilaiLama->nilai ?? '' }}"
                                                            data-max="{{ $maxBobot }}">
                                                    </td>
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                        {{-- Tombol Simpan --}}
                        <div class="mt-8 text-right">
                            <button id="submitButton" type="submit"
                                class="px-6 py-3 text-base font-semibold text-white bg-biru-custom rounded-lg shadow hover:bg-blue-700 transition">
                                Simpan Nilai
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        @endif

    </div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('.nilai-input');
    const submitButton = document.querySelector('#submitButton'); 

    function validateInputs() {
        let valid = true;

        inputs.forEach(input => {
            const max = parseInt(input.dataset.max);
            const value = parseFloat(input.value) || 0; 

            if (value > max) {
                valid = false;

                input.classList.remove('border-gray-400'); 
                input.classList.add('border', 'border-red-500', 'bg-red-50'); 
                
                input.title = `Nilai tidak boleh lebih dari ${max}`;
            } else {
                input.classList.remove('border-red-500', 'bg-red-50');
                input.classList.add('border', 'border-gray-400'); 
                
                input.title = '';
            }
        });

        if (submitButton) submitButton.disabled = !valid;

        if (submitButton) {
            if (valid) {
                submitButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
                submitButton.classList.add('bg-biru-custom', 'hover:bg-blue-700');
            } else {
                submitButton.classList.remove('bg-biru-custom', 'hover:bg-blue-700');
                submitButton.classList.add('bg-gray-400', 'cursor-not-allowed');
            }
        }
    }

    inputs.forEach(input => {
        input.addEventListener('input', validateInputs);
    });

    validateInputs(); 
});
</script>

</body>
</html>
