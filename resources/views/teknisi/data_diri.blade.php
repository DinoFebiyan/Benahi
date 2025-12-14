<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Data Diri Teknisi
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="p-4 mb-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('teknisi.updateDataDiri') }}" method="POST" class="space-y-4 w-1/2">
            @csrf
            @method('PUT')

            <div>
                <label class="font-medium">Nama</label>
                <input type="text" name="nama" 
                       value="{{ old('nama', $teknisi->nama) }}" 
                       class="w-full border-gray-300 rounded mt-1">
            </div>

            <div>
                <label class="font-medium">Email</label>
                <input type="email" name="email" 
                       value="{{ old('email', $teknisi->email) }}" 
                       class="w-full border-gray-300 rounded mt-1" readonly>
            </div>

            <div>
                <label class="font-medium">Telepon</label>
                <input type="text" name="telepon" 
                       value="{{ old('telepon', $teknisi->telepon) }}" 
                       class="w-full border-gray-300 rounded mt-1">
            </div>

            <div>
                <label class="font-medium">Kategori</label>
                <input type="text" name="kategori" 
                       value="{{ old('kategori', $teknisi->kategori) }}" 
                       class="w-full border-gray-300 rounded mt-1">
            </div>

            <div>
                <label class="font-medium">Keahlian</label>
                <textarea name="keahlian" class="w-full border-gray-300 rounded mt-1">{{ old('keahlian', $teknisi->keahlian) }}</textarea>
            </div>

            <div>
                <label class="font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border-gray-300 rounded mt-1">{{ old('deskripsi', $teknisi->deskripsi) }}</textarea>
            </div>

            <button type="submit" 
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </form>

    </div>
</x-app-layout>
