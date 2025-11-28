<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use App\Models\MK_CPMK_CPL_MapModel; 
use App\Models\MKCPMKBobotModel;

class BobotController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
    }

    public function bobotCPMKperMK($id_mk)
    {
        $mk = MataKuliahModel::findOrFail($id_mk);

        $mapping = MK_CPMK_CPL_MapModel::with(['cpmk', 'cpl'])
            ->where('id_mk', $id_mk)
            ->get();

        $idMappings = $mapping->pluck('id_mk_cpmk_cpl');

        $bobots = MKCPMKBobotModel::whereIn('id_mk_cpmk_cpl', $idMappings)
            ->pluck('bobot', 'id_mk_cpmk_cpl'); 

        return view('form.bobot.bobot-cpmk-mk-form', compact('mk', 'mapping', 'bobots'));
    }

    public function updateBobotCPMK(Request $request, $id_mk)
    {
        $mapping = MK_CPMK_CPL_MapModel::where('id_mk', $id_mk)->get();

        if ($mapping->count() === 0) {
            return redirect()->back()->with('error', 'Mapping CPMK tidak ditemukan untuk mata kuliah ini.');
        }

        $inputBobots = $request->input('bobot', []); 

        foreach ($mapping as $m) {
            $mappingId = $m->id_mk_cpmk_cpl;
            $bobotBaru = $inputBobots[$mappingId] ?? null;

            if ($bobotBaru === null) {
                continue;
            }

            if (!is_numeric($bobotBaru)) {
                return back()->with('error', 'Bobot harus berupa angka.');
            }

            MKCPMKBobotModel::updateOrCreate(
                ['id_mk_cpmk_cpl' => $mappingId],
                ['bobot' => intval($bobotBaru)]
            );
        }

        return redirect()
            ->route('bobot.cpmk.edit', $id_mk)
            ->with('success', 'Bobot CPMK berhasil diperbarui.');
    }


}
