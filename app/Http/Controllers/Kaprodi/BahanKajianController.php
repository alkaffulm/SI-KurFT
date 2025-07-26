<?php

namespace App\Http\Controllers\kaprodi;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBahanKajianRequest;
use App\Models\BahanKajianModel;
use App\Models\CPLModel;
use App\Models\BKCPLMapModel;
use App\Models\BKMKMapModel;
use App\Models\MataKuliahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import the Validator facade

class BahanKajianController extends Controller
{
    public function __construct()
    {
        view()->share('userRole', session()->get('userRole'));
    }

    /**
     * Display a listing of the resource. (UNCHANGED)
     */
    public function index()
    {
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
        $mata_kuliah = MataKuliahModel::all();
        $bk_mk_raw = BKMKMapModel::all();
        $bk_mk_map = [];

        foreach ($bk_mk_raw as $relasi) {
            $id_bk = $relasi->id_bk;
            $id_mk = $relasi->id_mk;

            if (!isset($bk_mk_map[$id_bk]) || !in_array($id_mk, $bk_mk_map[$id_bk])) {
                $bk_mk_map[$id_bk][] = $id_mk;
            }
        }

        return view('bk', [
            'bahan_kajian' => $bahan_kajian,
            'cpl' => $cpl,
            'bk_cpl_map' => $bk_cpl_map,
            'jumlah_bk' => $jumlah_bk,
            'bk_mk_map' => $bk_mk_map,
            'mata_kuliah' => $mata_kuliah
        ]);
    }

    /**
     * Show the form for creating a new resource. (UNCHANGED)
     */
    public function create()
    {
        return view('form.bk.bkFormAdd');
    }

    /**
     * Store a newly created resource in storage. (UNCHANGED)
     */
    public function store(StoreBahanKajianRequest $request)
    {
        BahanKajianModel::create($request->validated());
        return to_route('bahan-kajian.index')->with('success', 'Bahan Kajian baru berhasil ditambahkan!');
    }


    // ====================================================================
    // == NEW METHODS FOR MASS EDIT, UPDATE, AND DELETE FUNCTIONALITY ==
    // ====================================================================

    /**
     * NEW: Show the form for editing all Bahan Kajian.
     */
    public function editAll()
    {
        $bk_data = BahanKajianModel::orderBy('nama_kode_bk', 'asc')->get();
        return view('form.bk.bkFormEdit', ['bk_data' => $bk_data]);
    }

    /**
     * NEW: Process the mass update and delete request.
     */
    public function updateAll(Request $request)
    {
        // 1. Process deletions
        if ($request->has('delete_bk')) {
            BahanKajianModel::destroy($request->delete_bk);
        }

        if (!$request->has('bk')) {
            return redirect()->route('bahan-kajian.index')->with('success', 'Perubahan Bahan Kajian berhasil disimpan!');
        }

        // 2. Validate updates
        $rules = [
            'bk.*.nama_kode_bk' => 'required|string|max:255',
            'bk.*.nama_bk' => 'required|string|max:255',
            'bk.*.desc_bk_id' => 'required|string',
        ];
        $messages = [
            'bk.*.nama_kode_bk.required' => 'Setiap kolom Kode BK wajib diisi.',
            'bk.*.nama_bk.required' => 'Setiap kolom Nama BK wajib diisi.',
            'bk.*.desc_bk_id.required' => 'Setiap kolom Deskripsi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('bahan-kajian.editAll')->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated()['bk'];

        // 3. Loop and update data
        foreach ($validatedData as $id => $data) {
            $bk = BahanKajianModel::find($id);
            if ($bk) {
                $bk->update($data);
            }
        }

        return redirect()->route('bahan-kajian.index')->with('success', 'Perubahan Bahan Kajian berhasil disimpan!');
    }
}
