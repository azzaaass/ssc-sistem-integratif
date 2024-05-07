<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        return view('user.auth', [
            "title" => "SSC | Login"
        ]);
    }

    public function login_check(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::guard('user')->attempt($credentials)) { // remember disini
            return redirect('/');
        } else {
            return redirect('/admin/login')->with('error', 'Username atau password salah');
        }
    }

    public function login_admin()
    {
        return view('staff.auth', [
            "title" => "SSC | Login Admin"
        ]);
    }

    public function login_admin_check(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            if (Auth::guard('admin')->user()->role == "1") {
                return redirect('/admin/surats');
            } else {
                return redirect('/pic/surats');
            }
        } else {
            return redirect('/admin/login')->with('error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect('/');
    }
}
