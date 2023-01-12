<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Http\Requests\StoreMateriRequest;
use App\Http\Requests\UpdateMateriRequest;
use App\Models\Matakuliah;
use Intervention\Image\ImageManagerStatic;

class DashboardMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.materi.index', [
            'title' => 'Materi',
            'materis' => Materi::with('matakuliahs')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.materi.create', [
            'title' => 'Dashboard',
            'matakuliahs' => Matakuliah::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMateriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateriRequest $request)
    {

        Materi::create([
            'judul_materi' => $request->judul_materi,
            'id_matakuliah' => $request->id_matakuliah,
            'body' => $this->getContent($request->desc)
        ]);

        return redirect('/dashboard/materi')->with('success', 'Materi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        return view('dashboard.materi.edit', [
            'title' => 'Dashboard',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMateriRequest  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMateriRequest $request, Materi $materi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        Materi::destroy($materi->id);
        return redirect('/dashboard/materi')->with('success', "Materi $materi->nama berhasil dihapus!");
    }

    public function getContent($content)
    {
        // Artikel
        $storage = "storage/content-artikel";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent),6,6).'_'.time();
                $filePath = ("$storage/$fileNameContentRand.$mimetype");
                $image = ImageManagerStatic::make($src)->encode($mimetype, 100)->save(public_path($filePath));
                $new_src = asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            }
        }

        return $dom->saveHTML();
    }
}
