<?php

namespace App\Http\Controllers;

use App\Models\StatusSurat;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStatusSuratRequest;
use App\Http\Requests\UpdateStatusSuratRequest;

class StatusSuratController extends Controller
{
    public function createStatusSurat($validatedData)
    {
        StatusSurat::create([
            'id_surat' => $validatedData['id'],
            'id_admin' => Auth::id(),
            'status' => $validatedData['status_surat'],
            'message' => $validatedData['message']
        ]);
    }
}
