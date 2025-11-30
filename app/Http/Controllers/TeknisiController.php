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

        // Update total harga
        $order->total_harga = $request->total_harga;

        // Update status berdasarkan tombol yang diklik
        if ($request->action === 'accepted') {
            $order->status = 'Diterima oleh teknisi';
        } elseif ($request->action === 'rejected') {
            $order->status = 'Ditolak oleh teknisi';
        }

        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
