<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $userId = $request->query('userId');
            $status = $request->query('status');

            $kontaks = Kontak::query();
            $kontaks = $kontaks->with('detail_kontak');

            if (isset($userId)) {
                $kontaks = $kontaks->where('id_user', $userId);
            }

            if (isset($status)) {
                $kontaks = $kontaks->where('status', $status);
            }

            $kontaks = $kontaks->get();

            return response()->json([
                'success' => true,
                'kontaks' => $kontaks
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
            'id_user' => 'string|required',
            'topic' => 'string|nullable',
        ]);

        $kontak = Kontak::create([
            'id_user' => $validateData['id_user'],
            'status' => 'proses',
            'topic' => $validateData['topic']
        ]);
        // Return response
        return response()->json([
            'success' => 'true',
            'surats' => $kontak,
        ], 201);
    }
}
