<?php

namespace App\Http\Controllers;

use App\Models\Prodis;
use App\Http\Requests\StoreProdisRequest;
use App\Http\Requests\UpdateProdisRequest;

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
     * @param  \App\Http\Requests\StoreProdisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodis  $prodis
     * @return \Illuminate\Http\Response
     */
    public function show(Prodis $prodis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodis  $prodis
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodis $prodis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdisRequest  $request
     * @param  \App\Models\Prodis  $prodis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdisRequest $request, Prodis $prodis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodis  $prodis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodis $prodis)
    {
        //
    }
}
