<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Kelas</title>
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
                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">
                    <div class="mb-5">
                        <h1 class="text-4xl font-bold text-gray-800">Edit Kelas</h1>
                        <p class="text-gray-500 mt-2 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore nihil perspiciatis quibusdam!</p>
                    </div>
                    <form action="{{ route('kelas.updaterill', $kelas->id_kelas) }}" method="POST" enctype="multipart/form-data" class="mb-12 flex flex-col">
                        @csrf
                        @method('PUT')
                        <div class="flex mb-12 gap-12">
                            {{-- disabled form --}}
                            <div class="flex flex-col w-1/2">
                                {{-- Kurikulum --}}
                                <div>
                                    <label for="kurikulum_select" class="block mb-2 text-sm font-medium text-gray-900">Pilih Kurikulum</label>
                                    <select disabled id="kurikulum_select" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                        <option value="">-- Pilih Kurikulum --</option>
                                        @foreach ($kurikulums as $kurikulum)
                                            <option value="{{ $kurikulum->id_kurikulum }}" 
                                                {{ $kelas->id_kurikulum == $kurikulum->id_kurikulum ? 'selected' : '' }}>
                                                {{ $kurikulum->nama_kurikulum ?? 'Kurikulum ' . $kurikulum->tahun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Tahun Akademik --}}
                                <div class="mt-10">
                                    <label for="tahun_select" class="block mb-2 text-sm font-medium text-gray-900">Pilih Tahun Akademik sesuai Kurikulum</label>
                                    <select disabled id="tahun_select"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                        <option value="">-- Pilih Tahun Akademik --</option>
                                        @foreach ($tahunAkademiks as $ta)
                                            <option value="{{ $ta->id_tahun_akademik }}" 
                                                {{ $kelas->id_tahun_akademik == $ta->id_tahun_akademik ? 'selected' : '' }}>
                                                {{ $ta->tahun_akademik }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Kemunculan Semester --}}
                                <div class="mt-10">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Pilih Semester untuk Mata Kuliah</label>
                                    <select disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                        <option value="">-- Pilih Semester --</option>
                                        <option value="ganjil" {{ $kelas->mataKuliahModel->muncul == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                                        <option value="genap" {{ $kelas->mataKuliahModel->muncul == 'genap' ? 'selected' : '' }}>Genap</option>
                                        <option value="semua" {{ $kelas->mataKuliahModel->muncul == 'semua' ? 'selected' : '' }}>Semua</option>
                                    </select>
                                </div>

                                {{-- Mata Kuliah --}}
                                <div class="mt-10">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Mata Kuliah</label>
                                    <select disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                        <option value="">-- Pilih Mata Kuliah --</option>
                                        <option value="{{ $kelas->id_mk }}" selected>
                                            {{ $kelas->mataKuliahModel->nama_matkul_id ?? '-' }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            {{-- active form --}}
                            <div class="flex flex-col w-1/2">
                                {{-- Dosen --}}
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Dosen Pengampu</label>
                                    <select name="id_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                        <option value="">-- Pilih Dosen --</option>
                                        @foreach ($dosens as $dosen)
                                            <option value="{{ $dosen->id_user }}" 
                                                {{ $kelas->id_user == $dosen->id_user ? 'selected' : '' }}>
                                                {{ $dosen->username }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Kuota/Jumlah Mahasiswa --}}
                                <div class="mt-10">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Kuota Mahasiswa</label>
                                    <input type="number" name="jumlah_mhs" value="{{ old('jumlah_mhs', $kelas->jumlah_mhs) }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>

                                {{-- Upload Daftar Mahasiswa --}}
                                <div class="mt-10">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Upload Daftar Mahasiswa (Excel)</label>
                                    <input type="file" name="excel_daftar_mahasiswa"
                                        class="m-1 block py-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                                    @if($kelas->excel_daftar_mahasiswa)
                                        <p class="mt-2 text-sm text-gray-500">
                                            File saat ini: <a href="{{ asset($kelas->excel_daftar_mahasiswa) }}" class="underline text-biru-custom" download>Download</a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- Button Submit --}}
                        <button type="submit" class="w-28 mt-12 px-7 py-3 text-base font-medium text-white bg-biru-custom border rounded-lg hover:bg-blue-500">
                            Submit
                        </button>
                    </form>

                    {{-- button --}}
                    <a href="{{ route('kelas.index') }}" {{-- Ganti route kembali ke cpl.index --}}
                        class="mt-12 px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        Kembali
                    </a>
                </div>
        </main>
    </div>


</body>

</html>
