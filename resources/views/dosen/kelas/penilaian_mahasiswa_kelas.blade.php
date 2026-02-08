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
                        <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Penilaian Mahasiswa per Kelas Mata Kuliah {{ $kelas->mataKuliahModel->nama_matkul_id }}</h1>
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-biru-custom">
                                List Daftar Mahasiswa untuk Penilaian Kelas untuk Mata Kuliah 
                                <span class="text-black">
                                    {{ $kelas->mataKuliahModel->nama_matkul_id }}
                                </span> 
                            </h2>

                        </div>
                        <p class="text-gray-600 mb-6 text-justify">
                            Setiap Mata Kuliah memiliki CPMK yang telah diatur. Setiap CPMK di dalam Mata Kuliah memiliki bobotnya masing-masing. Total seluruh bobot untuk seluruh CPMK di dalam satu Mata Kuliah akan bernilai <strong>100</strong>
                        </p>
                        <p class="text-gray-600 mb-6 text-justify">
                            Silahkan masukan nilai CPMK  untuk komponen evaluasi yang tersedia untuk masing-masing mahasiswa. Perubahan nilai per CPMK menjadi Pembobotan akan dilakukan otomatis oleh sistem. Silahkan masukan nilai CPMK dari 0-100. 
                        </p>
                        <p class="text-gray-600 mb-6 text-justify">
                            Pastikan ketika semua CPMK pada suatu komponen evaluasi ditotalkan akan menjadi 100.
                        </p>
                    </div>

                    @if (session('success'))
                        <div id="alert-success" class="flex p-4 mb-6 text-green-700 bg-green-100 rounded-lg" role="alert">
                            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L9 14.414l-3.707-3.707a1 1 0 111.414-1.414L9 11.586l6.293-6.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg hover:bg-green-200 focus:ring-2 focus:ring-green-300 p-1.5 inline-flex h-8 w-8" data-dismiss-target="#alert-success" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div id="alert-error" class="flex p-4 mb-6 text-red-700 bg-red-100 rounded-lg" role="alert">
                            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V5a1 1 0 10-2 0v2a1 1 0 102 0zm0 6v-4a1 1 0 10-2 0v4a1 1 0 102 0z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('error') }}
                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg hover:bg-red-200 focus:ring-2 focus:ring-red-300 p-1.5 inline-flex h-8 w-8" data-dismiss-target="#alert-error" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    {{-- 🔸 FORM PENILAIAN --}}
                        <form action="{{ route('dosen_kelas.simpanNilai', $kelas->id_kelas) }}" method="POST">
                            @csrf

                            @php
                                // Cari asesmen terakhir tiap tipe (tugas, uts, uas)
                                $lastIdPerTipe = $rencanaAsesmen
                                    ->groupBy('tipe_komponen')
                                    ->map(fn($g) => $g->last()->id_rencana_asesmen);
                            @endphp

                            <div class="overflow-x-auto rounded-lg border border-gray-400 mt-8">

                                <table class="w-full text-sm text-left text-gray-500">

                                    {{-- ============================= --}}
                                    {{-- 🔹 THEAD --}}
                                    {{-- ============================= --}}
                                    <thead class="text-xs text-white uppercase bg-teks-biru-custom">

                                        {{-- ============================= --}}
                                        {{-- 🔹 HEADER ROW 1 --}}
                                        {{-- ============================= --}}
                                        <tr>
                                            <th rowspan="2" class="text-center px-6 py-3 border-r border-gray-400">
                                                NIM
                                            </th>
                                            <th rowspan="2" class="text-center px-6 py-3 border-r border-gray-400">
                                                Nama Lengkap
                                            </th>

                                            @foreach($rencanaAsesmen as $ra)

                                                @php
                                                    $cpmkForAsesmen = $bobot->where('id_rencana_asesmen', $ra->id_rencana_asesmen);

                                                    // jumlah kolom CPMK
                                                    $jumlahKolom = $cpmkForAsesmen
                                                        ->groupBy(fn($item) => $item->mkCpmkMap?->cpmk?->nama_kode_cpmk)
                                                        ->count();
                                                @endphp

                                                {{-- Header Komponen --}}
                                                <th colspan="{{ $jumlahKolom }}"
                                                    class="text-center px-6 py-3 border-r border-gray-400 text-lg">
                                                    @if($ra->tipe_komponen == 'tugas')
                                                        {{ strtoupper($ra->tipe_komponen) }}-{{ $ra->nomor_komponen }}
                                                    @else
                                                        {{ strtoupper($ra->tipe_komponen) }}
                                                    @endif
                                                </th>

                                                {{-- Helper hanya setelah komponen terakhir per tipe --}}
                                                @if($lastIdPerTipe[$ra->tipe_komponen] == $ra->id_rencana_asesmen)
                                                    <th rowspan="2"
                                                        class="text-center px-4 py-3 border-r border-gray-400  text-white">
                                                        HELPER {{ strtoupper($ra->tipe_komponen) }}
                                                    </th>
                                                @endif

                                            @endforeach
                                        </tr>

                                        {{-- ============================= --}}
                                        {{-- 🔹 HEADER ROW 2 (CPMK) --}}
                                        {{-- ============================= --}}
                                        <tr>
                                            @foreach($rencanaAsesmen as $ra)

                                                @php
                                                    $cpmkForAsesmen = $bobot->where('id_rencana_asesmen', $ra->id_rencana_asesmen);
                                                    $totalBobotAsesmen = $cpmkForAsesmen->sum('bobot');

                                                    $cpmkGrouped = $cpmkForAsesmen
                                                        ->groupBy(fn($item) => $item->mkCpmkMap?->cpmk?->nama_kode_cpmk);
                                                @endphp

                                                @foreach($cpmkGrouped as $namaKode => $group)

                                                    @php
                                                        $bobotCpmk = $group->sum('bobot');
                                                        $maksNilaiInput = $totalBobotAsesmen > 0
                                                            ? round(($bobotCpmk / $totalBobotAsesmen) * 100, 1)
                                                            : 0;
                                                    @endphp

                                                    <th class="text-center px-6 py-3 border-r border-gray-400">
                                                        {{ $namaKode }}
                                                        <br>
                                                        <span class="font-normal">Maks: {{ $maksNilaiInput }}</span>
                                                    </th>

                                                @endforeach

                                                {{-- Slot kosong untuk helper sudah otomatis karena rowspan --}}
                                            @endforeach
                                        </tr>
                                    </thead>

                                    {{-- ============================= --}}
                                    {{-- 🔹 TBODY --}}
                                    {{-- ============================= --}}
                                    <tbody>

                                        @foreach($kelas->mahasiswa as $mhs)

                                            <tr class="text-black bg-gray-50 hover:bg-gray-100">

                                                <td class="text-center px-6 py-4 font-medium">
                                                    {{ $mhs->nim }}
                                                </td>

                                                <td class="text-center px-6 py-4">
                                                    {{ $mhs->nama_lengkap }}
                                                </td>

                                                @foreach($rencanaAsesmen as $ra)

                                                    @php
                                                        $cpmkForAsesmen = $bobot->where('id_rencana_asesmen', $ra->id_rencana_asesmen);
                                                        $totalBobotAsesmen = $cpmkForAsesmen->sum('bobot');

                                                        $cpmkGrouped = $cpmkForAsesmen
                                                            ->groupBy(fn($item) => $item->mkCpmkMap?->cpmk?->nama_kode_cpmk);
                                                    @endphp

                                                    @foreach($cpmkGrouped as $namaKode => $group)

                                                        @php
                                                            $bobotCpmk = $group->sum('bobot');
                                                            $maksNilaiInput = $totalBobotAsesmen > 0
                                                                ? round(($bobotCpmk / $totalBobotAsesmen) * 100, 1)
                                                                : 0;

                                                            $idCpmk = $group->first()->mkCpmkMap?->id_cpmk;

                                                            $nilaiLama = $penilaianMahasiswa
                                                                ->where('nim', $mhs->nim)
                                                                ->where('id_rencana_asesmen', $ra->id_rencana_asesmen)
                                                                ->where('id_cpmk', $idCpmk)
                                                                ->first();
                                                        @endphp

                                                        <td class="text-center px-6 py-4">

                                                            <input type="number"
                                                                name="nilai[{{ $mhs->nim }}][{{ $ra->id_rencana_asesmen }}][{{ $idCpmk }}]"
                                                                class="nilai-input w-20 border rounded px-2 py-1 text-center"
                                                                placeholder="0-{{ $maksNilaiInput }}"
                                                                min="0"
                                                                max="{{ $maksNilaiInput }}"
                                                                step="0.1"
                                                                value="{{ $nilaiLama->nilai ?? '' }}"

                                                                data-nim="{{ $mhs->nim }}"
                                                                data-tipe="{{ $ra->tipe_komponen }}"
                                                                data-max="{{ $maksNilaiInput }}"
                                                            >
                                                        </td>

                                                    @endforeach

                                                    {{-- Helper muncul hanya setelah komponen terakhir --}}
                                                    @if($lastIdPerTipe[$ra->tipe_komponen] == $ra->id_rencana_asesmen)
                                                        <td class="text-center px-4 py-4 bg-yellow-50 font-bold">
                                                            <span class="helper-prop"
                                                                data-nim="{{ $mhs->nim }}"
                                                                data-tipe="{{ $ra->tipe_komponen }}">
                                                                0%
                                                            </span>
                                                        </td>
                                                    @endif

                                                @endforeach

                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>
                            </div>

                            {{-- SUBMIT --}}
                            <div class="mt-8 text-right">
                                <button type="submit"
                                    class="px-6 py-3 font-semibold text-white bg-biru-custom rounded-lg shadow hover:bg-blue-700 transition">
                                    Simpan Nilai
                                </button>
                            </div>

                        </form>
                </div>
            </main>
        @endif

    </div>
</body>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const nilaiInputs = document.querySelectorAll('.nilai-input');

    nilaiInputs.forEach(input => {
        input.addEventListener('input', () => {
            const max = parseFloat(input.dataset.max) || 100;
            const value = parseFloat(input.value);

            if (value < 0) {
                input.value = 0;
            } else if (value > max) {
                input.value = max;
            }
        });

        input.addEventListener('blur', () => {
            const max = parseFloat(input.dataset.max) || 100;
            const value = parseFloat(input.value);

            if (value < 0) input.value = 0;
            if (value > max) input.value = max;
        });
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', (e) => {
        let valid = true;

        nilaiInputs.forEach(input => {
            const max = parseFloat(input.dataset.max) || 100;
            const value = parseFloat(input.value);

            if (value < 0 || value > max || isNaN(value)) {
                valid = false;
                input.classList.add('border-red-500');
            } else {
                input.classList.remove('border-red-500');
            }
        });

        if (!valid) {
            e.preventDefault();
            alert('Pastikan semua nilai valid: 0 - maksimal per CPMK');
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const inputs = document.querySelectorAll('.nilai-input');

  function updateHelperFor(nim, tipe) {
    const related = document.querySelectorAll(`.nilai-input[data-nim="${nim}"][data-tipe="${tipe}"]`);

    let sumVal = 0;
    let sumMax = 0;

    related.forEach(inp => {
      const v = parseFloat(inp.value);
      const mx = parseFloat(inp.dataset.max);

      sumVal += isNaN(v) ? 0 : v;
      sumMax += isNaN(mx) ? 0 : mx;
    });

    const percent = sumMax > 0 ? (sumVal / sumMax) * 100 : 0;
    const out = Math.round(percent * 10) / 10; // 1 desimal

    const helper = document.querySelector(`.helper-prop[data-nim="${nim}"][data-tipe="${tipe}"]`);
    if (helper) {
      helper.textContent = out;

      // optional: warna indikator
      helper.classList.toggle('text-green-700', out === 100);
      helper.classList.toggle('text-red-700', out !== 100);
    }
  }

  // init pertama kali
  document.querySelectorAll('.helper-prop').forEach(h => {
    updateHelperFor(h.dataset.nim, h.dataset.tipe);
  });

  // realtime update saat input berubah
  inputs.forEach(input => {
    input.addEventListener('input', () => {
      updateHelperFor(input.dataset.nim, input.dataset.tipe);
    });
  });
});
</script>

</html>
