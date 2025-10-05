<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembobotanCPMKCPLRequest;
use App\Models\CPLCPMKBobotModel;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use App\Models\MK_CPMK_CPL_MapModel;

class PembobotanCPMKCPLController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
    }
    
    public function edit(MataKuliahModel $mataKuliah)
    {
        // Load relasi CPL dan CPMK yang terhubung dengan mata kuliah ini
        $mataKuliah->load(['cpls', 'cpmks']);

        $assocCpls = $mataKuliah->cpls->unique('id_cpl');
        $assocCpmks = $mataKuliah->cpmks->unique('id_cpmk');

        // Ambil peta korelasi yang valid untuk mata kuliah ini
        $correlationMap = MK_CPMK_CPL_MapModel::where('id_mk', $mataKuliah->id_mk)
            ->whereNotNull('id_cpmk') // Hanya ambil yang punya relasi ke CPMK
            ->get()
            ->groupBy('id_cpl') // Kelompokkan berdasarkan CPL
            ->map(function ($items) {
                // Untuk setiap CPL, buat daftar ID CPMK yang terhubung dengannya
                return $items->pluck('id_cpmk')->all();
            });

        // Ambil data bobot yang sudah ada untuk kombinasi CPL & CPMK ini
        $existingBobot = CPLCPMKBobotModel::where('id_mk', $mataKuliah->id_mk)
                                    ->whereIn('id_cpl', $assocCpls->pluck('id_cpl'))
                                    ->whereIn('id_cpmk', $assocCpmks->pluck('id_cpmk'))
                                    ->get()
                                    ->keyBy(function ($item) {
                                        return $item->id_cpl . '-' . $item->id_cpmk;
                                    });

        return view('pembobotan_cpmk_cpl_form', [
            'mataKuliah' => $mataKuliah,
            'assocCpls' => $assocCpls,
            'assocCpmks' => $assocCpmks,
            'existingBobot' => $existingBobot,
            'correlationMap' => $correlationMap
        ]);
    }

    public function update(StorePembobotanCPMKCPLRequest $request, MataKuliahModel $mataKuliah)
    {
        $validated = $request->validated();

        foreach ($validated['bobot'] ?? [] as $id_cpl => $cpmkBobots) {
            foreach ($cpmkBobots as $id_cpmk => $nilaiBobot) {
                CPLCPMKBobotModel::updateOrCreate(
                    [
                        'id_mk' => $mataKuliah->id_mk,
                        'id_ps' => $validated['id_ps'],
                        'id_kurikulum' => $validated['id_kurikulum'],
                        'id_cpl' => $id_cpl, 
                        'id_cpmk' => $id_cpmk
                    ],
                    ['bobot' => $nilaiBobot ?: 0]
                );
            }
        }

        return to_route('cpmk.index')->with('success', 'Pembobotan CPL-CPMK berhasil disimpan!');
    }
}
