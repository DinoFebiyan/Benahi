<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard Pengguna
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-2">Selamat datang, {{ auth()->user()->name }}</h3>
            <p class="text-gray-600">
                Ini adalah dashboard khusus pengguna.  
                Kamu bisa menampilkan fitur reservasi, riwayat servis, dan lain-lain disini nanti.
            </p>
        </div>

        <!-- Daftar Order Pengguna -->
        <div class="mt-6 bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Daftar Order</h3>

            @if($orders->isEmpty())
                <p class="text-gray-600">Belum ada order.</p>
            @else
                <table class="w-full table-auto border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">ID Order</th>
                            <th class="px-4 py-2 border">Total</th>
                            <th class="px-4 py-2 border">Status Order</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="text-center">
                                <td class="px-4 py-2 border">{{ $order->id }}</td>
                                <td class="px-4 py-2 border">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td class="px-4 py-2 border">{{ ucfirst($order->status) }}</td>
                                <td class="px-4 py-2 border">
                                    @if($order->status == 'pending')
                                        <a href="{{ route('payments.create', $order->id) }}" 
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                           Bayar Sekarang
                                        </a>
                                    @else
                                        <span class="text-gray-500">Sudah Dibayar</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
