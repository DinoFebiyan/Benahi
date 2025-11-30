<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>




    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                        <!-- Greeting -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">Halo, {{ auth()->user()->name }} 👋</h3>
                    <p class="mt-2 text-gray-600">Selamat datang di dashboard pengguna Benahi. Temukan teknisi terbaik untuk kebutuhan Anda!</p>
                </div>
            </div>

            <!-- Form Pencarian Teknisi -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h5 class="font-semibold text-lg mb-4">Cari Teknisi Disini!</h5>
                    <form action="{{ route('user.searchTeknisi') }}" method="GET" class="flex gap-2">
                        <input type="text" name="q" value="{{ request('q') }}" 
                               class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                               placeholder="Cari teknisi atau kategori...">
                        <button type="submit" 
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Cari
                        </button>
                    </form>
                </div>
            </div>



            <!-- Rekomendasi Teknisi -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h5 class="font-semibold text-lg mb-4">Teknisi dengan rating tertinggi</h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach($topRated as $t)
                            @include('pengguna.components.cardTeknisi', ['t' => $t])
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Teknisi Random -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h5 class="font-semibold text-lg mb-4">Rekomendasi Teknisi</h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach($random as $t)
                            @include('pengguna.components.cardTeknisi', ['t' => $t])
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Pesanan Terbaru -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h5 class="font-semibold text-lg mb-4">Pesanan Terbaru</h5>
                    <div class="space-y-3">
                        @forelse($recent as $order)
                            <div class="border rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-medium"><strong>ID Order:</strong> {{ $order->id }}</p>
                                        <p class="text-gray-600"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                                        <p class="text-gray-600"><strong>Total:</strong> Rp{{ number_format($order->total_bayar ?? 0, 0, ',', '.') }}</p>
                                    </div>
                                    @if($order->status === 'pending')
                                        <a href="{{ route('payments.create', $order->id) }}" 
                                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                           Bayar Sekarang
                                        </a>
                                    @else
                                        <span class="text-gray-500">Sudah Dibayar</span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">Belum ada pesanan.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
