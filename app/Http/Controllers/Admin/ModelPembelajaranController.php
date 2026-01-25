<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelPembelajaranModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAll\UpdateAllModelPembelajaranRequest;
use App\Http\Requests\StoreModelPembelajaranRequest;
use App\Models\TeknikPenilaianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ModelPembelajaranController extends Controller
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
        $model_pembelajaran = ModelPembelajaranModel::all();
        return view('Admin.Model Pembelajaran.model_pembelajaran',
            ['model_pembelajaran'=>$model_pembelajaran]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.form.Model Pembelajaran.formAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(StoreModelPembelajaranRequest $request)
    {
        $id_ps = session('userRoleId');
        ModelPembelajaranModel::create([
            'nama_model_pembelajaran' => $request->nama_model_pembelajaran,
            'id_ps' => $id_ps,
        ]);

        return to_route('model-pembelajaran.index')->with('success', "Teknik Penilaian berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function editAll(){
        $model_pembelajaran = ModelPembelajaranModel::all();

        return view('Admin.form.Model Pembelajaran.formEdit',
        ['model_pembelajaran'=>$model_pembelajaran]
        );
    }

    public function updateAll(UpdateAllModelPembelajaranRequest $request)
    {
        // 1. Process deletions
        if ($request->has('delete_model_pembelajaran')) {
            ModelPembelajaranModel::destroy($request->delete_model_pembelajaran);
        }

        if (!$request->has('model_pembelajaran')) {
            return redirect()->route('model_pembelajaran.index')->with('success', 'Perubahan Teknik Penilaian berhasil disimpan!');
        }

        $validatedData = $request->validated()['model_pembelajaran'];

        // 3. Loop and update data
        foreach ($validatedData as $id => $data) {
            $model_pembelajaran = ModelPembelajaranModel::find($id);
            if ($model_pembelajaran) {
                $model_pembelajaran->update($data);
            }
        }

        return redirect()->route('model-pembelajaran.index')->with('success', 'Perubahan Teknik Penilaian berhasil disimpan!');
    }    

    public function destroy(string $id)
    {
        //
    }
}
