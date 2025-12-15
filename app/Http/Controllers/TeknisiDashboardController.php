<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class TeknisiDashboardController extends Controller
{
    // public function dashboard()
    // {
    //     // cari teknisi berdasarkan email user yang login
    //     $teknisi = Teknisi::where('email', auth()->user()->email)->first();

    //     // kalau tidak ketemu, return kosong atau error
    //     if (!$teknisi) {
    //         return redirect()->back()->with('error', 'Data teknisi tidak ditemukan');
    //     }

    //     // ambil semua order untuk teknisi ini
    //     $orders = Order::where('teknisi_id', $teknisi->id)
    //                    ->with('user')
    //                    ->get();

    //     // mapping ke event kalender
    //     $events = $orders->map(function ($order) {
    //         return [
    //             'title' => 'Servis: '.$order->detail_kerusakan,
    //             'start' => $order->tanggal_servis, 
    //             'color' => match($order->status) {
    //                 'diterima' => '#16a34a',
    //                 'ditolak' => '#dc2626',
    //                 'Selesai' => '#2563eb',
    //                 default => '#facc15',
    //             },
    //         ];
    //     });

    //     return view('teknisi.dashboard', compact('orders', 'events'));
    // }

    public function dashboard()
{
    // cari teknisi berdasarkan email user yang login
    $teknisi = Teknisi::where('email', auth()->user()->email)->first();

    if (!$teknisi) {
        return redirect()->back()->with('error', 'Data teknisi tidak ditemukan');
    }

    $ordersKesimpulan = Order::where('teknisi_id', $teknisi->id)
    ->with('user')
    ->get();

    // ✅ ambil hanya order pending untuk daftar permintaan servis
    $orders = Order::where('teknisi_id', $teknisi->id)
                   ->where('status', 'pending')
                   ->with('user')
                   ->get();

    // ✅ ambil order diterima & selesai untuk jadwal servis
    $jadwalOrders = Order::where('teknisi_id', $teknisi->id)
                         ->whereIn('status', ['diterima', 'selesai'])
                         ->get();

    // mapping ke event kalender
    $events = $jadwalOrders->map(function ($order) {
        return [
            'title' => 'Servis '.$order->nama_barang .': '.$order->detail_kerusakan,
            'start' => $order->tanggal_servis,
            'color' => match($order->status) {
                'diterima' => '#facc15',
                'selesai' => '#00a527ff',
                default => '#155dfaff',
            },
            'url' => route('teknisi.order.showDetailTanggal', $order->id), // ✅ link ke detail
        ];
    });

    return view('teknisi.dashboard', compact('orders', 'events', 'ordersKesimpulan'));
}

    public function show($id)
    {
        $order = Order::with('user','payment')->findOrFail($id);
        return view('teknisi.detailTanggal', compact('order')); // kirim variabel $order ke Blade
    }
}
