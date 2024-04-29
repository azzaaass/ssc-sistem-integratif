<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        // Ambil ID pengguna yang terautentikasi
        $userId = Auth::id();

        // Ambil parameter ID dari URL
        $requestedId = $request->route('id');
        // Periksa apakah parameter ID sesuai dengan ID pengguna
        if ($userId != $requestedId) {
            // Jika tidak sesuai, kembalikan respon 'Unauthorized'
            return response()->json([
                'user_id' => $userId,
                'route_id' => $requestedId,
                'message' => 'Unauthorized.'], 403);
        }

        // Jika sesuai, lanjutkan ke proses berikutnya
        return $next($request);
    }
}
