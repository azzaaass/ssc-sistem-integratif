<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function ruangan()
    {
        return view('surats.ruangan.index', [
            "title" => "SSC | Peminjaman ruangan"
            // "title" => Auth::id()
        ]);
    }

    public function prosesRuangan(Request $request)
    {
        $validatedData = $request->validate([
            'keperluan' => 'required|string',
            'keterangan' => 'required|string',
            'hari_peminjaman' => 'required',
            'selesai_peminjaman' => 'required',
            'nama_peminjam' => 'required|string',
            'nama_penanggung_jawab1' => 'required|string',
            'nama_penanggung_jawab2' => 'required|string'
        ]);
        $surat = Surat::create([
            'id_user' => Auth::id(),
            'id_admin' => '0',
            'estimasi' => '5',
            'type' => '1',
            'input1' => $validatedData['keperluan'],
            'input2' => $validatedData['keterangan'],
            'input3' => $validatedData['hari_peminjaman'],
            'input4' => $validatedData['selesai_peminjaman'],
            'input5' => $validatedData['nama_peminjam'],
            'input6' => $validatedData['nama_penanggung_jawab1'],
            'input7' => $validatedData['nama_penanggung_jawab2'],
        ]);
        if ($surat->wasRecentlyCreated) {
            // Data berhasil dimasukkan
            return redirect('/ruangan')->with('success', 'Data berhasil dimasukkan');
        } else {
            // Data gagal dimasukkan
            return redirect('/ruangan')->with('error', 'Gagal memasukkan data');
        }
    }
}
