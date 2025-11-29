<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PenggunaAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.pengguna.login');
    }

    public function showRegisterForm()
    {
        return view('auth.pengguna.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'pengguna']))) {

            $request->session()->regenerate();

            return redirect()->route('pengguna.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => 'pengguna',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('pengguna.dashboard');
    }
}
