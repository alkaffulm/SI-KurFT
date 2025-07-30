<div class=" mt-20 ml-8 mr-8 mb-6 p-4 bg-white rounded-xl shadow-xl">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-gray-800">Pilih Kurikulum</h3>
        @if(config('app.debug'))
            <button onclick="toggleDebug()" class="text-xs bg-gray-200 px-2 py-1 rounded">
                Debug Info
            </button>
        @endif
    </div>
    
    <div class="mb-4">
        <label for="kurikulum" class="block text-sm font-medium text-gray-700 mb-2">
            Kurikulum Aktif:
        </label>
        <select wire:model.live="kurikulum" 
                id="kurikulum" 
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            @forelse($kurikulumList as $item)
                <option value="{{ $item->tahun }}">
                    Kurikulum {{ $item->tahun }}
                </option>
            @empty
                <option value="">Tidak ada kurikulum tersedia</option>
            @endforelse
        </select>
        
        @if($kurikulumList->isEmpty())
            <p class="mt-2 text-sm text-red-600">
                Tidak ada kurikulum yang ditemukan untuk program studi ini.
            </p>
        @endif
    </div>
    
    {{-- Current Status --}}
    <div class="text-sm text-gray-600">
        <p><strong>Kurikulum Terpilih:</strong> {{ $kurikulum ?? 'Belum dipilih' }}</p>
        <p><strong>ID Kurikulum Aktif:</strong> {{ session('id_kurikulum_aktif') ?? 'Tidak ada' }}</p>
    </div>
    
    {{-- Debug Info (hanya tampil jika APP_DEBUG=true) --}}
    @if(config('app.debug'))
        <div id="debug-info" class="mt-4 p-3 bg-gray-100 rounded text-xs" style="display: none;">
            <h4 class="font-semibold mb-2">Debug Information:</h4>
            <pre>{{ json_encode($debug, JSON_PRETTY_PRINT) }}</pre>
            
            <h4 class="font-semibold mt-3 mb-2">Session Data:</h4>
            <pre>{{ json_encode([
                'tahun' => session('tahun'),
                'id_kurikulum_aktif' => session('id_kurikulum_aktif'),
                'userRoleId' => session('userRoleId')
            ], JSON_PRETTY_PRINT) }}</pre>
            
            <h4 class="font-semibold mt-3 mb-2">Available Kurikulum:</h4>
            <pre>{{ json_encode($kurikulumList->toArray(), JSON_PRETTY_PRINT) }}</pre>
        </div>
        
        <script>
            function toggleDebug() {
                const debugDiv = document.getElementById('debug-info');
                debugDiv.style.display = debugDiv.style.display === 'none' ? 'block' : 'none';
            }
        </script>
    @endif
</div>