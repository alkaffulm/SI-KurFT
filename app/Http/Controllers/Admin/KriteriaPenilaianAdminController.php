<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KriteriaPenilaianModel;
use App\Http\Requests\UpdateAll\UpdateAllKriteriaPenilaianRequest;
use App\Http\Requests\StoreKriteriaPenilaianRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KriteriaPenilaianAdminController extends Controller
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
        $kriteria_penilaian = KriteriaPenilaianModel::all();
        return view('Admin.Kriteria Penilaian.kriteria_penilaian',
            ['kriteria_penilaian'=>$kriteria_penilaian]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.form.Kriteria Penilaian.formAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKriteriaPenilaianRequest $request)
    {
        KriteriaPenilaianModel::create([
            'nama_kriteria_penilaian' => $request->nama_kriteria_penilaian,
            'id_ps' => Auth::user()->id_ps,
        ]);

        return to_route('kriteria-penilaian.index')->with('success', "kriteria Penilaian berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function editAll(){
        $kriteria_penilaian = KriteriaPenilaianModel::all();

        return view('Admin.form.Kriteria Penilaian.formEdit',
        ['kriteria_penilaian'=>$kriteria_penilaian]
        );
    }

    public function updateAll(UpdateAllKriteriaPenilaianRequest $request)
    {
        // 1. Process deletions
        if ($request->has('delete_kriteria_penilaian')) {
            KriteriaPenilaianModel::destroy($request->delete_kriteria_penilaian);
        }

        if (!$request->has('kriteria_penilaian')) {
            return redirect()->route('kriteria-penilaian.index')->with('success', 'Perubahan kriteria Penilaian berhasil disimpan!');
        }

        $validatedData = $request->validated()['kriteria_penilaian'];

        // 3. Loop and update data
        foreach ($validatedData as $id => $data) {
            $kriteria_penilaian = KriteriaPenilaianModel::find($id);
            if ($kriteria_penilaian) {
                $kriteria_penilaian->update($data);
            }
        }

        return redirect()->route('kriteria-penilaian.index')->with('success', 'Perubahan kriteria Penilaian berhasil disimpan!');
    }
 
    public function destroy(string $id)
    {
        //
    }
}
