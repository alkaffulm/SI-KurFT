<div class="bg-white rounded-lg shadow p-4">
    <h3 class="text-lg font-semibold mb-3">Tabel Laporan CPL Mahasiswa</h3>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left border">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-3 py-2">Kode CPL</th>
                    <th class="px-3 py-2">Deskripsi</th>
                    <th class="px-3 py-2 text-center">% Ketercapaian</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hasilCpl as $row)
                    <tr class="border-t">
                        <td class="px-3 py-2">{{ $row['kode'] }}</td>
                        <td class="px-3 py-2">{{ $row['deskripsi'] }}</td>
                        <td class="px-3 py-2 text-center">{{ $row['rata'] !== null ? $row['rata'].'%' : '-' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="p-4 text-center">Data tidak ditemukan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
