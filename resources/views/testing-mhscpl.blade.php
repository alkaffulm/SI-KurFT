<x-layouts.app>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">
            Testing Penilaian Mahasiswa
        </h1>

        <div class="overflow-x-auto">

            <table class="min-w-full border">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">NIM</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">CPL</th>
                        <th class="border px-4 py-2">Tahun Akademik</th>
                        <th class="border px-4 py-2">Nilai CPL</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $row)

                        <tr>

                            <td class="border px-4 py-2">
                                {{ $row->nim }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $row->mahasiswa->nama_lengkap ?? '-' }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $row->cpl->nama_kode_cpl ?? '-' }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $row->tahunAkademik->tahun_akademik ?? '-' }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $row->nilai_cpl }}
                            </td>

                        </tr>

                    @endforeach
                </tbody>

            </table>

            <div class="mt-4">
                {{ $data->links() }}
            </div>

        </div>

    </div>

</x-layouts.app>