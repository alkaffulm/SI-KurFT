<nav class="fixed top-0 z-50 w-full bg-white border-b-2 border-biru-custom sm:translate-x-0">
    <div class="px-3 py-2 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                {{-- Hamburger Toggle (Mobile) - pindah ke sini agar tidak tumpang tindih navbar --}}
                <button id="sidebar-toggle" class="p-2 me-1 rounded-lg text-gray-500 hover:bg-gray-100 lg:hidden"
                    onclick="toggleSidebar()">
                    <svg id="icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <a href="{{ url('/') }}" class="flex ms-1 md:me-24">
                    <img src="{{ asset('images/LOGO_ULM.png') }}" class="h-10 me-3" alt="Logo ULM" />
                    <div>
                        <div class="text-sm font-bold text-gray-900">Fakultas Teknik</div>
                        <div class="text-xs text-gray-600 font-semibold">Universitas Lambung Mangkurat</div>
                    </div>
                </a>
            </div>
            <div class="flex items-center">

                {{-- Bagian Nama dan Role --}}
                <div class="text-right me-4 hidden sm:block">
                    <p class="text-sm font-semibold text-gray-800">{{ session('userName', 'User') }}</p>
                    <p class="text-xs text-black font-semibold">
                        {{ ucfirst(session('userRole', 'Dosen')) }}
                        @if (session('userRole') != 'pimpinan' && session('userRole') != 'upm')
                            {{ session('userProdi') }}
                        @endif
                    </p>
                </div>

                {{-- Bagian Profile Dropdown --}}
                <div class="relative">
                    {{-- Tombol Trigger Dropdown --}}
                    <div>
                        <button type="button" class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full flex-shrink-0 object-cover"
                                src="{{ asset('images/user.png') }}" alt="user photo">
                        </button>
                    </div>

                    {{-- Menu Dropdown --}}
                    <div class="z-50 hidden my-4 min-w-48 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 mb-2">{{ session('userName', 'User') }}</span>
                            <span class="block text-sm text-gray-500 truncate">{{ session('userNip') }}</span>
                        </div>
                        <ul class="py-2">
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
