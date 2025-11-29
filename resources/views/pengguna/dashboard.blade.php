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
        @include('user.components.cardPesanan',['order'=>$order])
    @empty
        <p class="text-muted">Belum ada pesanan.</p>
    @endforelse
</div>
@endsection
