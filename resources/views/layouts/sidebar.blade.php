<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r border-gray-200 sm:translate-x-0">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            {{-- Menu untuk semua role --}}
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M10 2.5a.75.75 0 0 1 .75.75v.755a3 3 0 0 1 4.5 0v-.755a.75.75 0 0 1 1.5 0v.755a4.5 4.5 0 0 1 1.977 3.037.75.75 0 0 1-1.494.116 3 3 0 0 0-5.966 0 .75.75 0 0 1-1.494-.116A4.5 4.5 0 0 1 8.5 4v-.75A.75.75 0 0 1 10 2.5Z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M3.75 8a.75.75 0 0 1 .75.75v10.5c0 .414.336.75.75.75h13.5a.75.75 0 0 0 .75-.75V8.75a.75.75 0 0 1 1.5 0v10.5A2.25 2.25 0 0 1 18.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.75A.75.75 0 0 1 3.75 8Zm6-1a2.25 2.25 0 0 1 4.5 0v.25a.75.75 0 0 1-1.5 0V7a.75.75 0 0 0-1.5 0v.25a.75.75 0 0 1-1.5 0V7Z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            {{-- Menu khusus Kaprodi & Pimpinan --}}
            @if ($userRole == 'kaprodi' || $userRole == 'pimpinan')
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.75 2.75a.75.75 0 0 0-1.5 0v1.5h-1.5a.75.75 0 0 0 0 1.5h1.5v1.5a.75.75 0 0 0 1.5 0v-1.5h1.5a.75.75 0 0 0 0-1.5h-1.5v-1.5Z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M8.25 4.5a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 .75.75v2.25h1.5a.75.75 0 0 1 0 1.5h-1.5v1.5a.75.75 0 0 1-1.5 0v-1.5h-4.5v1.5a.75.75 0 0 1-1.5 0v-1.5h-1.5a.75.75 0 0 1 0-1.5h1.5V4.5Zm.75 3V5.25h4.5V7.5h-4.5Z"
                                clip-rule="evenodd"></path>
                            <path d="M5 11.25a.75.75 0 0 0 0 1.5h14a.75.75 0 0 0 0-1.5H5Z"></path>
                            <path d="M5 15.75a.75.75 0 0 0 0 1.5h14a.75.75 0 0 0 0-1.5H5Z"></path>
                        </svg>
                        <span class="ms-3">Manajemen Kurikulum</span>
                    </a>
                </li>
            @endif

            {{-- Menu khusus Dosen --}}
            @if ($userRole == 'dosen')
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M6 3.75A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6ZM7.5 6A1.5 1.5 0 0 1 9 7.5v3A1.5 1.5 0 0 1 7.5 12h-3A1.5 1.5 0 0 1 3 10.5v-3A1.5 1.5 0 0 1 4.5 6h3Zm9 0A1.5 1.5 0 0 1 18 7.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 12 10.5v-3A1.5 1.5 0 0 1 13.5 6h3Z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ms-3">Mata Kuliah Saya</span>
                    </a>
                </li>
            @endif

            {{-- Menu khusus Kaprodi & Pimpinan --}}
            @if ($userRole == 'kaprodi' || $userRole == 'pimpinan')
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M4.5 3A1.5 1.5 0 0 0 3 4.5v15A1.5 1.5 0 0 0 4.5 21h15a1.5 1.5 0 0 0 1.5-1.5v-15A1.5 1.5 0 0 0 19.5 3h-15Zm4.163 3.962a.75.75 0 0 1 1.05-.17l6 4.5a.75.75 0 0 1 0 1.416l-6 4.5a.75.75 0 1 1-.88-1.184L14.342 12 8.833 8.038a.75.75 0 0 1-.17-1.076Z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ms-3">Laporan & Evaluasi</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</aside>
