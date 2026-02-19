<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MetodePembelajaranModel;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelPembelajaranModel;
use App\Http\Requests\UpdateAll\UpdateAllMetodePembelajaranRequest;
use App\Http\Requests\StoreMetodePembelajaranRequest;
use App\Models\TeknikPenilaianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MetodePembelajaranController extends Controller
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
        $metode_pembelajaran = MetodePembelajaranModel::all();
        return view('Admin.Metode Pembelajaran.metode_pembelajaran',
            ['metode_pembelajaran'=>$metode_pembelajaran]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.form.Metode Pembelajaran.formAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMetodePembelajaranRequest $request)
    {
        $id_ps = session('userRoleId');
        MetodePembelajaranModel::create([
            'nama_metode_pembelajaran' => $request->nama_metode_pembelajaran,
            'tipe_metode_pembelajaran' => $request->tipe_metode_pembelajaran,
            'id_ps' => $id_ps,
        ]);

        return to_route('metode-pembelajaran.index')->with('success', "Metode Pembelajaran berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function editAll(){
        $metode_pembelajaran = MetodePembelajaranModel::all();

        return view('Admin.form.Metode Pembelajaran.formEdit',
        ['metode_pembelajaran'=>$metode_pembelajaran]
        );
    }

    public function updateAll(UpdateAllMetodePembelajaranRequest $request)
    {
        // 1. Process deletions
        if ($request->has('delete_metode_pembelajaran')) {
            MetodePembelajaranModel::destroy($request->delete_metode_pembelajaran);
        }

        if (!$request->has('metode_pembelajaran')) {
            return redirect()->route('metode-pembelajaran.index')->with('success', 'Perubahan Metode Pembelajaran berhasil disimpan!');
        }

        $validatedData = $request->validated()['metode_pembelajaran'];

        // 3. Loop and update data
        foreach ($validatedData as $id => $data) {
            $metode_pembelajaran = MetodePembelajaranModel::find($id);
            if ($metode_pembelajaran) {
                $metode_pembelajaran->update($data);
            }
        }

        return redirect()->route('metode-pembelajaran.index')->with('success', 'Perubahan Metode Pembelajaran berhasil disimpan!');
    }    
    
    public function destroy(string $id)
    {
        //
    }
}
