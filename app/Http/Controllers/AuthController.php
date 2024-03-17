<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // halaman registrasi
    public function registerForm()
    {
        return view('auth.register', [
            "title" => "SSC | Register"
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function loginForm()
    {
        return view('auth.login', [
            "title" => "SSC | Login"
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::guard('user')->attempt($credentials)) { // remember disini
            return redirect('/');
        } else {
            return redirect('/login')->with('error', 'Username atau password salah');
        }
    }

    public function loginAdminForm()
    {
        return view('admin.auth.login', [
            "title" => "SSC | Login Admin"
        ]);
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/ruangan');
        } else {
            return redirect('/loginAdmin')->with('error', 'Username atau password salah');
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
