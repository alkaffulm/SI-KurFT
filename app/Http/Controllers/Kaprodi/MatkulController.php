<?php

namespace App\Http\Controllers\Kaprodi;

use App\Models\UserModel;
use App\Models\MataKuliahModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreMatkulRequest;
use App\Http\Requests\UpdateAll\UpdateAllMatkulRequest;
use App\Models\ModelPembelajaranModel;

class MatkulController extends Controller
{
    public function index()
    {
        $relationsToLoad = ['bahanKajian.cpls', 'rps', 'koordinatorMk', 'pengembangRps'];
        $mata_kuliah = MataKuliahModel::with($relationsToLoad)
                                    ->orderBy('kode_mk')
                                    ->paginate(5, ['*'], 'mata-kuliah');

        $tanggungJawabDosen = MataKuliahModel::tanggungJawabDosen(Auth::id())
                                           ->with($relationsToLoad) 
                                           ->paginate(5, ['*'], 'mata-kuliah');
        $userRole = session()->get('userRole');

        if ($userRole == 'kaprodi') {
            return view('matkul', [
                'mata_kuliah' => $mata_kuliah,
                'tanggungJawabDosen' => $tanggungJawabDosen,
            ]);
        }
        elseif($userRole == 'pimpinan' || $userRole == 'upm'){
            return view('pimpinanUpm.mataKuliahAll', ['mata_kuliah' => $mata_kuliah]);
        }
        else {
            return view('dosen.matkul', ['mata_kuliah' => $mata_kuliah, 'tanggungJawabDosen' => $tanggungJawabDosen]);
        }
    }

    public function create()
    {
        $dosenProdi = UserModel::forProdi(session('userRoleId'))->isDosen()->get();
        $modelPembelajaran = ModelPembelajaranModel::all();

        return view('form.Matkul.matkulFormAdd',['dosenProdi' => $dosenProdi, 'modelPembelajaran' => $modelPembelajaran]);
    }

    public function store(StoreMatkulRequest $request)
    {
        MataKuliahModel::create($request->validated());
        return to_route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    public function editAll()
    {             
        $mata_kuliah = MataKuliahModel::orderBy('kode_mk')->get();  
        $dosenProdi = UserModel::forProdi(session('userRoleId'))->isDosen()->get();
 
        return view('form.Matkul.matkulFormEdit', ['mata_kuliah' => $mata_kuliah, 'dosenProdi' => $dosenProdi]);
    }

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

}
