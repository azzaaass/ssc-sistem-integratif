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
            $picId = $request->header('X-Pic-ID');
            $search = $request->header('search');
            $status = $request->header('status');
            $pagination = $request->header('pagination');

            // if (isset($search) && isset($status)) {
            //     $surat = Surat::where('status', $status)->with('tipe')->where('id_user', $userId)->where('id', 'like', '%' . $search . '%')->get();
            // } else if (isset($status)) {
            //     $surat = Surat::where('status', $status)->with('tipe')->where('id_user', $userId)->get();
            // } else {
            //     $surat = Surat::all();
            // }

            $surat = Surat::query();
            $surat = $surat->with('tipe');

            if (isset($userId)) {
                $surat = $surat->where('id_user', $userId);
            }

            if (isset($picId)) {
                $surat = $surat->where('id_pic', $picId);
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