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
</x-app-layout>
