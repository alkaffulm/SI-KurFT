<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r-2 border-biru-custom sm:translate-x-0">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">

            {{-- MENU UTAMA --}}
            <li class="pt-2">
                <span class="ms-2 text-xs font-semibold text-gray-500 uppercase">Menu Utama</span>
            </li>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    {{-- Dashboard Icon --}}
                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            {{-- Menu khusus Dosen --}}
            @if ($userRole == 'dosen')
                <li>
                    <a href="{{ route('matkul.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Mata Kuliah Icon: Academic Cap --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                            </path>
                        </svg>
                        <span class="ms-3">Mata Kuliah Saya</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('rencana-asesmen.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Rencana Asesmen Icon: Clipboard List --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                        <span class="ms-3">Rencana Asesmen</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('evaluasi-mahasiswa.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Evaluasi Mahasiswa Icon: Chart Bar --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        <span class="ms-3">Evaluasi Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dosen_kelas.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Kelas per Mata Kuliah Icon: User Group --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span class="ms-3">Kelas per Mata Kuliah</span>
                    </a>
                    {{-- <a href="{{ route('pemetaan_mhs.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Mata Kuliah Icon --}}
                        {{-- <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span class="ms-3">Mahasiswa ke CPL</span>
                    </a> --}}
                </li>
            @endif

            {{-- Menu khusus Kaprodi --}}
            @if ($userRole == 'kaprodi')
                {{-- KURIKULUM --}}
                <li class="pt-2">
                    <span class="ms-2 text-xs font-semibold text-gray-500 uppercase">Kurikulum</span>
                </li>
                <li>
                    <a href="{{ route('peo.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- PEO Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="ms-3">PEO</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profil-lulusan.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Profil Lulusan Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="ms-3">Profil Lulusan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cpl.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- CPL Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                        <span class="ms-3">CPL</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('bahan-kajian.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Bahan Kajian Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <span class="ms-3">Bahan Kajian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mata-kuliah.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Mata Kuliah Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span class="ms-3">Mata Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cpmk.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- CPMK Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="ms-3">CPMK</span>
                    </a>
                </li>

                {{-- LAPORAN --}}
                <li class="pt-4">
                    <span class="ms-2 text-xs font-semibold text-gray-500 uppercase">Laporan</span>
                </li>
                <li>
                    <a href="{{ route('mhs-cpl.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Laporan CPL Mahasiswa Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        <span class="ms-3">Laporan CPL Mahasiswa</span>
                    </a>
                </li>
            @endif

            {{-- Menu khusus pimpinan dan UPM --}}
            @if ($userRole == 'pimpinan' || $userRole == 'upm')
                <li class="pt-4">
                    <span class="ms-2 text-xs font-semibold text-gray-500 uppercase">Kurikulum</span>
                </li>
                <li>
                    <a href="{{ route('peo-all.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- PEO Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="ms-3">PEO</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profil-lulusan-all.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Profil Lulusan Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="ms-3">Profil Lulusan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cpl-all.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- CPL Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                        <span class="ms-3">CPL</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('bahan-kajian-all.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Bahan Kajian Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <span class="ms-3">Bahan Kajian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mata-kuliah-all.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Mata Kuliah Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span class="ms-3">Mata Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cpmk-all.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- CPMK Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="ms-3">CPMK</span>
                    </a>
                </li>

                <li class="pt-2">
                    <span class="ms-2 text-xs font-semibold text-gray-500 uppercase">PENGGUNA</span>
                </li>

                <li>
                    <a href="{{ route('pengguna-all.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Kelola Pengguna Icon: Users (Pengaturan Pengguna) --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <span class="ms-3">Pengguna</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('mahasiswa-all.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Profil Lulusan Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="ms-3">Mahasiswa</span>
                    </a>
                </li>

                {{-- LAPORAN --}}
                <li class="pt-4">
                    <span class="ms-2 text-xs font-semibold text-gray-500 uppercase">Laporan</span>
                </li>
                <li>
                    <a href="{{ route('mhs-cpl.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Laporan CPL Mahasiswa Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        <span class="ms-3">Laporan CPL Mahasiswa</span>
                    </a>
                </li>                
            @endif
            {{-- Menu khusus admin --}}
            @if ($userRole == 'admin')
                <li>
                    <a href="{{ route('teknik-penilaian.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- PEO Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="ms-3">Teknik Penilaian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kriteria-penilaian.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Profil Lulusan Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="ms-3">Kriteria Penilaian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('model-pembelajaran.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- CPL Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                        <span class="ms-3">Model Pembelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('metode-pembelajaran.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Bahan Kajian Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <span class="ms-3">Metode Pembelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('master-mahasiswa.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Profil Lulusan Icon --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="ms-3">Mahasiswa</span>
                    </a>
                </li>
                <li>
                    {{-- Perhatikan: Route ini 'ta.admin.index' biasanya untuk Tahun Akademik --}}
                    <a href="{{ route('ta.admin.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Kelas per Mata Kuliah Icon: User Group (Sama dengan menu Dosen) --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span class="ms-3">Kelas per Mata Kuliah</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.kelola-pengguna.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        {{-- Kelola Pengguna Icon: Users (Pengaturan Pengguna) --}}
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <span class="ms-3">Kelola Pengguna</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</aside>
