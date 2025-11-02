<div class="bg-white rounded-lg shadow p-4">
    <h3 class="text-lg font-semibold mb-3">Daftar Kelas yang Diambil</h3>
    @if(count($kelas) === 0)
        <div class="text-sm text-gray-500">Tidak ada data kelas untuk mahasiswa ini.</div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 py-2">Kode MK</th>
                        <th class="px-3 py-2">Mata Kuliah</th>
                        <th class="px-3 py-2">Kelas</th>
                        <th class="px-3 py-2">Paralel</th>
                        <th class="px-3 py-2">Rata-rata Nilai (MK)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelas as $k)
                        @php
                            // Join ke kelas untuk mendapatkan id_mk
                            $rata = \Illuminate\Support\Facades\DB::table('penilaian_mahasiswa as pm')
                                ->join('kelas', 'pm.id_kelas', '=', 'kelas.id_kelas')
                                ->where('pm.id_mhs', $id_mhs)
                                ->where('kelas.id_mk', $k->id_mk)
                                ->avg('pm.nilai');
                        @endphp
                        <tr class="border-t">
                            <td class="px-3 py-2">{{ $k->kode_mk ?? '-' }}</td>
                            <td class="px-3 py-2">{{ $k->nama_mk }}</td>
                            <td class="px-3 py-2">{{ $k->nama_kelas }}</td>
                            <td class="px-3 py-2 text-center">{{ $k->paralel_ke }}</td>
                            <td class="px-3 py-2 text-center">{{ $rata !== null ? round($rata,2) : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>