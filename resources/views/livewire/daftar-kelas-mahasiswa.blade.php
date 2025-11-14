<div class="bg-white rounded-lg shadow p-4">
    <h3 class="text-lg font-semibold mb-3">Daftar Kelas yang Diambil</h3>
    @if(count($kelas) === 0)
        <div class="text-sm text-gray-500">Tidak ada data kelas untuk mahasiswa ini.</div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border rounded-lg">
                <thead class="bg-biru-custom text-white px-6 py-4 text-center">
                    <tr>
                        <th class="px-3 py-2">Kode MK</th>
                        <th class="px-3 py-2">Mata Kuliah</th>
                        <th class="px-3 py-2">Kelas</th>
                        <th class="px-3 py-2">Rata-rata Nilai Mata Kuliah Dihitung dari Nilai CPMK</th>
                    </tr>
                </thead>
                <tbody class="text-center py-4">
                    @foreach($kelas as $k)
                        @php
                            // PERBAIKAN: Mengambil rata-rata dari tabel PENILAIAN MAHASISWA CPMK
                            $rata = \Illuminate\Support\Facades\DB::table('penilaian_mahasiswa_cpmk as pmc')
                                ->join('kelas', 'pmc.id_kelas', '=', 'kelas.id_kelas')
                                ->where('pmc.nim', $nim)
                                ->where('kelas.id_mk', $k->id_mk)
                                // Menggunakan AVG dari nilai_rata (Nilai Akhir CPMK)
                                ->avg('pmc.nilai_rata'); 
                        @endphp
                        <tr class="border-t">
                            <td class="px-3 py-2">{{ $k->kode_mk ?? '-' }}</td>
                            <td class="px-3 py-2">{{ $k->nama_mk }}</td>
                            <td class="px-3 py-2">{{ $k->nama_kelas }}</td>
                            <td class="px-3 py-2 text-center">
                                {{ $rata !== null ? round($rata, 2) : '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>