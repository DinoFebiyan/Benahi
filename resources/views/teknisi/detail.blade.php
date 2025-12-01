<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Detail Pesanan</h2>
    </x-slot>

    <div class="py-6">
        @foreach($orders as $order) {{-- Loop order --}}
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold mb-4">Detail Servis</h3>

            <p><strong>Nama Pelapor:</strong> {{ $order->user->name }}</p>
            <p><strong>Kerusakan:</strong> {{ $order->kerusakan }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>

            <form action="{{ route('teknisi.updateOrder', $order->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')

                <label for="total_harga" class="block font-semibold mb-1">Total Harga Servis</label>
                <input type="number" name="total_harga" id="total_harga" class="border rounded px-3 py-2 w-full" required>

                <div class="mt-4 flex gap-4">
                    <button name="action" value="accepted" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Diterima</button>
                    <button name="action" value="rejected" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Ditolak</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</x-app-layout>
