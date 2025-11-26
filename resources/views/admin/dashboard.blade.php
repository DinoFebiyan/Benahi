<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-6 space-y-4">

        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-2">Selamat datang Admin {{ auth()->user()->name }}</h3>
            <p class="text-gray-600">
                Dashboard admin digunakan untuk melakukan manajemen pengguna dan teknisi.
            </p>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h4 class="font-semibold text-md mb-2">Aksi Admin</h4>

            <a href="#" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Tambah Teknisi
            </a>
        </div>

    </div>
</x-app-layout>
