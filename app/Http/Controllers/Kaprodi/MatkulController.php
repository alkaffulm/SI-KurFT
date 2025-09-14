<?php

namespace App\Http\Controllers\kaprodi;

use App\Models\CPLModel;
use App\Models\BKMKMapModel;
use Illuminate\Http\Request;
use App\Models\BKCPLMapModel;
use App\Models\MataKuliahModel;
use App\Models\BahanKajianModel;
use App\Models\ProgramStudiModel;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreMatkulRequest;
use App\Http\Requests\UpdateAll\UpdateAllMatkulRequest;
use App\Models\RPSModel;

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
        $mata_kuliah = MataKuliahModel::orderBy('kode_mk')->paginate(5);
        $bahan_kajian = BahanKajianModel::all();
        $cpl = CPLModel::all();
        $jumlah_bk = BahanKajianModel::count();
        $bk_cpl_raw = BKCPLMapModel::all();
        $bk_cpl_map = [];

        foreach ($bk_cpl_raw as $relasi) {
            $id_cpl = $relasi->id_cpl;
            $id_bk = $relasi->id_bk;

            if (!isset($bk_cpl_map[$id_cpl]) || !in_array($id_bk, $bk_cpl_map[$id_cpl])) {
                $bk_cpl_map[$id_cpl][] = $id_bk;
            }
        }
        $mata_kuliah2 = MataKuliahModel::all();
        $bk_mk_raw = BKMKMapModel::all();
        $bk_mk_map = [];

        foreach ($bk_mk_raw as $relasi) {
            $id_bk = $relasi->id_bk;
            $id_mk = $relasi->id_mk;

            if (!isset($bk_mk_map[$id_bk]) || !in_array($id_mk, $bk_mk_map[$id_bk])) {
                $bk_mk_map[$id_bk][] = $id_mk;
            }

        }

        $mk_cpl_map = [];

        foreach ($mata_kuliah as $mk) {
            $id_mk = $mk->id_mk;

            foreach ($bk_mk_map as $id_bk => $list_mk) {
                if (in_array($id_mk, $list_mk)) {
                    foreach ($bk_cpl_map as $id_cpl => $list_bk) {
                        if (in_array($id_bk, $list_bk)) {
                            $mk_cpl_map[$id_mk][] = $id_cpl;
                        }
                    }
                }
            }
    }    
    
        if (session('userRole') == 'kaprodi') {
            return view('matkul', [
                'mata_kuliah' => $mata_kuliah,
                'bahan_kajian'=>$bahan_kajian,
                'cpl'=>$cpl,
                'jumlah_bk'=>$jumlah_bk,
                'bk_cpl_map'=>$bk_cpl_map,
                'bk_mk_map'=> $bk_mk_map,
                'mk_cpl_map' => $mk_cpl_map,
            ]);
        }
        else {
            return view('dosen.matkul', ['mata_kuliah' => $mata_kuliah]);
        }
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
