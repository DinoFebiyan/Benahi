<div class="col-md-3">
    <div class="card p-3 mb-3 text-center">
        <img src="{{ $t->foto ?: 'https://via.placeholder.com/90' }}" class="avatar mx-auto">
        <h6 class="mt-2 mb-0">{{ $t->nama }}</h6>
        <small class="text-muted">{{ $t->kategori }}</small>
        <div class="rating mt-1">⭐ {{ $t->rating }}</div>
        <a href="{{ route('teknisi.detail', $t->id) }}" class="btn btn-sm btn-primary mt-3">Detail</a>
    </div>
</div>
