<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Detail Pesanan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Informasi Pesanan</h3>

                <p><strong>Nama Barang:</strong> {{ $order->nama_barang }}</p>
                <p><strong>Detail Kerusakan:</strong> {{ $order->detail_kerusakan }}</p>
                <p><strong>Tanggal Servis:</strong> {{ \Carbon\Carbon::parse($order->tanggal_servis)->format('d M Y') }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ $order->metode_pembayaran }}</p>
                <p><strong>Total Bayar:</strong> Rp{{ number_format($order->total_bayar ?? 0, 0, ',', '.') }}</p>
                <p><strong>Status Pembayaran:</strong>
                    @if($order->payment && $order->payment->status === 'paid')
                        <span class="text-green-600 font-semibold">Bayar Langsung</span>
                    @elseif($order->payment && $order->payment->status === 'cod')
                        <span class="text-yellow-600 font-semibold">Bayar di Tempat (COD)</span>
                    @else
                        <span class="text-red-600 font-semibold">Belum Dibayar</span>
                    @endif
                </p>
                <p><strong>Dibuat Pada:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y H:i') }}</p>

                <div class="mt-6">
                    <a href="{{ route('user.orders') }}" 
                       class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        Kembali ke Pesanan Saya
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
