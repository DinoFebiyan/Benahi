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
                    <h5 class="font-semibold text-lg mb-4">Berikut hasil pencarian anda dari kata kunci</h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach($teknisis as $t)
                            @include('pengguna.components.cardTeknisi', ['t' => $t])
                        @endforeach
                    </div>
                </div>
            </div>
        
    </div>
</x-app-layout>
