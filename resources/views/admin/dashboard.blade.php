<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="p-4 mb-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-4">Selamat datang, Admin!</h1>

        <a href="{{ route('admin.createTeknisi') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            + Tambah Teknisi
        </a>
    </div>
</x-app-layout>
