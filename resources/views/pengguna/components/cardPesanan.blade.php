<div class="card p-3 mb-2">
    <strong>{{ $order->nama_barang }}</strong>
    <br>Teknisi: {{ $order->teknisi->nama }}
    <br>Status:
    <span class="badge bg-secondary">{{ $order->status }}</span>
</div>
