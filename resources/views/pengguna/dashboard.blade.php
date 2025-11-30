@extends('layouts.user')
@section('title','Dashboard')

@section('content')
<h3 class="mb-4">Halo, {{ auth()->user()->name }} 👋</h3>

<h5>Rekomendasi Teknisi (Rating Tertinggi)</h5>
<div class="row mt-3">
    @foreach($topRated as $t)
        @include('user.components.cardTeknisi', ['t' => $t])
    @endforeach
</div>

<h5 class="mt-5">Teknisi Random</h5>
<div class="row mt-3">
    @foreach($random as $t)
        @include('user.components.cardTeknisi', ['t' => $t])
    @endforeach
</div>

<h5 class="mt-5">Pesanan Terbaru</h5>
<div class="mt-3">
    @forelse($recent as $order)
        <div class="bg-white shadow rounded-lg p-4 mb-3">
            <p><strong>ID Order:</strong> {{ $order->id }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total:</strong> Rp{{ number_format($order->total_price ?? 0, 0, ',', '.') }}</p>
            @if($order->status === 'pending')
                <a href="{{ route('payments.create', $order->id) }}" 
                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                   Bayar Sekarang
                </a>
            @else
                <span class="text-gray-500">Sudah Dibayar</span>
            @endif
        </div>
    @empty
        <p class="text-muted">Belum ada pesanan.</p>
    @endforelse
</div>
@endsection
