<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePEORequest;
use App\Models\PEOModel;
use Illuminate\Http\Request;

class PeoController extends Controller
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
       $peo = PEOModel::all();

       return view('peo', ['peo' => $peo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.PEO.peoFormAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePEORequest $request)
    {
        PEOModel::create($request->validated());

        return redirect('peo')->with('success', 'PEO berhasil tambahkan!');

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
    public function edit(PEOModel $peo)
    {
        return view('form.PEO.peoFormEdit', ['peo' => $peo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePEORequest $request, PEOModel $peo)
    {
        $peo->update($request->validated());

        return redirect('peo')->with('success', 'PEO berhil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PEOModel $peo)
    {
        $peo->delete();

        return redirect('peo')->with('success', 'PEO berhasil dihapus!');
    }
}
