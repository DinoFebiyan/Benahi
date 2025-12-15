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

        <div class="mt-6 bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Data Teknisi & Statistik Servis</h2>

            <table class="min-w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Nama Teknisi</th>
                        <th class="border px-4 py-2">Kategori</th>
                        <th class="border px-4 py-2">Total Selesai</th>
                        <th class="border px-4 py-2">Sedang Dikerjakan</th>
                        <th class="border px-4 py-2">Pending</th>
                        <th class="border px-4 py-2">Ditolak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teknisis as $t)
                        <tr>
                            <td class="border px-4 py-2">{{ $t->nama }}</td>
                            <td class="border px-4 py-2">{{ $t->kategori }}</td>
                            <td class="border px-4 py-2 text-green-600 font-semibold">{{ $t->total_selesai }}</td>
                            <td class="border px-4 py-2 text-blue-600 font-semibold">{{ $t->total_dikerjakan }}</td>
                            <td class="border px-4 py-2 text-yellow-600 font-semibold">{{ $t->total_pending }}</td>
                            <td class="border px-4 py-2 text-red-600 font-semibold">{{ $t->total_ditolak }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
