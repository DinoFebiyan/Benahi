<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Teknisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedMail;

class OrderController extends Controller
{
    public function store(Request $request, $teknisiId)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nama_barang' => 'required|string',
            'detail_kerusakan' => 'required|string',
            'metode_pembayaran' => 'required|in:COD,Transfer,E-Wallet',
        ]);

        $teknisi = Teknisi::findOrFail($teknisiId);

        $order = Order::create([
            'user_id' => Auth::id(),
            'teknisi_id' => $teknisi->id,
            'nama_pemesan' => $request->nama_pemesan,
            'alamat' => $request->alamat,
            'nama_barang' => $request->nama_barang,
            'detail_kerusakan' => $request->detail_kerusakan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => 'pending',
        ]);

        // Kirim email ke teknisi
        Mail::to($teknisi->email)->send(new OrderPlacedMail($order));

        return redirect()->route('user.orders')
            ->with('success','Pesanan berhasil dikirim. Teknisi akan menghubungi Anda.');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('teknisi')
            ->latest()
            ->paginate(10);

        return view('pengguna.pesanan', compact('orders'));
    }
}
