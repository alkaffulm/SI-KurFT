<div>
    <div class="flex gap-6 mb-6">
        <div class="w-56">
            <label class="block text-sm font-medium text-gray-700">Angkatan</label>
            <select wire:model.live="angkatan" class="mt-1 block w-full rounded-md border-gray-300 p-2">
                <option value="">-- Pilih Angkatan --</option>
                @foreach($angkatanList as $a)
                    <option value="{{ $a }}">{{ $a }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-80">
            <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
            <select wire:model.live="nim" class="mt-1 block w-full rounded-md border-gray-300 p-2" {{ empty($daftarMahasiswa) ? 'disabled' : '' }}>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($daftarMahasiswa as $m)
                    <option value="{{ $m->nim }}">{{ $m->nama_lengkap }} ({{ $m->nim }})</option>
                @endforeach
            </select>
        </div>
    </div>
    
    @if($nim)
        <div class="space-y-4">
            @livewire('daftar-kelas-mahasiswa', ['nim' => $nim], key('kelas-'.$nim))
            @livewire('laporan-nilai-cpl', ['nim' => $nim], key('cpl-'.$nim))
        </div>
    @else
        <div class="text-sm text-gray-500">Pilih angkatan dan mahasiswa untuk melihat laporan.</div>
    @endif
</div>