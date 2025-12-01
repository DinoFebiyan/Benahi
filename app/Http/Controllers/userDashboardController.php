<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
{
    $topRated = Teknisi::orderBy('rating', 'DESC')->take(4)->get();
    $random = Teknisi::inRandomOrder()->take(4)->get();

    $recent = Order::with('payment') // ⬅️ penting untuk cek status pembayaran
                   ->where('user_id', Auth::id())
                   ->latest()
                   ->take(5)
                   ->get();

    return view('pengguna.dashboard', compact('topRated', 'random', 'recent'));
}

}
