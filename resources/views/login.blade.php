<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Kurikulum Fakultas Teknik</title>
    <link rel="icon" href="{{ asset('images/logo ulm 1.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-bg-custom font-sans">
    <main class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">

            <div class="flex flex-col items-center mb-6">
                <img src="{{ asset('images/logo ulm 1.png') }}" alt="Logo Fakultas Teknik" class="h-16 mb-4">
                <h1 class="text-2xl font-bold text-tekst-biru-custom">LOGIN</h1>
                <p class="text-sm text-abu-custom font-bold">SIKUR FT ULM</p>
            </div>

            {{-- Displaying Validation Errors --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- A SINGLE, CORRECT FORM --}}
            <form action="{{ route('login') }}" method="POST">
                @csrf

                {{-- Input NIP --}}
                <div class="mb-5">
                    <label for="nip" class="block text-abu-custom text-sm font-medium mb-2">Nomor Induk Pegawai
                        (NIP)</label>
                    <input type="text" id="nip" name="nip" value="{{ old('nip') }}"
                        class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg"
                        placeholder="Masukkan NIP..." required>
                </div>

                {{-- Input Password --}}
                <div class="mb-5">
                    <label for="password" class="block text-abu-custom text-sm font-medium mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg"
                            placeholder="Masukkan password..." required>
                        <button type="button" onclick="togglePasswordVisibility()"
                            class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-500">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eye-off-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .946-3.001 3.456-5.424 6.542-6.357m5.276 0A9.957 9.957 0 0121.542 12c-1.274 4.057-5.064 7-9.542 7a9.954 9.954 0 01-1.875-.275M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l22 22" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Dropdown Login As --}}
                <div class="mb-8">
                    <label for="login_as" class="block text-abu-custom text-sm font-medium mb-2">Login as</label>
                    <div class="relative">
                        <select id="login_as" name="login_as"
                            class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg appearance-none pr-10">
                            {{-- ADDED VALUE ATTRIBUTES --}}
                            <option value="Koordinator Program Studi">Koordinator Program Studi</option>
                            <option value="UPM">UPM</option>
                            <option value="Pimpinan FT">Pimpinan FT</option>
                            <option value="Dosen" selected>Dosen</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-700">
                            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Tombol Login --}}
                <button type="submit"
                    class="w-full bg-biru-custom text-white font-bold py-3 px-4 rounded-full hover:opacity-90 transition-opacity">
                    Login
                </button>

            </form> {{-- SINGLE FORM TAG ENDS HERE --}}
        </div>
    </main>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeOffIcon = document.getElementById('eye-off-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        }
    </script>
</body>

</html>
