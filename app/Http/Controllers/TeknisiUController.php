<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use Illuminate\Http\Request;

class TeknisiUController extends Controller
{
    // Detail teknisi
    public function detail($id)
    {
        $teknisi = Teknisi::findOrFail($id);
        return view('user.detailTeknisi', compact('teknisi'));
    }

    // pencarian teknisi berdasarkan nama atau kategori
    public function search(Request $request)
    {
        $q = $request->q;

        $teknisis = Teknisi::where('nama', 'like', "%$q%")
                        ->orWhere('kategori', 'like', "%$q%")
                        ->orderBy('rating','desc')
                        ->paginate(12);

        return view('user.search', compact('teknisis','q'));
    }
}
