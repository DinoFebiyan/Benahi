<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Pembayaran Order #{{ $order->id }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-white shadow rounded-lg p-6 max-w-md mx-auto">
            <h3 class="text-lg font-semibold mb-4">Detail Order</h3>
            <p><strong>Nama Pemesan:</strong> {{ $order->nama_pemesan }}</p>
            <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
            <p><strong>Total Bayar:</strong> Rp{{ number_format($order->total_bayar, 0, ',', '.') }}</p>

            <hr class="my-4">

            <form action="{{ route('payments.store', $order->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="payment_method" class="block text-gray-700">Metode Pembayaran</label>
                    <select name="payment_method" id="payment_method" class="w-full border rounded px-3 py-2">
                        <option value="transfer">Transfer Bank</option>
                        <option value="cash">Cash / Tunai</option>
                        <option value="qris">QRIS</option>
                    </select>
                    @error('payment_method')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

<div class="mb-4">
    <label for="amount" class="block text-gray-700">Jumlah Pembayaran</label>
    <input type="number" name="amount" id="amount" value="{{ $order->total_bayar }}" 
           class="w-full border rounded px-3 py-2">
</div>


                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Bayar Sekarang
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
