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
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve data from database.'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'string',
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
            'id_user' => $validatedData['id_user'],
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
         // Return response
         return response()->json([
            'success' => 'true',
            'surats' => $surat,
        ], 201);
    }
}