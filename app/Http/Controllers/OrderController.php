<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class OrderController extends Controller
{
    public function store(Request $request, $teknisiId)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'alamat' => 'required',
            'nama_barang' => 'required',
            'detail_kerusakan' => 'required',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'teknisi_id' => $teknisiId,
            'nama_pemesan' => $request->nama_pemesan,
            'alamat' => $request->alamat,
            'nama_barang' => $request->nama_barang,
            'detail_kerusakan' => $request->detail_kerusakan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => 'pending',
        ]);

        // kirim email
        Mail::to($order->teknisi->email)->send(new OrderMail($order));

        return redirect()->route('user.orders')->with('success','Pesanan berhasil dikirim!');
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->paginate(10);
        return view('user.pesanan', compact('orders'));
    }
}
