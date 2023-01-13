<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Http\Requests\StoreMatakuliahRequest;
use App\Http\Requests\UpdateMatakuliahRequest;
use App\Models\Prodi;
use App\Models\User;

class DashboardMatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $matakuliahs = Matakuliah::with('prodis', 'users')->get();
        return view('dashboard.matakuliah.index', [
            'title' => 'Mata Kuliah',
            'prodis' => Prodi::all(),
            'users' => User::all(),
        ])->with(compact('matakuliahs'));
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
     * @param  \App\Http\Requests\StoreMatakuliahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatakuliahRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'id_prodi' => 'required|max:255',
            'id_user' => 'required|max:10'
        ]);

        Matakuliah::create($validatedData);

        return redirect('/dashboard/matakuliah')->with('success', 'Mata Kuliah berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatakuliahRequest  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatakuliahRequest $request, Matakuliah $matakuliah)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'id_prodi' => 'required|max:255',
        ]);

        Matakuliah::where('id', $matakuliah->id)->update($validatedData);
        return redirect('/dashboard/matakuliah')->with('success', 'Prodi berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        Matakuliah::destroy($matakuliah->id);
        return redirect('/dashboard/matakuliah')->with('success', "Prodi $matakuliah->nama berhasil dihapus!");
    }
}
