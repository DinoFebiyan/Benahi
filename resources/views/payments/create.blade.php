<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Pembayaran Order #{{ $order->id }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-white shadow rounded-lg p-6 max-w-md mx-auto">
            <h3 class="text-lg font-semibold mb-4">Detail Order</h3>
            <p><strong>Nama Barang:</strong> {{ $order->nama_barang }}</p>
            <p><strong>Detail Kerusakan:</strong> {{ $order->detail_kerusakan }}</p>
            <p><strong>Total Bayar:</strong> Rp{{ number_format($order->total_bayar, 0, ',', '.') }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $order->metode_pembayaran }}</p>

            <hr class="my-4">

            <form action="{{ route('payments.store', $order->id) }}" method="POST">
                @csrf
                <input type="hidden" name="payment_method" value="{{ $order->metode_pembayaran }}">
                <input type="hidden" name="amount" value="{{ $order->total_bayar }}">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Bayar Sekarang
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
