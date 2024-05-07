<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use Illuminate\Http\Request;
use App\Models\Pic;
use App\Models\Ruangan;

class AlatApicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $ruangan = Alat::all();
            return response()->json([
                'success' => true,
                'data' => $ruangan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve data from database.'
            ], 500);
        }
    }
}
