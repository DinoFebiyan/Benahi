<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Status Pembayaran</h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-white shadow rounded-lg p-6 max-w-md mx-auto">
            <h3 class="text-lg font-semibold mb-4">Pembayaran Order #{{ $payment->order->id }}</h3>

            <p><strong>Nama Pemesan:</strong> {{ $payment->order->nama_pemesan }}</p>
            <p><strong>Total Bayar:</strong> Rp{{ number_format($payment->amount, 0, ',', '.') }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ ucfirst($payment->payment_method) }}</p>
            <p><strong>Status:</strong> 
                <span class="{{ $payment->status === 'paid' ? 'text-green-600' : 'text-red-600' }}">
                    {{ ucfirst($payment->status) }}
                </span>
            </p>
            <p><strong>Transaction ID:</strong> {{ $payment->transaction_id }}</p>

            <a href="{{ route('pengguna.dashboard') }}" 
               class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
               Kembali ke Dashboard
            </a>
        </div>
    </div>
</x-app-layout>
