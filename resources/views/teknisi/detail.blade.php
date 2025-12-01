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
    <p><strong>Status:</strong> {{ $order->status }}</p>

    <form action="{{ route('teknisi.updateOrder', $order->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <label for="total_bayar" class="block font-semibold mb-1">Total Harga Servis</label>
        <input type="number" name="total_bayar" id="total_bayar" class="border rounded px-3 py-2 w-full" >

        <div class="mt-4 flex gap-4">
            <button name="action" value="accepted" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Diterima</button>
            <button name="action" value="rejected" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Ditolak</button>
        </div>
    </form>
</div>

    </div>
</x-app-layout>
