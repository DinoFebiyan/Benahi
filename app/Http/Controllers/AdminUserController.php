<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserController extends Controller
{
    public function createForm()
    {
        return view('admin.create-teknisi');  // form tambah teknisi
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'teknisi',               // role tetap teknisi
            'email_verified_at' => now(),      // langsung diverifikasi
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Teknisi berhasil ditambahkan.');
    }
}
