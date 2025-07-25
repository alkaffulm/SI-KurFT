<?php

namespace App\Http\Controllers\kaprodi;

use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreMatkulRequest;
use App\Http\Requests\UpdateAll\UpdateAllMatkulRequest;
use App\Models\MataKuliahModel;
use App\Models\ProgramStudiModel;
use Illuminate\Http\Request;

class MatkulController extends Controller
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
        $mata_kuliah = MataKuliahModel::orderBy('kode_mk')->get();
        return view('matkul', ['mata_kuliah' => $mata_kuliah]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_kuliah = MataKuliahModel::all();
        $program_studi = ProgramStudiModel:: all();

        return view('form.Matkul.matkulFormAdd',['mata_kuliah' => $mata_kuliah, 'program_studi' => $program_studi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatkulRequest $request)
    {
        MataKuliahModel::create($request->validated());

        return to_route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editAll()
    {     
        $mata_kuliah = MataKuliahModel::orderBy('kode_mk')->get();   
        return view('form.Matkul.matkulFormEdit', ['mata_kuliah' => $mata_kuliah]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAll(UpdateAllMatkulRequest $request)
    {   
        // $mata_kuliah->update($request->validated());
        if ($request->has('delete_ids')) {
            MataKuliahModel::destroy($request->delete_ids);
        }

        if (!$request->has('matkul')) {
            return to_route('mata-kuliah.index')->with('success', 'Mata Kuliah Disimpan');
        }

        $validatedData = $request->validated()['matkul'];

        foreach ( $validatedData as $id_mk => $data) {
            $matkul = MataKuliahModel::find($id_mk);
            if($matkul) {
                $matkul->update($data);
            }
        }

        return to_route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliahModel $mata_kuliah)
    {
        $mata_kuliah->delete();

        return to_route('mata-kuliah.index')->with('success', 'Mata Kuliah telah dihapus');
    }
}
