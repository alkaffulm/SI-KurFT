<?php

namespace App\Http\Controllers\Kaprodi;

use App\Models\CPLModel;
use App\Models\RPSModel;
use App\Models\UserModel;
use App\Models\BKMKMapModel;
use Illuminate\Http\Request;
use App\Models\BKCPLMapModel;
use App\Models\MataKuliahModel;
use App\Models\BahanKajianModel;
use App\Models\UserRoleMapModel;
use App\Models\ProgramStudiModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreMatkulRequest;
use App\Http\Requests\UpdateAll\UpdateAllMatkulRequest;
use App\Models\ModelPembelajaranModel;

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
        $relationsToLoad = ['bahanKajian.cpls', 'rps', 'koordinatorMk', 'pengembangRps'];

        $mata_kuliah = MataKuliahModel::with($relationsToLoad)
                                    ->orderBy('kode_mk')
                                    ->paginate(5, ['*'], 'mata-kuliah');

        $tanggungJawabDosen = MataKuliahModel::tanggungJawabDosen(Auth::id())
                                           ->with($relationsToLoad) 
                                           ->paginate(5, ['*'], 'mata-kuliah');

        $bahan_kajian = BahanKajianModel::all();
        $cpl = CPLModel::all();
        $jumlah_bk = BahanKajianModel::count();

        $mk_cpl_map = [];
        foreach ($mata_kuliah as $mk) {
            $cplIds = $mk->bahanKajian->flatMap(function ($bahanKajian) {
                return $bahanKajian->cpls;
            })->unique('id_cpl')->pluck('id_cpl')->toArray();
            
            $mk_cpl_map[$mk->id_mk] = $cplIds;
        }

        if (session('userRole') == 'kaprodi') {
            return view('matkul', [
                'mata_kuliah' => $mata_kuliah,
                'tanggungJawabDosen' => $tanggungJawabDosen,
                'bahan_kajian'=>$bahan_kajian,
                'cpl'=>$cpl,
                'jumlah_bk'=>$jumlah_bk,
                'mk_cpl_map' => $mk_cpl_map,
            ]);
        }
        else {
            return view('dosen.matkul', ['mata_kuliah' => $mata_kuliah, 'tanggungJawabDosen' => $tanggungJawabDosen]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosenProdi = UserModel::forProdi(session('userRoleId'))->isDosen()->get();
        $modelPembelajaran = ModelPembelajaranModel::all();

        return view('form.Matkul.matkulFormAdd',['dosenProdi' => $dosenProdi, 'modelPembelajaran' => $modelPembelajaran]);
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
        $dosenProdi = UserModel::forProdi(session('userRoleId'))->isDosen()->get();
 
        return view('form.Matkul.matkulFormEdit', ['mata_kuliah' => $mata_kuliah, 'dosenProdi' => $dosenProdi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAll(UpdateAllMatkulRequest $request)
    { 
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
