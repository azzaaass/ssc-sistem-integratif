<?php

namespace App\Http\Controllers;

use App\Models\StatusSurat;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStatusSuratRequest;
use App\Http\Requests\UpdateStatusSuratRequest;

class StatusSuratController extends Controller
{
    public function createStatusSurat($validatedData, $pic)
    {
        if (isset($pic)) {
            StatusSurat::create([
                'id_surat' => $validatedData['id'],
                'id_admin' => Auth::id(),
                'status' => $validatedData['status_surat'],
                'message' => $validatedData['message'],
                'pic_name' => $pic->admin->name
            ]);
        } else {
            StatusSurat::create([
                'id_surat' => $validatedData['id'],
                'id_admin' => Auth::id(),
                'status' => $validatedData['status_surat'],
                'message' => $validatedData['message'],
            ]);
        }
    }
}
