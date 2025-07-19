<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 6a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 6a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="{{ url('/') }}" class="flex ms-2 md:me-24">
                    <img src="{{ asset('images/logo ulm 1.png') }}" class="h-10 me-3" alt="Logo ULM" />
                    <div>
                        <div class="text-sm font-bold text-gray-900">Fakultas Teknik</div>
                        <div class="text-xs text-blue-600 font-semibold">Universitas Lambung Mangkurat</div>
                    </div>
                </a>
            </div>
            <div class="flex items-center">

                {{-- Bagian Nama dan Role --}}
                <div class="text-right me-4">
                    <p class="text-sm font-semibold text-gray-800">{{ session('userName', 'User') }}</p>
                    <p class="text-xs text-gray-500">
                        {{ ucfirst(session('userRole', 'Dosen')) }} {{-- Dosen, Kaprodi, Pimpinan --}}
                        @if (session('userRole') != 'pimpinan')
                            {{ session('userProdi') }}
                        @endif
                    </p>
                </div>

                {{-- Bagian Profile Dropdown --}}
                <div class="relative">
                    {{-- Tombol Trigger Dropdown --}}
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-10 h-10 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>

                    {{-- Menu Dropdown --}}
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900">{{ session('userName', 'User') }}</span>
                            <span class="block text-sm text-gray-500 truncate">
                                @if (session('userRole') == 'kaprodi')
                                    kaprodi.ti@ulm.ac.id
                                @elseif(session('userRole') == 'dosen')
                                    dosen@ulm.ac.id
                                @else
                                    pimpinan@ulm.ac.id
                                @endif
                            </span>
                        </div>
                        <ul class="py-2">
                            <a href="#">
                                <li class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Profile
                                </li>
                            </a>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>
