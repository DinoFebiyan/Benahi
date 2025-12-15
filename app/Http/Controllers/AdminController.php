<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Teknisi;
use App\Models\Order;

class AdminController extends Controller
{
    // Dashboard Admin
    public function index()
    {
        $teknisis = Teknisi::withCount([
            'orders as total_selesai' => fn($q) => $q->where('status', 'selesai'),
            'orders as total_dikerjakan' => fn($q) => $q->where('status', 'diterima'),
            'orders as total_pending' => fn($q) => $q->where('status', 'pending'),
            'orders as total_ditolak' => fn($q) => $q->where('status', 'ditolak'),
        ])->get();

        return view('admin.dashboard', compact('teknisis'));
    }


    // Form tambah teknisi
    public function createForm()
    {
        return view('admin.create-teknisi');
    }

    // Simpan teknisi baru
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

        // Simpan ke tabel teknisis
        Teknisi::create([
            'nama'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Teknisi berhasil ditambahkan.');
    }
}
