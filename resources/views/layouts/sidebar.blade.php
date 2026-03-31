{{-- Overlay (Mobile) --}}
<div id="sidebar-overlay"
    class="fixed inset-0 z-30 bg-black/40 backdrop-blur-sm hidden lg:hidden transition-opacity duration-300"
    onclick="closeSidebar()">
</div>

{{-- Sidebar --}}
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r-2 border-biru-custom
           -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-1 font-medium">

            {{-- MENU UTAMA --}}
            <li class="pt-2">
                <span class="ms-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Menu Utama</span>
            </li>

            <li>
                <a href="{{ route('dashboard') }}"
                    class="sidebar-link flex items-center p-2 rounded-lg transition-all duration-200
                    {{ request()->routeIs('dashboard') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                    <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-500' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ms-3 text-sm">Dashboard</span>
                </a>
            </li>

            {{-- Menu khusus Dosen --}}
            @if ($userRole == 'dosen')
                <li>
                    <a href="{{ route('matkul.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('matkul.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('matkul.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                        <span class="ms-3 text-sm">Mata Kuliah Saya</span>
                    </a>
                </li>

                @if (session('userRoleId') != 16)
                    <li>
                        <a href="{{ route('rencana-asesmen.index') }}"
                            class="flex items-center p-2 rounded-lg transition-all duration-200
                            {{ request()->routeIs('rencana-asesmen.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                            <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('rencana-asesmen.*') ? 'text-white' : 'text-gray-500' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            <span class="ms-3 text-sm">Rencana Asesmen</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('evaluasi-mahasiswa.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('evaluasi-mahasiswa.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('evaluasi-mahasiswa.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="ms-3 text-sm">Evaluasi Mahasiswa</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dosen_kelas.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('dosen_kelas.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('dosen_kelas.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="ms-3 text-sm">Kelas per Mata Kuliah</span>
                    </a>
                </li>
            @endif

            {{-- Menu khusus Kaprodi --}}
            @if ($userRole == 'kaprodi')
                <li class="pt-3">
                    <span class="ms-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Kurikulum</span>
                </li>

                {{-- PEO --}}
                <li>
                    <a href="{{ route('peo.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('peo.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('peo.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ms-3 text-sm">PEO</span>
                    </a>
                </li>

                {{-- Profil Lulusan --}}
                <li>
                    <a href="{{ route('profil-lulusan.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('profil-lulusan.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('profil-lulusan.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="ms-3 text-sm">Profil Lulusan</span>
                    </a>
                </li>

                {{-- CPL --}}
                <li>
                    <a href="{{ route('cpl.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('cpl.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('cpl.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span class="ms-3 text-sm">CPL</span>
                    </a>
                </li>

                {{-- Bahan Kajian --}}
                <li>
                    <a href="{{ route('bahan-kajian.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('bahan-kajian.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('bahan-kajian.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span class="ms-3 text-sm">Bahan Kajian</span>
                    </a>
                </li>

                {{-- Mata Kuliah --}}
                <li>
                    <a href="{{ route('mata-kuliah.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('mata-kuliah.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('mata-kuliah.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <span class="ms-3 text-sm">Mata Kuliah</span>
                    </a>
                </li>

                {{-- CPMK --}}
                <li>
                    <a href="{{ route('cpmk.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('cpmk.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('cpmk.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ms-3 text-sm">CPMK</span>
                    </a>
                </li>

                <li class="pt-3">
                    <span class="ms-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Evaluasi</span>
                </li>
                <li>
                    <a href="{{ route('evaluasi-upm.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('evaluasi-upm.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('evaluasi-upm.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                        </svg>
                        <span class="ms-3 text-sm">Evaluasi UPM</span>
                    </a>
                </li>

                <li class="pt-3">
                    <span class="ms-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Laporan</span>
                </li>
                <li>
                    <a href="{{ route('mhs-cpl.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('mhs-cpl.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('mhs-cpl.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="ms-3 text-sm">Laporan CPL Mahasiswa</span>
                    </a>
                </li>
            @endif

            {{-- Menu khusus pimpinan dan UPM --}}
            @if ($userRole == 'pimpinan' || $userRole == 'upm')
                <li class="pt-3">
                    <span class="ms-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Kurikulum</span>
                </li>

                {{-- PEO --}}
                <li>
                    <a href="{{ route('peo-all.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('peo-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('peo-all.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ms-3 text-sm">PEO</span>
                    </a>
                </li>

                {{-- Profil Lulusan --}}
                <li>
                    <a href="{{ route('profil-lulusan-all.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('profil-lulusan-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('profil-lulusan-all.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="ms-3 text-sm">Profil Lulusan</span>
                    </a>
                </li>

                {{-- CPL --}}
                <li>
                    <a href="{{ route('cpl-all.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('cpl-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('cpl-all.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span class="ms-3 text-sm">CPL</span>
                    </a>
                </li>

                {{-- Bahan Kajian --}}
                <li>
                    <a href="{{ route('bahan-kajian-all.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('bahan-kajian-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('bahan-kajian-all.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span class="ms-3 text-sm">Bahan Kajian</span>
                    </a>
                </li>

                {{-- Mata Kuliah --}}
                <li>
                    <a href="{{ route('mata-kuliah-all.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('mata-kuliah-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('mata-kuliah-all.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <span class="ms-3 text-sm">Mata Kuliah</span>
                    </a>
                </li>

                {{-- CPMK --}}
                <li>
                    <a href="{{ route('cpmk-all.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('cpmk-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('cpmk-all.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ms-3 text-sm">CPMK</span>
                    </a>
                </li>

                <li class="pt-3">
                    <span class="ms-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pengguna</span>
                </li>
                <li>
                    <a href="{{ route('pengguna-all.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('pengguna-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('pengguna-all.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="ms-3 text-sm">Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa-all.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('mahasiswa-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('mahasiswa-all.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="ms-3 text-sm">Mahasiswa</span>
                    </a>
                </li>

                @if ($userRole == 'upm')
                    <li class="pt-3">
                        <span class="ms-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Evaluasi</span>
                    </li>
                    <li>
                        <a href="{{ route('evaluasi-upm-all.index') }}"
                            class="flex items-center p-2 rounded-lg transition-all duration-200
                            {{ request()->routeIs('evaluasi-upm-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                            <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('evaluasi-upm-all.*') ? 'text-white' : 'text-gray-500' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg>
                            <span class="ms-3 text-sm">Evaluasi UPM</span>
                        </a>
                    </li>
                @endif

                <li class="pt-3">
                    <span class="ms-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Laporan</span>
                </li>
                <li>
                    <a href="{{ route('cpl-mahasiswa-all.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('cpl-mahasiswa-all.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('cpl-mahasiswa-all.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="ms-3 text-sm">Laporan CPL Mahasiswa</span>
                    </a>
                </li>
            @endif

            {{-- Menu khusus admin --}}
            @if ($userRole == 'admin')
                {{-- Teknik Penilaian --}}
                <li>
                    <a href="{{ route('teknik-penilaian.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('teknik-penilaian.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('teknik-penilaian.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ms-3 text-sm">Teknik Penilaian</span>
                    </a>
                </li>

                {{-- Kriteria Penilaian --}}
                <li>
                    <a href="{{ route('kriteria-penilaian.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('kriteria-penilaian.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('kriteria-penilaian.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ms-3 text-sm">Kriteria Penilaian</span>
                    </a>
                </li>

                {{-- Model Pembelajaran --}}
                <li>
                    <a href="{{ route('model-pembelajaran.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('model-pembelajaran.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('model-pembelajaran.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span class="ms-3 text-sm">Model Pembelajaran</span>
                    </a>
                </li>

                {{-- Metode Pembelajaran --}}
                <li>
                    <a href="{{ route('metode-pembelajaran.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('metode-pembelajaran.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('metode-pembelajaran.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span class="ms-3 text-sm">Metode Pembelajaran</span>
                    </a>
                </li>

                {{-- Mahasiswa --}}
                <li>
                    <a href="{{ route('master-mahasiswa.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('master-mahasiswa.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('master-mahasiswa.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="ms-3 text-sm">Mahasiswa</span>
                    </a>
                </li>

                {{-- Kelas per Mata Kuliah --}}
                <li>
                    <a href="{{ route('ta.admin.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('ta.admin.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('ta.admin.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="ms-3 text-sm">Kelas per Mata Kuliah</span>
                    </a>
                </li>

                {{-- Kelola Pengguna --}}
                <li>
                    <a href="{{ route('admin.kelola-pengguna.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all duration-200
                        {{ request()->routeIs('admin.kelola-pengguna.*') ? 'bg-biru-custom text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-biru-custom' }}">
                        <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('admin.kelola-pengguna.*') ? 'text-white' : 'text-gray-500' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="ms-3 text-sm">Kelola Pengguna</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</aside>

{{-- JavaScript untuk toggle sidebar di mobile --}}
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('logo-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');
        const isOpen = !sidebar.classList.contains('-translate-x-full');

        if (isOpen) {
            closeSidebar();
        } else {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            iconOpen.classList.add('hidden');
            iconClose.classList.remove('hidden');
            document.body.classList.add('overflow-hidden', 'lg:overflow-auto');
        }
    }

    function closeSidebar() {
        const sidebar = document.getElementById('logo-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        iconOpen.classList.remove('hidden');
        iconClose.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Tutup sidebar saat resize ke desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            closeSidebar();
        }
    });
</script>
