@extends('layouts.user')
@section('title','Pencarian')

@section('content')
<h4>Hasil Pencarian: "{{ $q }}"</h4>

<div class="row mt-3">
    @forelse($teknisis as $t)
        @include('user.components.cardTeknisi',['t'=>$t])
    @empty
        <p class="text-muted">Tidak ditemukan.</p>
    @endforelse
</div>

{{ $teknisis->links() }}
@endsection
