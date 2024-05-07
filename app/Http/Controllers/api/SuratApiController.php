<?php

namespace App\Http\Controllers\API;

use App\Models\Surat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuratApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $userId = $request->header('X-User-ID');
            $staffId = $request->header('X-Staff-ID');
            $search = $request->header('search');
            $status = $request->header('status');
            $pagination = $request->header('pagination');

            $surat = Surat::query();
            $surat = $surat->with('tipe');

            if (isset($userId)) {
                $surat = $surat->where('id_user', $userId);
            }

            if (isset($staffId)) {
                $surat = $surat->where('id_pic', $staffId);
            }

            if (isset($search)) {
                $surat = $surat->where('id', 'like', '%' . $search . '%');
            }

            if (isset($status)) {
                $surat = $surat->where('status', $status);
            }

            
            if (isset($pagination)) {
                $surat = $surat->paginate($pagination);
            } else {
                $surat = $surat->get();
            }

            return response()->json([
                'success' => true,
                'surats' => $surat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve data from database.'
            ], 500);
        }
    }
}