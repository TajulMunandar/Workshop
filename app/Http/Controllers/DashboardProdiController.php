<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;

class DashboardProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.prodi.index', [
            'title' => 'Prodi',
            'prodis' => Prodi::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdiRequest $request)
    {
        $validatedData = $request->validate([
            'name_prodi' => 'required|max:255',
            'nama_ketua_prodi' => 'required|max:255',
        ]);

        Prodi::create($validatedData);

        return redirect('/dashboard/prodi')->with('success', 'Prodi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdiRequest  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdiRequest $request, Prodi $prodi)
    {

        $validatedData = $request->validate([
            'name_prodi' => 'required|max:255',
            'nama_ketua_prodi' => 'required|max:255',
        ]);

        Prodi::where('id', $prodi->id)->update($validatedData);
        return redirect('/dashboard/prodi')->with('success', 'Prodi berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        Prodi::destroy($prodi->id);
        return redirect('/dashboard/prodi')->with('success', "Prodi $prodi->nama berhasil dihapus!");
    }
}
