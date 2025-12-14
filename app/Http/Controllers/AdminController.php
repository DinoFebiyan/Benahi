<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Teknisi;


class AdminController extends Controller
{
    public function createForm()
    {
        return view('admin.create-teknisi');  // form tambah teknisi
    }

    // public function create(Request $request)
    // {
    //     $request->validate([
    //         'name'     => 'required|min:3',
    //         'email'    => 'required|email|unique:users,email',
    //         'password' => 'required|min:6',
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => 'teknisi',               // role tetap teknisi
    //         'email_verified_at' => now(),      // langsung diverifikasi
    //     ]);

    //     return redirect()->route('admin.dashboard')->with('success', 'Teknisi berhasil ditambahkan.');
    // }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users,email|unique:teknisis,email',
            'password' => 'required|min:6',
        ]);

        // Simpan ke tabel users
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'teknisi',
            'email_verified_at' => now(),
        ]);

        // Simpan ke tabel teknisis (minimal nama dan email)
        Teknisi::create([
            'nama'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Teknisi berhasil ditambahkan.');
    }

}
