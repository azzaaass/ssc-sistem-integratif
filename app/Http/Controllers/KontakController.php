<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreKontakRequest;
use App\Http\Requests\UpdateKontakRequest;

class KontakController extends Controller
{
    public function index()
    {
        try {
            // Mengirim permintaan GET ke API
            $response = Http::get('http://127.0.0.1:8000/api/kontak?userId=' . Auth::user()->id);

            // Memeriksa apakah respons sukses
            if ($response->successful()) {
                // Mengambil data dari respons
                $kontaks = $response->json();
                // $kontaks = $kontaks->kontaks;
            } else {
                // Menangani kesalahan respons
                $kontaks = [];
                // Anda bisa menambahkan pesan kesalahan atau log disini
            }
        } catch (\Exception $e) {
            // Menangani kesalahan koneksi atau permintaan
            $kontaks = [];
            // Anda bisa menambahkan pesan kesalahan atau log disini
        }

        return view('user.informasi.kontak.index', [
            'title' => 'SSC | Kontak admin',
            'kontaks' => $kontaks
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
     * @param  \App\Http\Requests\StoreKontakRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/kontak', [
            'id_user' => $request['id_user'],
            'topic' => $request['topic']
        ]);

        if ($response->successful()) {
            return redirect('/kontak')->with('success', 'Topik berhasil dibuat');
        } else {
            return redirect('/kontak')->with('error', 'Topik gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function show(Kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKontakRequest  $request
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKontakRequest $request, Kontak $kontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontak $kontak)
    {
        //
    }
}
