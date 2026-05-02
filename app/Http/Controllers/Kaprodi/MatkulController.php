<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller; 
use App\Http\Requests\StoreMatkulRequest;
use App\Http\Requests\UpdateAll\UpdateAllMatkulRequest;
use App\Models\Kelas;
use App\Models\MataKuliahModel;
use App\Models\ModelPembelajaranModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;

class MatkulController extends Controller
{
    public function index()
    {
        $relationsToLoad = ['bahanKajian.cpls', 'rps', 'koordinatorMk', 'pengembangRps'];
        // $mata_kuliah = MataKuliahModel::with($relationsToLoad)
        //                             ->orderBy('semester')
        //                             ->paginate(10, ['*'], 'mata-kuliah');

        $searchMatkul = request('search_matkul');

        $mata_kuliah = MataKuliahModel::with($relationsToLoad)
            ->when($searchMatkul, function ($query) use ($searchMatkul) {
                $query->where(function ($q) use ($searchMatkul) {
                    $q->where('kode_mk', 'like', '%' . $searchMatkul . '%')
                    ->orWhere('nama_matkul_id', 'like', '%' . $searchMatkul . '%')
                    ->orWhere('nama_matkul_en', 'like', '%' . $searchMatkul . '%');
                });
            })
            ->orderBy('semester')
            ->paginate(10, ['*'], 'mata-kuliah')
            ->withQueryString();

        // $tanggungJawabDosen = MataKuliahModel::tanggungJawabDosen(Auth::id())
        //                                    ->with($relationsToLoad) 
        //                                     ->orderBy('semester')
        //                                    ->paginate(10, ['*'], 'mata-kuliah');

        $tanggungJawabDosen = MataKuliahModel::tanggungJawabDosen(Auth::id())
            ->with($relationsToLoad)
            ->when($searchMatkul, function ($query) use ($searchMatkul) {
                $query->where(function ($q) use ($searchMatkul) {
                    $q->where('kode_mk', 'like', '%' . $searchMatkul . '%')
                        ->orWhere('nama_matkul_id', 'like', '%' . $searchMatkul . '%')
                        ->orWhere('nama_matkul_en', 'like', '%' . $searchMatkul . '%');
                });
            })
            ->orderBy('semester')
            ->paginate(5, ['*'], 'tanggung-jawab-dosen')
            ->withQueryString();

        $userRole = session()->get('userRole');
        $userRoleId = session('userRoleId');

        $searchKelas = request('search_kelas');

        $Kelas = Kelas::withoutGlobalScopes()
            ->with(['mataKuliahModel' => function ($query) {
                $query->withoutGlobalScopes();
            }])
            ->where(['id_user' => Auth::id()])
            ->whereHas('mataKuliahModel', function ($query) use ($userRoleId, $searchKelas) {
                $query->withoutGlobalScopes()
                    ->where('id_ps', '!=', $userRoleId)
                    ->when($searchKelas, function ($q) use ($searchKelas) {
                        $q->where(function ($sub) use ($searchKelas) {
                            $sub->where('kode_mk', 'like', '%' . $searchKelas . '%')
                                ->orWhere('nama_matkul_id', 'like', '%' . $searchKelas . '%');
                        });
                    });
            })            
            ->paginate(5, ['*'], 'kelas')
            ->withQueryString();

        if ($userRole == 'kaprodi') {
            return view('matkul', [
                'mata_kuliah' => $mata_kuliah,
                'tanggungJawabDosen' => $tanggungJawabDosen,
            ]);
        }
        elseif($userRole == 'pimpinan' || $userRole == 'upm'){
            return view('pimpinanUpm.mataKuliahAll');
        }
        else {
            return view('dosen.matkul', [
                'mata_kuliah' => $mata_kuliah, 
                'tanggungJawabDosen' => $tanggungJawabDosen,
                'kelas' => $Kelas
            ]);
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
        $mata_kuliah = MataKuliahModel::orderBy('semester')->get();  
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
