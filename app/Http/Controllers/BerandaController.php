<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('homepage.beranda', [
            'title' => 'Dashboard',
        ]);
    }
}
