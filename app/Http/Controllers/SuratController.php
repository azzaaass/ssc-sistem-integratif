<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
use App\Models\StatusSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function ruangan()
    {
        return view('surats.ruangan.index', [
            "title" => "SSC | Peminjaman ruangan"
        ]);
    }

    public function createSurat(Request $request)
    {
        $validatedData = $request->validate([
            'estimasi' => 'string',
            'type' => 'string|required',
            'input1' => 'string',
            'input2' => 'string',
            'input3' => 'string',
            'input4' => 'string',
            'input5' => 'string',
            'input6' => 'string',
            'input7' => 'string',
            'input8' => 'string',
            'input9' => 'string',
            'input10' => 'string'
        ]);

        $surat = Surat::create([
            'id_user' => Auth::id(),
            'id_admin' => '0',
            'estimasi' => $validatedData['estimasi'],
            'status' => '0',
            'type' => $validatedData['type'],
            'input1' => $validatedData['input1'],
            'input2' => $validatedData['input2'],
            'input3' => $validatedData['input3'],
            'input4' => $validatedData['input4'],
            'input5' => $validatedData['input5'],
            'input6' => $validatedData['input6'],
            'input7' => $validatedData['input7'],
            'input8' => $validatedData['input8'],
            'input9' => $validatedData['input9'],
            'input10' => $validatedData['input10'],
            'status_revisi' => '0'
        ]);

        if ($surat->wasRecentlyCreated) {
            return redirect('/history')->with('success', 'Data berhasil dimasukkan');
        } else {
            return redirect('/history')->with('error', 'Gagal memasukkan data');
        }
    }

    public function history()
    {
        $historys = User::find(Auth::id())->surat;
        return view('history.index', [
            "title" => "SSC | History",
            "historys" => $historys
        ]);
    }

    public function detailSurat(Surat $surat)
    {
        // Peminjaman Ruangan
        $is_revisi = ($surat->status_revisi == '1' ? true : false);
        $revisis = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->get();
        $revisi_now = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->orderBy('created_at', 'desc')->limit(1)->get();
        // dd(isset($revisi[0]));
        if ($surat->type == '1') {
            return view('surats.ruangan.preview', [
                "title" => "SSC | Detail Surat",
                "surat" => $surat,
                "is_revisi" => $is_revisi,
                "revisis" => $revisis,
                "revisi_now" => $revisi_now
            ]);
        }
    }

    public function requestUpdateSurat(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'string|required',
            'deskripsi' => 'string|required',
            'input1' => 'string',
            'input2' => 'string',
            'input3' => 'string',
            'input4' => 'string',
            'input5' => 'string',
            'input6' => 'string',
            'input7' => 'string',
            'input8' => 'string',
            'input9' => 'string',
            'input10' => 'string'
        ]);

        $surat = Surat::findOrFail($validatedData['id']);

        $surat->status_revisi = '1';
        $surat->deskripsi = $validatedData['deskripsi'];
        $surat->input1_revisi = $validatedData['input1'];
        $surat->input2_revisi = $validatedData['input2'];
        $surat->input3_revisi = $validatedData['input3'];
        $surat->input4_revisi = $validatedData['input4'];
        $surat->input5_revisi = $validatedData['input5'];
        $surat->input6_revisi = $validatedData['input6'];
        $surat->input7_revisi = $validatedData['input7'];
        $surat->input8_revisi = $validatedData['input8'];
        $surat->input9_revisi = $validatedData['input9'];
        $surat->input10_revisi = $validatedData['input10'];

        $surat->save();

        return redirect('/detailSurat' . '/' . $validatedData['id'])->with('success', 'Data berhasil diubah');
    }

    public function deleteSurat(Surat $surat)
    {
        $surat->delete();
        return redirect('/history')->with('success', 'Data berhasil dihapus');
    }


    public function suratAdmin()
    {
        $surats = Surat::where('status', '0')->get();
        return view('admin.surat.index', [
            "title" => "SSC | Surat Admin",
            "surats" => $surats
        ]);
    }

    public function detailSuratAdmin(Surat $surat)
    {
        $is_revisi = ($surat->status_revisi == '1' ? true : false);
        $revisis = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->get();
        $revisi_now = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->orderBy('created_at', 'desc')->get();

        if ($surat->type == '1') {
            return view('admin.surat.previewAdmin', [
                "title" => "SSC | Detail Surat Admin",
                "surat" => $surat,
                "is_revisi" => $is_revisi,
                "revisi_now" => $revisi_now,
                "revisis" => $revisis
            ]);
        }
    }

    public function updateSuratRequest(Request $request)
    {
        // if (!isset($request))

        $validatedData = $request->validate([
            'id' => 'string|required',
            'deskripsi' => 'string|required',
            'input1' => 'string',
            'input1_check' => 'string',
            'input2' => 'string',
            'input2_check' => 'string',
            'input3' => 'string',
            'input3_check' => 'string',
            'input4' => 'string',
            'input4_check' => 'string',
            'input5' => 'string',
            'input5_check' => 'string',
            'input6' => 'string',
            'input6_check' => 'string',
            'input7' => 'string',
            'input7_check' => 'string',
            'input8' => 'string',
            'input8_check' => 'string',
            'input9' => 'string',
            'input9_check' => 'string',
            'input10' => 'string',
            'input10_check' => 'string',
            'message' => 'string',
            'status_surat' => 'string'
        ]);

        $surat = Surat::findOrFail($validatedData['id']);

        $surat->status_revisi = '0';
        $surat->deskripsi = $validatedData['deskripsi'];
        if (isset ($validatedData['input1_check']))
            $surat->input1 = $validatedData['input1'];
        if (isset ($validatedData['input2_check']))
            $surat->input2 = $validatedData['input2'];
        if (isset ($validatedData['input3_check']))
            $surat->input3 = $validatedData['input3'];
        if (isset ($validatedData['input4_check']))
            $surat->input4 = $validatedData['input4'];
        if (isset ($validatedData['input5_check']))
            $surat->input5 = $validatedData['input5'];
        if (isset ($validatedData['input6_check']))
            $surat->input6 = $validatedData['input6'];
        if (isset ($validatedData['input7_check']))
            $surat->input7 = $validatedData['input7'];
        if (isset ($validatedData['input8_check']))
            $surat->input8 = $validatedData['input8'];
        if (isset ($validatedData['input9_check']))
            $surat->input9 = $validatedData['input9'];
        if (isset ($validatedData['input10_check']))
            $surat->input10 = $validatedData['input10'];

        $statusSurat = new StatusSuratController;
        $statusSurat->createStatusSurat($validatedData);

        $surat->save();

        return redirect('/detailSuratAdmin' . '/' . $validatedData['id'])->with('success', 'Data berhasil diubah');
    }
}
