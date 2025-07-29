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
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="sm:ml-64">
        <main class="mt-16 p-8">
            {{-- Konten dinamis berdasarkan peran pengguna --}}
            @if ($userRole == 'kaprodi')
                @include('partials.dashboard-kaprodi')
            @elseif($userRole == 'dosen')
                @include('partials.dashboard-dosen')
            @elseif($userRole == 'pimpinan')
                @include('partials.dashboard-pimpinan')
            @endif

            <h1>Pilih Kurikulum: </h1>
            <select name="" id="">
                <option value="2020">2020</option>
                <option value="2025">2025</option>
            </select>

        </main>
    </div>


</body>

</html>
