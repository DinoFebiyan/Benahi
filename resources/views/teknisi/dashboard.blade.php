<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard Teknisi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-2">Halo Teknisi {{ auth()->user()->name }}</h3>
            <p class="text-gray-600">
                Ini adalah dashboard teknisi.  
                Nantinya kamu bisa menampilkan jadwal servis, permintaan booking, status pekerjaan, dan pengajuan cuti.
            </p>
        </div>
    </div>

    {{-- Section Statistik Teknisi --}}
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white border rounded-xl shadow p-6 text-center">
            <h4 class="text-gray-700 font-semibold text-lg">Laporan Masuk</h4>
            <p class="text-4xl font-bold text-blue-600 mt-2">12</p>
            <p class="text-gray-500 text-sm mt-1">Menunggu ditindaklanjuti</p>
        </div>

        <div class="bg-white border rounded-xl shadow p-6 text-center">
            <h4 class="text-gray-700 font-semibold text-lg">Sedang Dikerjakan</h4>
            <p class="text-4xl font-bold text-yellow-500 mt-2">5</p>
            <p class="text-gray-500 text-sm mt-1">Dalam proses servis</p>
        </div>

        <div class="bg-white border rounded-xl shadow p-6 text-center">
            <h4 class="text-gray-700 font-semibold text-lg">Selesai</h4>
            <p class="text-4xl font-bold text-green-600 mt-2">3</p>
            <p class="text-gray-500 text-sm mt-1">Telah selesai servis</p>
        </div>
    </div>

    {{-- Section Tabel --}}
    <div class="mt-10 bg-white border shadow rounded-xl p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Daftar Permintaan Servis</h3>

        <table class="min-w-full border-collapse w-full">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-left">Nama Pelapor</th>
                    <th class="py-3 px-4 text-left">Kerusakan</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">Budi Santoso</td>
                    <td class="py-3 px-4">Jaringan internet tidak stabil</td>
                    <td class="py-3 px-4">
                        <span class="text-yellow-600 font-semibold">Proses</span>
                    </td>
                    <td class="py-3 px-4">
                        <button class="bg-black text-white px-3 py-1 rounded-lg hover:opacity-80 transition">
                            Detail
                        </button>
                    </td>
                </tr>

                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">Ayu Pertiwi</td>
                    <td class="py-3 px-4">Printer error</td>
                    <td class="py-3 px-4">
                        <span class="text-green-600 font-semibold">Selesai</span>
                    </td>
                    <td class="py-3 px-4">
                        <button class="bg-black text-white px-3 py-1 rounded-lg hover:opacity-80 transition">
                            Detail
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
