<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\DetailKontak;
use Illuminate\Http\Request;

class DetailKontakApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $kontakId =$request->query('kontakId');

            $detailKontaks = DetailKontak::query();
            
            if (isset($kontakId)) {
                $detailKontaks = $detailKontaks->where('id_kontak', $kontakId);
            }

            $detailKontaks->orderBy('created_at', 'asc');
            $detailKontaks = $detailKontaks->get();

            return response()->json([
                'success' => true,
                'detail_kontaks' => $detailKontaks
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve data from database.'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_kontak' => 'string|required',
            'id_admin' => 'string|nullable',
            'id_user' => 'string|nullable',
            'message' => 'string' 
        ]);

        if (is_null($validateData['id_admin'])){
            $validateData['id_admin'] = 'null';
        }

        $detailKontak = DetailKontak::create([
            'id_kontak' => $validateData['id_kontak'],
            'id_admin' => $validateData['id_admin'],
            'id_user' => $validateData['id_user'],
            'message' => $validateData['message']
        ]);
        // Return response
        return response()->json([
            'success' => 'true',
            'detail_kontaks' => $detailKontak,
        ], 201);
    }
}
