<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Detail Teknisi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Profil Teknisi -->
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <img src="{{ $teknisi->foto ?: asset('images/profil.png') }}" 
                         class="mx-auto mb-3 rounded-full" style="width:120px;height:120px;">
                    <h4 class="font-semibold">{{ $teknisi->nama }}</h4>
                    <p class="text-gray-500">{{ $teknisi->kategori }}</p>
                    <p class="text-yellow-500">⭐ {{ $teknisi->rating }} ({{ $teknisi->jumlah_rating }} ulasan)</p>
                    <p class="text-gray-600">Pengalaman: {{ $teknisi->pengalaman_tahun }} tahun</p>
                </div>

                <!-- CV / Tentang Teknisi -->
                <div class="md:col-span-2 bg-white shadow rounded-lg p-6">
                    <h5 class="font-semibold mb-2">CV / Tentang Teknisi</h5>
                    <p>{{ $teknisi->cv }}</p>
                </div>
            </div>

            <!-- Form Pemesanan -->
            <div class="mt-6 bg-white shadow rounded-lg p-6">
                <h5 class="font-semibold mb-4">Form Pemesanan</h5>
                <form action="{{ route('user.orderTeknisi', $teknisi->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-semibold">Nama Pemesan</label>
                        <input type="text" class="form-input w-full" name="nama_pemesan" required>
                    </div>

                    <div>
                        <label class="block font-semibold">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-input w-full" rows="2" required></textarea>
                    </div>

                    <div>
                        <label class="block font-semibold">Nama Barang yang rusak</label>
                        <input type="text" name="nama_barang" class="form-input w-full" required>
                    </div>

                    <div>
                        <label class="block font-semibold">Detail Kerusakan</label>
                        <textarea name="detail_kerusakan" class="form-input w-full" rows="3" required></textarea>
                    </div>

                    <div>
                        <label class="block font-semibold">Tanggal Servis</label>
                        <input type="date" name="tanggal_servis" class="form-input w-full" required>
                    </div>

                    <div>
                        <label class="block font-semibold">Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="form-select w-full">
                            <option>COD</option>
                            <option>Transfer</option>
                        </select>
                    </div>

                    <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
