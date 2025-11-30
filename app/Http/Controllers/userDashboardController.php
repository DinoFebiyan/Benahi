<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Teknisi;
use App\Models\Order;

class UserDashboardController extends Controller
{
    public function index()
    {

        $user = Auth:: user();

        if ($user -> role != 'pengguna') {
            abort(403, 'Anda tidak  memiliki akses');
        }

        //Ambil top rate teknisi 
        $topRated = Teknisi::orderByDesc('rating')->take(5)->get();

        // ambil teknisi random
        $random = Teknisi::inRandomOrder()->take(4)->get();

        $recent = Order::where('user_id', $user->id)
        ->orderByDesc('created_at')
        ->take(5)
        ->get();

        return view('pengguna.dashboard', compact('topRated', 'random','recent'));
    }
}
