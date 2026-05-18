<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\KetercapaianCpl;
use App\Models\PenilaianMahasiswa;
use App\Models\MahasiswaModel;
use App\Services\KetercapaianCplService;

class TestingMhsCplController extends Controller
{
    public function index()
    {
        $service = app(KetercapaianCplService::class);

        $nimList = PenilaianMahasiswa::query()
            ->select('nim')
            ->distinct()
            ->pluck('nim');

        foreach ($nimList as $nim) {
            $mahasiswa = MahasiswaModel::where('nim', $nim)->first();

            if (!$mahasiswa) {
                continue;
            }

            $service->recalculateMahasiswa(
                $mahasiswa->nim,
                $mahasiswa->id_ps,
                $mahasiswa->id_kurikulum
            );
        }

        $data = KetercapaianCpl::with([
                'mahasiswa',
                'cpl',
                'tahunAkademik'
            ])
            ->orderBy('nim')
            ->orderBy('id_tahun_akademik')
            ->orderBy('id_cpl')
            ->paginate(20);

        return view('testing-mhscpl', compact('data'));
    }
}