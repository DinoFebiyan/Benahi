@extends('layouts.user')
@section('title','Pesanan Saya')

@section('content')
<h4>Pesanan Saya</h4>

<div class="mt-3">
    @foreach($orders as $order)
        @include('pengguna.components.cardPesanan', ['order'=>$order])
    @endforeach
</div>

{{ $orders->links() }}
@endsection
