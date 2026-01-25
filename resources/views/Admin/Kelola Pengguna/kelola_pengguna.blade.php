<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna Program Studi - Admin</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])
    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
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
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Kelola Pengguna Program Studi</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Kelola Pengguna Program Studi</h1>
                <p class="text-gray-600 mb-6 text-justify">
                    Menu ini menyediakan fasilitas pengelolaan pengguna Program Studi untuk mendukung pelaksanaan kegiatan akademik dan pengelolaan kurikulum secara terstruktur.
                </p>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-biru-custom">Tabel Kelola Pengguna Program Studi</h2>
                    <div class="space-x-2">
                        {{-- href="{{ route('kriteria-penilaian.edit') }}" --}}
                        {{-- <a 
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Pengguna Program Studi
                        </a> --}}
                        <a href="{{ route('admin.kelola-pengguna.create') }}"
                            class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg hover:opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Pengguna Program Studi
                        </a>
                    </div>
                </div>

                {{-- Tabel Kriteria Penilaian --}}
                <div>
                    {{-- @if (session('success'))
                        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
                            {{ session('success') }}
                        </div>
                    @endif --}}

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3">No</th>
                                    <th class="px-6 py-3">NIP</th>
                                    <th class="px-6 py-3">Username</th>
                                    <th class="px-6 py-3">Roles</th>
                                    <th class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $i => $u)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4">{{ $i + 1 }}</td>
                                        <td class="px-6 py-4">{{ $u->NIP ?? '-' }}</td>
                                        <td class="px-6 py-4">{{ $u->username }}</td>
                                        <td class="px-6 py-4">
                                            @if($u->roles->count())
                                                {{ $u->roles->pluck('role')->implode(', ') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-2">
                                            <a href="{{ route('admin.kelola-pengguna.edit', $u->id_user) }}"
                                            class="px-3 py-2 rounded bg-yellow-400 text-white  font-bold hover:opacity-90">
                                                Edit
                                            </a>
                                            @if (!$u->roles->contains('role', 'Admin'))
                                                <form class="form-hapus" action="{{ route('admin.kelola-pengguna.destroy', $u->id_user) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="px-3 py-2 rounded font-bold bg-red-600 text-white hover:opacity-90">
                                                        Hapus
                                                    </button>
                                                </form>                                               
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b">
                                        <td colspan="5" class="px-6 py-4 text-center">Belum ada data user.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Script untuk menangkap session flash data --}}
    <script>
        // Cek Session Sukses
        @if (session('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}", // Mengambil pesan dari Controller
                icon: "success",
                confirmButtonColor: "#3085d6", // Sesuaikan warna dengan tema projectmu
                confirmButtonText: "Oke"
            });
        @endif

        // Cek Session Error (Opsional, buat jaga-jaga)
        @if (session('error'))
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonColor: "#d33",
                confirmButtonText: "Tutup"
            });
        @endif
    </script>

<script>
    // Pilih semua form dengan class 'form-hapus'
    const deleteForms = document.querySelectorAll('.form-hapus');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // 1. Cegah form terkirim langsung
            e.preventDefault();

            // 2. Tampilkan SweetAlert Konfirmasi
            Swal.fire({
                title: 'Yakin hapus user ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // 3. Jika user klik "Ya", kirim form secara manual
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
</body>

</html>
