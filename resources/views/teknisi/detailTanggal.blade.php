<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Detail Pesanan</h2>
    </x-slot>

    <div class="py-6">
       <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold mb-4">Detail Servis</h3>

            <p><strong>Nama Pemesan:</strong> {{ $order->nama_pemesan }}</p>
            <p><strong>Nama Barang Rusak:</strong> {{ $order->nama_barang }}</p>
            <p><strong>Detail Kerusakan:</strong> {{ $order->detail_kerusakan }}</p>
            <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $order->metode_pembayaran }}</p>
            <p><strong>Total Bayar:</strong> Rp{{ number_format($order->total_bayar ?? 0, 0, ',', '.') }}</p>

            <p><strong>Status Pembayaran:</strong>
                @if($order->payment && $order->payment->status === 'paid')
                    <span class="text-green-600 font-semibold">Sudah Dibayar</span>
                @elseif($order->payment && $order->payment->status === 'cod')
                    <span class="text-yellow-600 font-semibold">Bayar di Tempat (COD)</span>
                @else
                    <span class="text-red-600 font-semibold">Belum Dibayar</span>
                @endif
            </p>

            <form action="{{ route('teknisi.updateOrder', $order->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mt-4 flex gap-4">
                    <button name="action" value="selesai" 
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Tandai Selesai
                    </button>
                </div>

                {{-- Catatan khusus COD --}}
                @if($order->metode_pembayaran === 'COD')
                    <div class="mt-3 text-sm text-gray-600 border-t pt-3">
                        <strong>Catatan:</strong> Pastikan pembayaran telah dilakukan sebelum Anda melakukan konfirmasi penyelesaian.
                        Jika metode pembayaran adalah <span class="font-semibold">COD</span>, pastikan Anda sudah menerima pembayaran
                        dengan nominal yang telah disepakati.
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-app-layout>
