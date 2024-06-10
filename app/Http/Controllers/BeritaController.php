<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        return view('user.informasi.berita.index', [
            'title' => 'SSC | Berita'
        ]);
    }
}
