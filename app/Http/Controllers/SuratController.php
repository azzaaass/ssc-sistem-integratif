<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Models\User;
use App\Models\Surat;
use App\Models\StatusSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function ruangan_index()
    {
        return view('user.surats.ruangan.create', [
            "title" => "SSC | Peminjaman ruangan"
        ]);
    }

    public function alat_index()
    {
        return view('user.surats.alat.create', [
            "title" => "SSC | Peminjaman alat"
        ]);
    }

    public function create_surat(Request $request)
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
            return redirect('/surats')->with('success', 'Surat berhasil dibuat');
        } else {
            return redirect('/surats')->with('error', 'Surat gagal dibuat');
        }
    }

    public function history()
    {
        $surats = User::find(Auth::id())->surat()->with('tipe')->where('status', '0')->paginate(8);
        return view('user.history', [
            "title" => "SSC | History",
            "surats" => $surats
        ]);
    }

    public function detail_surat(Surat $surat)
    {
        $antrean_surat = Surat::where('created_at', '<', $surat->created_at)->count() + 1;
        $is_revisi = ($surat->status_revisi == '1' ? true : false);
        $revisis = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->get();
        $revisi_now = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->orderBy('created_at', 'desc')->first();

        // Peminjaman Ruangan
        if ($surat->type == '1') {
            return view('user.surats.ruangan.preview', [
                "title" => "SSC | Detail Surat Ruangan",
                "surat" => $surat,
                "is_revisi" => $is_revisi,
                "revisis" => $revisis,
                "revisi_now" => $revisi_now,
                "antrean_surat" => $antrean_surat,
            ]);
        } else if ($surat->type == '2') {
            return view('user.surats.alat.preview', [
                "title" => "SSC | Detail Surat Alat",
                "surat" => $surat,
                "is_revisi" => $is_revisi,
                "revisis" => $revisis,
                "revisi_now" => $revisi_now,
                "antrean_surat" => $antrean_surat,
            ]);
        }
    }

    public function request_update_surat(Request $request)
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

        return redirect('/surats' . '/' . $validatedData['id'])->with('success', 'Data berhasil diubah');
    }

    public function delete_surat(Surat $surat)
    {
        $surat->delete();
        return redirect('/surats')->with('success', 'Data berhasil dihapus');
    }


    public function admin_surat()
    {
        $surats = Surat::where('status', '0')->paginate(8);
        return view('staff.admin.history', [
            "title" => "SSC | Surat Admin",
            "history_url" => "/surats/admin",
            "surats" => $surats
        ]);
    }

    public function admin_detail_surat(Surat $surat)
    {
        $antrean_surat = Surat::where('created_at', '<', $surat->created_at)->count() + 1;
        $is_revisi = ($surat->status_revisi == '1' ? true : false);
        $revisis = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->get();
        $revisi_now = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->orderBy('created_at', 'desc')->first();

        if ($surat->type == '1') {
            return view('staff.admin.surats.ruangan.preview', [
                "title" => "SSC | Detail Surat Ruangan (Admin)",
                "surat" => $surat,
                "is_revisi" => $is_revisi,
                "revisi_now" => $revisi_now,
                "revisis" => $revisis,
                "antrean_surat" => $antrean_surat,
            ]);
        } else if ($surat->type == '2') {
            return view('staff.admin.surats.alat.preview', [
                "title" => "SSC | Detail Surat Alat (Admin)",
                "surat" => $surat,
                "is_revisi" => $is_revisi,
                "revisi_now" => $revisi_now,
                "revisis" => $revisis,
                "antrean_surat" => $antrean_surat,
            ]);
        }
    }

    public function update_surat_request(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'string|required',
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
            'status_surat' => 'string',
            'target_pic' => 'string'
        ]);
        $surat = Surat::findOrFail($validatedData['id']);
        $surat->status_revisi = '0';
        if (isset($validatedData['input1_check']))
            $surat->input1 = $validatedData['input1'];
        if (isset($validatedData['input2_check']))
            $surat->input2 = $validatedData['input2'];
        if (isset($validatedData['input3_check']))
            $surat->input3 = $validatedData['input3'];
        if (isset($validatedData['input4_check']))
            $surat->input4 = $validatedData['input4'];
        if (isset($validatedData['input5_check']))
            $surat->input5 = $validatedData['input5'];
        if (isset($validatedData['input6_check']))
            $surat->input6 = $validatedData['input6'];
        if (isset($validatedData['input7_check']))
            $surat->input7 = $validatedData['input7'];
        if (isset($validatedData['input8_check']))
            $surat->input8 = $validatedData['input8'];
        if (isset($validatedData['input9_check']))
            $surat->input9 = $validatedData['input9'];
        if (isset($validatedData['input10_check']))
            $surat->input10 = $validatedData['input10'];

        $pic = null;
        if (isset($validatedData['target_pic'])) {
            $surat->id_pic = $validatedData['target_pic'];
            $pic = Pic::with('admin')->findOrFail($validatedData['target_pic']);
        }

        $statusSurat = new StatusSuratController;
        $statusSurat->createStatusSurat($validatedData, $pic);

        $surat->save();
        return redirect('/admin/surats' . '/' . $validatedData['id'])->with('success', 'Data berhasil diubah');
    }

    public function admin_delete_surat(Surat $surat)
    {
        $surat->delete();
        return redirect('admin/surats')->with('success', 'Data berhasil dihapus');
    }

    public function pic_surat()
    {
        $id_user = Auth::id();
        $surats = Surat::with('pic')
            ->where('status', '0')
            ->whereHas('pic', function ($query) use ($id_user) {
                $query->where('id_admin', '=', $id_user);
            })
            ->paginate(8);

        return view('staff.pic.history', [
            "title" => "SSC | Surat PIC",
            "surats" => $surats
        ]);
    }

    public function pic_detail_surat(Surat $surat)
    {
        $antrean_surat = Surat::where('created_at', '<', $surat->created_at)->count() + 1;
        $revisis = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->get();
        $revisi_now = StatusSurat::with('admin')->where('id_surat', '=', $surat->id)->orderBy('created_at', 'desc')->first();

        if ($surat->type == '1') {
            return view('staff.pic.surats.ruangan.preview', [
                "title" => "SSC | Detail Surat PIC",
                "surat" => $surat,
                "is_revisi" => false,
                "revisi_now" => $revisi_now,
                "revisis" => $revisis,
                "antrean_surat" => $antrean_surat,
            ]);
        } else if ($surat->type == '2') {
            return view('staff.pic.surats.alat.preview', [
                "title" => "SSC | Detail Surat PIC",
                "surat" => $surat,
                "is_revisi" => false,
                "revisi_now" => $revisi_now,
                "revisis" => $revisis,
                "antrean_surat" => $antrean_surat,
            ]);

        }
    }

    public function update_surat_final(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'string|required',
            'input1' => 'string',
            'input2' => 'string',
            'input3' => 'string',
            'input4' => 'string',
            'input5' => 'string',
            'input6' => 'string',
            'input7' => 'string',
            'input8' => 'string',
            'input9' => 'string',
            'input10' => 'string',
            'message' => 'string',
        ]);
        $surat = Surat::findOrFail($validatedData['id']);

        $surat->input1 = $validatedData['input1'];
        $surat->input2 = $validatedData['input2'];
        $surat->input3 = $validatedData['input3'];
        $surat->input4 = $validatedData['input4'];
        $surat->input5 = $validatedData['input5'];
        $surat->input6 = $validatedData['input6'];
        $surat->input7 = $validatedData['input7'];
        $surat->input8 = $validatedData['input8'];
        $surat->input9 = $validatedData['input9'];
        $surat->input10 = $validatedData['input10'];

        $pic = null;
        if ($request->status_surat == "setuju") {
            $pic = Pic::findOrFail($request->id_pic);
            if ($pic->id === $pic->id_next_pic) {
                $surat->id_pic = $pic->id;
                $surat->status = "1";
                $validatedData['status_surat'] = "5"; // status:selesai
            } else {
                $surat->id_pic = $pic->id_next_pic;
                $validatedData['status_surat'] = "4";

                $pic = Pic::with('admin')->findOrFail($surat->id_pic);
            }
        } else {
            $surat->id_pic = null;
            $validatedData['status_surat'] = "6"; // status:ditolak
        }

        $statusSurat = new StatusSuratController;
        $statusSurat->createStatusSurat($validatedData, $pic);

        $surat->save();
        return redirect('/pic/surats')->with('success', 'Data berhasil diubah');
    }
}
