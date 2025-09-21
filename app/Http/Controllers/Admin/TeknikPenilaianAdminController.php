<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeknikPenilaianRequest;
use App\Http\Requests\UpdateAll\UpdateAllTeknikPenilaianRequest;
use App\Models\TeknikPenilaianModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TeknikPenilaianAdminController extends Controller
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
        $teknik_penilaian = TeknikPenilaianModel::all();
        return view('Admin.Teknik Penilaian.teknik_penilaian',
            ['teknik_penilaian'=>$teknik_penilaian]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.form.Teknik Penilaian.formAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeknikPenilaianRequest $request)
    {
        TeknikPenilaianModel::create([
            'nama_teknik_penilaian' => $request->nama_teknik_penilaian,
            'kategori' => $request->kategori,
            'id_ps' => Auth::user()->id_ps,
        ]);

        return to_route('teknik-penilaian.index')->with('success', "Teknik Penilaian berhasil ditambahkan!");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function editAll(){
        $teknik_penilaian = TeknikPenilaianModel::all();

        return view('Admin.form.Teknik Penilaian.formEdit',
        ['teknik_penilaian'=>$teknik_penilaian]
        );
    }

    public function updateAll(UpdateAllTeknikPenilaianRequest $request)
    {
        // 1. Process deletions
        if ($request->has('delete_teknik_penilaian')) {
            TeknikPenilaianModel::destroy($request->delete_teknik_penilaian);
        }

        if (!$request->has('teknik_penilaian')) {
            return redirect()->route('teknik-penilaian.index')->with('success', 'Perubahan Teknik Penilaian berhasil disimpan!');
        }

        $validatedData = $request->validated()['teknik_penilaian'];

        // 3. Loop and update data
        foreach ($validatedData as $id => $data) {
            $teknik_penilaian = TeknikPenilaianModel::find($id);
            if ($teknik_penilaian) {
                $teknik_penilaian->update($data);
            }
        }

        return redirect()->route('teknik-penilaian.index')->with('success', 'Perubahan Teknik Penilaian berhasil disimpan!');
    }

    public function destroy(string $id)
    {
        //
    }
}
