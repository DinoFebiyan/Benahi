<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Teknisi Baru
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('admin.storeTeknisi') }}" method="POST" class="space-y-4 w-1/2">
            @csrf

            <div>
                <label class="font-medium">Nama Teknisi</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded mt-1" required>
            </div>

            <div>
                <label class="font-medium">Email Teknisi</label>
                <input type="email" name="email" class="w-full border-gray-300 rounded mt-1" required>
            </div>

            <div>
                <label class="font-medium">Password</label>
                <input type="password" name="password" class="w-full border-gray-300 rounded mt-1" required>
            </div>

            <button type="submit" 
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Simpan Teknisi
            </button>
        </form>

    </div>
</x-app-layout>
