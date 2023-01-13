<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // $matakuliahs = Matakuliah::with('materis')->get();
        $materi = Materi::whereHas('matakuliahs', function ($query) {
            $query->where('id_prodi', auth()->user()->id_prodi);
        })->get();

        return view('homepage.beranda', [
            'title' => 'Dashboard',
            'materis' => $materi,
        ]);
    }
}
