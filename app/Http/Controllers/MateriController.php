<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        return view('materi.materi', [
            'title' => 'Materi',
        ]);
    }

    public function materi($id)
    {
        $materi = Materi::find($id);
        return view('materi.materi', [
            'title' => 'Materi',
            'materi' => $materi
        ]);
    }
}
