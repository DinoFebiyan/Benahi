<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teknisi;

class TeknisiController extends Controller
{
    public function index()
    {
        // beranda teknisi (top rated + random)
        $topRated = Teknisi::orderBy('rating','desc')->take(6)->get();
        $random = Teknisi::inRandomOrder()->take(6)->get();
        return view('teknisi.index', compact('topRated','random'));
    }

    public function show($id)
    {
        $teknisi = Teknisi::findOrFail($id);
        return view('teknisi.show', compact('teknisi'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q','');
        $teknisis = Teknisi::where('nama','like', "%{$q}%")
            ->orWhere('kategori','like', "%{$q}%")
            ->orderBy('rating','desc')
            ->paginate(12)
            ->appends(['q' => $q]);

        return view('teknisi.search', compact('teknisis','q'));
    }
}
