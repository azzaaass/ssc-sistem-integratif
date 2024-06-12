<?php

namespace App\Http\Controllers;

use App\Models\DetailKontak;
use App\Http\Requests\StoreDetailKontakRequest;
use App\Http\Requests\UpdateDetailKontakRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DetailKontakController extends Controller
{
    public function index($id)
    {
        try {
            // Mengirim permintaan GET ke API
            $response = Http::get('http://127.0.0.1:8000/api/detailKontak?kontakId=' . $id);

            // Memeriksa apakah respons sukses
            if ($response->successful()) {
                // Mengambil data dari respons
                $detail_kontaks = $response->json();
                // $detail_kontaks = $detail_kontaks->detail_kontaks;
            } else {
                // Menangani kesalahan respons
                $detail_kontaks = [];
                // Anda bisa menambahkan pesan kesalahan atau log disini
            }
        } catch (\Exception $e) {
            // Menangani kesalahan koneksi atau permintaan
            $detail_kontaks = [];
            // Anda bisa menambahkan pesan kesalahan atau log disini
        }

        return view('user.informasi.kontak.detail', [
            'title' => 'SSC | Kontak admin',
            'detail_kontaks' => $detail_kontaks,
            'id' => $id
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

    public function store(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/detailKontak', [
            'id_kontak' => $request['id_kontak'],
            'id_admin' => $request['id_admin'],
            'id_user' => $request['id_user'],
            'message' => $request['message'],
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
     * @param  \App\Models\DetailKontak  $detailKontak
     * @return \Illuminate\Http\Response
     */
    public function show(DetailKontak $detailKontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailKontak  $detailKontak
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailKontak $detailKontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailKontakRequest  $request
     * @param  \App\Models\DetailKontak  $detailKontak
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailKontakRequest $request, DetailKontak $detailKontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailKontak  $detailKontak
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailKontak $detailKontak)
    {
        //
    }
}
