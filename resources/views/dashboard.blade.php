{{-- resources/views/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIKUR FT</title>
    <link rel="icon" href="{{ asset('images/logo ulm 1.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="sm:ml-64">
        <main class="mt-16 p-8">
            {{-- Konten dinamis berdasarkan peran pengguna --}}
            @if ($userRole == 'kaprodi')
                @include('partials.dashboard-kaprodi')
                @livewire('visi-keilmuan')
            @elseif($userRole == 'dosen')
                @include('partials.dashboard-dosen', ['tanggungJawabDosen' => $tanggungJawabDosen])
            @elseif($userRole == 'admin')
                @include('partials.dashboard-admin')
            @elseif($userRole == 'upm')
                @include('partials.dashboard-upm')
            @elseif($userRole == 'pimpinan')
                @include('partials.dashboard-pimpinan')
            @endif


            @if (!in_array($userRole, ['admin', 'pimpinan', 'upm']))
                @livewire('kurikulum-selector')
            @endif
        </main>
    </div>

    @livewireScripts

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
</body>

</html>
