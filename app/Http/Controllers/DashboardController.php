<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teknisi;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $recentOrders = Order::where('user_id', $user->id)->latest()->take(5)->get();
        $randomTeknisi = Teknisi::inRandomOrder()->take(6)->get();
        return view('dashboard.home', compact('recentOrders','randomTeknisi'));
    }
}
