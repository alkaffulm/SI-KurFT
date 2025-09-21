<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKUR FT</title>
    <link rel="icon" href="{{ asset('images/logo ulm 1.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans">
    @php($userRole = session('userRole', 'dosen'))

    @include('layouts.navbar')
    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="sm:ml-64">
        <main class="mt-16 p-8">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>
