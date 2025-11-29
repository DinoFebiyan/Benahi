<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use Illuminate\Http\Request;

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

        return view('pengguna.dashboard', compact('topRated', 'random'));
    }
}
