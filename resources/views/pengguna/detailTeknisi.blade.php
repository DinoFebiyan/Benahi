@extends('layouts.user')
@section('title','Detail Teknisi')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card p-4 text-center">
            <img src="{{ $teknisi->foto ?: 'https://via.placeholder.com/120' }}" class="avatar mx-auto mb-3" style="width:120px;height:120px;">
            <h4>{{ $teknisi->nama }}</h4>
            <p class="text-muted">{{ $teknisi->kategori }}</p>
            <p class="rating">⭐ {{ $teknisi->rating }} ({{ $teknisi->jumlah_rating }} ulasan)</p>
            <p>Pengalaman: {{ $teknisi->pengalaman_tahun }} tahun</p>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card p-4 mb-4">
            <h5>CV / Tentang Teknisi</h5>
            <p>{{ $teknisi->cv }}</p>
        </div>

        <div class="card p-4">
            <h5>Form Pemesanan</h5>
            <form action="{{ route('order.store', $teknisi->id) }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label>Nama Pemesan</label>
                    <input type="text" class="form-control" name="nama_pemesan" required>
                </div>

                <div class="mb-2">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="2" required></textarea>
                </div>

                <div class="mb-2">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>Detail Kerusakan</label>
                    <textarea name="detail_kerusakan" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-2">
                    <label>Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-select">
                        <option>COD</option>
                        <option>Transfer</option>
                        <option>E-Wallet</option>
                    </select>
                </div>

                <button class="btn btn-primary">Pesan Sekarang</button>
            </form>
        </div>
    </div>
</div>
@endsection
