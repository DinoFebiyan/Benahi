<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class TeknisiDashboardController extends Controller
{
    public function dashboard()
    {
        // cari teknisi berdasarkan email user yang login
        $teknisi = Teknisi::where('email', auth()->user()->email)->first();

        // kalau tidak ketemu, return kosong atau error
        if (!$teknisi) {
            return redirect()->back()->with('error', 'Data teknisi tidak ditemukan');
        }

        // ambil semua order untuk teknisi ini
        $orders = Order::where('teknisi_id', $teknisi->id)
                       ->with('user')
                       ->get();

        // mapping ke event kalender
        $events = $orders->map(function ($order) {
            return [
                'title' => 'Servis: '.$order->detail_kerusakan,
                'start' => $order->created_at, 
                'color' => match($order->status) {
                    'Diterima oleh teknisi' => '#16a34a',
                    'Ditolak oleh teknisi' => '#dc2626',
                    'Selesai' => '#2563eb',
                    default => '#facc15',
                },
            ];
        });

        return view('teknisi.dashboard', compact('orders', 'events'));
    }
}
