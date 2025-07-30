<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\CPLModel;
use App\Models\MataKuliahModel;
use App\Models\RPSModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class RPSController extends Controller
{
    public function __construct()
    {
        $userRole = session()->get('userRole');

        return view()->share('userRole', $userRole);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_kuliah = MataKuliahModel::all();

        return view('dosen/rps', ['mata_kuliah' => $mata_kuliah]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id_mk = $request->query('id_mk');
        $mata_kuliah = MataKuliahModel::findOrFail($id_mk);

        $cpl = CPLModel::all();
        $dosen = UserModel::where('id_ps', session('userProfiId'))->get();

        return view('rps.create', ['mata_kuliah' => $mata_kuliah, 'cpl' => $cpl, 'dosen' => $dosen]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_mk' => 'required|exists:mata_kuliah,id_mk',
            'id_dosen_penyusun' => 'required|exists:users,id_user',
            'deskripsi_singkat' => 'nullable|string',
            'cpl_ids' => 'required|array',
            'cpl_ids.*' => 'exists:cpl,id_cpl', // Pastikan setiap ID CPL valid
        ]);

        $rps = RPSModel::create([
            'id_mk' => $validated['id_mk'],
            'id_dosen_penyusun' => $validated['id_dosen_penyusun'],
            'deskripsi_singkat' => $validated['deskripsi_singkat'],
            'id_kurikulum' => session('active_kurikulum_id'), // Ambil dari sesi
            'id_ps' => session('userProdiId'), // Ambil dari sesi
            'tanggal_disusun' => now(),
        ]);

        $rps->cpls()->sync($validated['cpl_ids']);

        return to_route('rps.show')->with('success', 'Berhasi membuat data induk RPS');
    }

    /**
     * Display the specified resource.
     */
    public function show(RPSModel $rps)
    {
        return view('rps.show', ['rps' => $rps]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
