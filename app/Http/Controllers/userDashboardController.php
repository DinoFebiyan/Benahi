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
        // teknisi rating tertinggi
        $topRated = Teknisi::orderBy('rating', 'DESC')
                        ->take(4)
                        ->get();

        // teknisi random
        $random = Teknisi::inRandomOrder()
                        ->take(4)
                        ->get();

        // pesanan terbaru user yang sedang login
        $recent = Order::where('user_id', Auth::id())
                        ->latest()
                        ->take(5)
                        ->get();

        return view('pengguna.dashboard', compact('topRated', 'random', 'recent'));
    }
}
