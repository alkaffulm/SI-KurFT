<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna - Admin</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">

@include('layouts.navbar', ['userRole' => $userRole])
@include('layouts.sidebar', ['userRole' => $userRole])

<div class="py-8 px-16 sm:ml-64">
    <main class="mt-16">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Tambah Pengguna</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
                    <ul class="list-disc ms-5">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.kelola-pengguna.store') }}" method="POST" class="space-y-4" onsubmit="return disableButton(this)">
                @csrf
                <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">

                {{-- <div>
                    <label class="block mb-1 text-sm font-medium">ID Program Studi (id_ps)</label>
                    <input name="id_ps" value="{{ old('id_ps', auth()->user()->id_ps) }}"
                           class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" />
                </div> --}}

                <div>
                    <label class="block mb-1 text-sm font-medium">NIP</label>
                    <input name="NIP" value="{{ old('NIP') }}"
                           class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Username</label>
                    <input name="username" value="{{ old('username') }}"
                           class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Password</label>
                    <input type="password" name="password"
                           class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required />
                </div>
                <div>
                    <label class="block mb-1 text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required />
                </div>


                <div>
                    <label class="block mb-2 text-sm font-medium">Roles</label>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($roles as $r)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="roles[]" value="{{ $r->id_role }}"
                                       class="rounded border-gray-300"
                                       {{ in_array($r->id_role, old('roles', [])) ? 'checked' : '' }}>
                                <span>{{ $r->role }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.kelola-pengguna.index') }}"
                       class="px-4 py-2 rounded-lg border">Batal</a>
                    <button type="submit"
                            class="px-4 py-2 rounded-lg bg-biru-custom text-white hover:opacity-90">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </main>
</div>

    <script>
        function disableButton(form) {
            // Ambil tombol submit
            const btn = form.querySelector('button[type="submit"]');
            
            // Ubah teks dan matikan tombol
            btn.innerText = 'Menyimpan...';
            btn.disabled = true;
            btn.classList.add('opacity-50', 'cursor-not-allowed');

            return true; // Lanjutkan submit form
        }
    </script>
</body>
</html>
