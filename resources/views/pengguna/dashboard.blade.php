<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard Pengguna
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-2">Selamat datang, {{ auth()->user()->name }}</h3>
            <p class="text-gray-600">Ini adalah dashboard khusus pengguna.  
                Kamu bisa menampilkan fitur reservasi, riwayat servis, dan lain-lain disini nanti.
            </p>
        </div>
    </div>
</x-app-layout>
