<?php

namespace App\Http\Controllers\kaprodi;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCPLRequest;
use App\Http\Requests\UpdateAll\UpdateAllCPLRequest;
use App\Models\CPLModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\ProfilLulusanModel;
use App\Models\PEOModel;
use App\Models\CPLPLMapModel;
use App\Models\PLPEOMapModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CplController extends Controller
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
        $cpl = CPLModel::paginate(5);
        $profil_lulusan = ProfilLulusanModel::orderBy('kode_pl', 'asc')->get();
        $kurikulum = KurikulumModel::all();
        $programStudi = ProgramStudiModel::all();
        $peo = PEOModel::orderBy('kode_peo', 'asc')->get();
        $cpl_pl_raw = CPLPLMapModel::all();
        $cpl_pl_map = [];

        foreach ($cpl_pl_raw as $relasi) {
            $cpl_pl_map[$relasi->id_cpl][] = $relasi->id_pl;
        }

        $pl_peo_raw = PLPEOMapModel::all();
        $pl_peo_map = [];

        foreach ($pl_peo_raw as $relasi) {
            $pl_peo_map[$relasi->id_pl][] = $relasi->id_peo;
        }

        $cpl_peo_map = [];
        $cpl_pl = CPLPLMapModel::all();
        $pl_peo = PLPEOMapModel::all();

        foreach ($cpl_pl as $cp) {
            foreach ($pl_peo as $pp) {
                if ($cp->id_pl === $pp->id_pl) {
                    // Use array_unique to avoid duplicate PEO entries
                    $cpl_peo_map[$cp->id_cpl][] = $pp->id_peo;
                }
            }
        }

        return view(
            'cpl',
            [
                'cpl' => $cpl,
                'kurikulum' => $kurikulum,
                'programStudi' => $programStudi,
                'peo' => $peo,
                'profil_lulusan' => $profil_lulusan,
                'cpl_pl_map' => $cpl_pl_map,
                'pl_peo_map' => $pl_peo_map,
                'cpl_peo_map' => $cpl_peo_map
            ]
        );
    }

    /**
     * Show the form for creating a new resource. (UNCHANGED)
     */
    public function create()
    {
        $program_studi = ProgramStudiModel::all();
        $kurikulum = KurikulumModel::all();
        return view('form.cpl.cplFormAdd', ['program_studi' => $program_studi, 'kurikulum' => $kurikulum]);
    }

    /**
     * Store a newly created resource in storage. (UNCHANGED)
     */
    public function store(StoreCPLRequest $request)
    {
        CPLModel::create($request->validated());

        return to_route('cpl.index')->with('success', "CPL berhasil ditambahkan!");
    }

    /**
     * NEW: Show the form for editing all CPLs.
     */
    public function editAll()
    {
        $cpl_data = CPLModel::orderBy('nama_kode_cpl', 'asc')->get();
        $kurikulum = KurikulumModel::all(); // <-- ADD THIS LINE

        return view('form.cpl.cplFormEdit', [
            'cpl_data' => $cpl_data,
            'kurikulum' => $kurikulum // <-- ADD THIS LINE
        ]);
    }

    /**
     * NEW: Process the mass update and delete request.
     */
    public function updateAll(UpdateAllCPLRequest $request)
    {
        // 1. Process deletions
        if ($request->has('delete_cpl')) {
            CPLModel::destroy($request->delete_cpl);
        }

        if (!$request->has('cpl')) {
            return redirect()->route('cpl.index')->with('success', 'Perubahan CPL berhasil disimpan!');
        }

        // 2. Validate updates
        // $rules = [
        //     'cpl.*.nama_kode_cpl' => 'required|string|max:255',
        //     'cpl.*.desc' => 'required|string',
        //     'cpl.*.bobot_maksimum' => 'required|numeric', // <-- ADD THIS LINE
        //     'cpl.*.id_kurikulum' => 'required|exists:kurikulum,id_kurikulum', // <-- ADD THIS LINE


        // ];
        // $messages = [
        //     'cpl.*.nama_kode_cpl.required' => 'Setiap kolom Kode CPL wajib diisi.',
        //     'cpl.*.desc.required' => 'Setiap kolom Deskripsi wajib diisi.',
        //     'cpl.*.bobot_maksimum.required' => 'Setiap kolom Bobot Maksimum wajib diisi.', // <-- ADD THIS LINE
        //     'cpl.*.id_kurikulum.required' => 'Setiap kolom Kurikulum wajib dipilih.', // <-- ADD THIS LINE

        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return redirect()->route('cpl.editAll')->withErrors($validator)->withInput();
        // }

        $validatedData = $request->validated()['cpl'];

        // 3. Loop and update data
        foreach ($validatedData as $id => $data) {
            $cpl = CPLModel::find($id);
            if ($cpl) {
                $cpl->update($data);
            }
        }

        return redirect()->route('cpl.index')->with('success', 'Perubahan CPL berhasil disimpan!');
    }
}
