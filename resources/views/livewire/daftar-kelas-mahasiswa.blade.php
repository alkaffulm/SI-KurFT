<div class="bg-white rounded-lg shadow p-4">
    <h3 class="text-lg font-semibold mb-3">Daftar Kelas yang Diambil</h3>
    @if(count($kelas) === 0)
        <div class="text-sm text-gray-500">Tidak ada data kelas untuk mahasiswa ini.</div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border rounded-lg">
                <thead class="bg-teks-biru-custom text-white px-6 py-4 text-center">
                    <tr>
                        <th class="px-3 py-2">Kode MK</th>
                        <th class="px-3 py-2">Mata Kuliah</th>
                        <th class="px-3 py-2">Kelas</th>
                        <th class="px-3 py-2">Rata-rata Bobot Mata Kuliah Dihitung dari Bobot CPMK</th>
                    </tr>
                </thead>
                <tbody class="text-center py-4">
                    {{-- @foreach($kelas as $k)
                        @php
                        
                            // bobot mk itu berada di tabel mk_cpmk_bobot, didapat dari menotalkan seluruh cpmk yang ada di mk tersebut (harusnya 100)
                            // nilai mahasiswa itu berada di table penilaian_mahasiswa dan itu belum di covert
                            // cara mendapatkan bobot mhs dari nilai inputan adalah bobot mhs = (nilai input x bobot max komponen evaluasi)/100

                            // nilai input diambil dari tabel penilaian_mahasiswa sesuai dengan nim, id_rencana_asesmen, dan id_cpmk
                            // bobot max itu diambil dari rencana_asesmen_cpmk_bobot yang sama id_rencana_asesmennya dan ditotal bobotnya
                            $rata = \Illuminate\Support\Facades\DB::table('penilaian_mahasiswa')
                                ->join('kelas', 'penilaian_mahasiswa.id_kelas', '=', 'kelas.id_kelas')
                                ->where('penilaian_mahasiswa.nim', $nim)
                                ->where('kelas.id_mk', $k->id_mk)
                                ->avg('AVG(penilaian_mahasiswa.nilai * bobot.bobot / 100)')
                        @endphp
                        <tr class="border-t">
                            <td class="px-3 py-2">{{ $k->kode_mk ?? '-' }}</td>
                            <td class="px-3 py-2">{{ $k->nama_mk }}</td>
                            <td class="px-3 py-2">{{ $k->nama_kelas }}</td>
                            <td class="px-3 py-2 text-center">
                                {{ $rata !== null ? round($rata, 2) : '-' }}
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    @endif
</div>