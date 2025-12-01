<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Tampilkan form pembayaran
    public function create($orderId)
    {
        $order = Order::findOrFail($orderId);

        // Pastikan order milik user yang login
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return view('payments.create', compact('order'));
    }

    // Simpan pembayaran
    public function store(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric|min:1',
        ]);

        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'paid', // langsung paid untuk testing, nanti bisa diubah otomatis via gateway
            'transaction_id' => uniqid('TRX-')
        ]);

        return redirect()->route('payments.show', $payment->id)
                         ->with('success', 'Pembayaran berhasil.');
    }

    // Tampilkan status pembayaran
    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        if ($payment->order->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return view('payments.show', compact('payment'));
    }
}
