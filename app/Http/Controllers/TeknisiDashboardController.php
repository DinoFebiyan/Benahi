<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TeknisiDashboardController extends Controller
{
    public function dashboard()
{
    $orders = Order::where('teknisi_id', auth()->id())->with('user')->get();

    $events = $orders->map(function ($order) {
        return [
            'title' => 'Servis: '.$order->kerusakan,
            'start' => $order->tanggal_servis,
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