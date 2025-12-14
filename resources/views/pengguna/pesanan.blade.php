<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Riwayat Pesanan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-4">
                @foreach($orders as $order)
                    <div class="border rounded-lg bg-white shadow p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-lg">{{ $order->nama_barang }}</p>
                                <p class="text-gray-600">Kerusakan: {{ $order->detail_kerusakan }}</p>
                                <p class="text-gray-600">Teknisi: {{ $order->teknisi->nama ?? '-' }}</p>
                                <p class="text-gray-600">Status: 
                                    <span class="@if($order->status=='pending') text-yellow-600 
                                                 @elseif($order->status=='diterima') text-green-600 
                                                 @elseif($order->status=='selesai') text-blue-600 
                                                 @else text-red-600 @endif font-semibold">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </p>
                                <p class="text-gray-600">Total: Rp{{ number_format($order->total_bayar ?? 0,0,',','.') }}</p>
                            </div>
                            <a href="{{ route('user.orderDetail', $order->id) }}" 
                               class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
