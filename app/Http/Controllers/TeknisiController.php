<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use App\Models\Order;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    // Detail teknisi + daftar pesanan
    public function detail($id)
    {
        $teknisi = Teknisi::findOrFail($id);
        $orders = Order::where('teknisi_id', $id)->with('user')->get(); // pastikan relasi user dimuat

        return view('pengguna.detailTeknisi', compact('teknisi', 'orders'));
    }

    // Pencarian teknisi berdasarkan nama atau kategori
    public function search(Request $request)
    {
        $q = $request->q;

        $teknisis = Teknisi::where('nama', 'like', "%$q%")
                        ->orWhere('kategori', 'like', "%$q%")
                        ->orderBy('rating','desc')
                        ->paginate(12);

        return view('pengguna.search', compact('teknisis','q'));
    }

    public function editDataDiri()
    {
        $teknisi = Teknisi::where('email', auth()->user()->email)->first();
        return view('teknisi.data_diri', compact('teknisi'));
    }

    public function updateDataDiri(Request $request)
    {
        $teknisi = Teknisi::where('email', auth()->user()->email)->first();

        $request->validate([
            'nama' => 'required|min:3',
            'telepon' => 'nullable|string',
            'kategori' => 'nullable|string',
            'keahlian' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $teknisi->update($request->only(['nama','telepon','kategori','keahlian','deskripsi']));

        return redirect()->route('teknisi.dataDiri')->with('success', 'Data diri berhasil diperbarui.');
    }


    // Menampilkan detail order untuk teknisi
    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id); // pastikan relasi user dimuat
        return view('teknisi.detail', compact('order')); // kirim variabel $order ke Blade
    }

    // Update status pesanan oleh teknisi
    public function updateOrder(Request $request, $id)
{
    $order = Order::findOrFail($id);

    // Hanya update total_bayar kalau ada input
    if ($request->filled('total_bayar')) {
        $order->total_bayar = $request->total_bayar;
    }

    // Update status berdasarkan tombol yang diklik
    if ($request->action === 'accepted') {
        $order->status = 'diterima';
    } elseif ($request->action === 'rejected') {
        $order->status = 'ditolak';
    } elseif ($request->action === 'selesai') {
        $order->status = 'selesai';
    }

    // Validasi
    $request->validate([
        'total_bayar' => $request->action === 'accepted' ? 'required|numeric|min:1000' : 'nullable|numeric',
        'action' => 'required|in:accepted,rejected,selesai',
    ]);

    $order->save();

    return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
}


}
