@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-primary text-white text-center py-5">
    <div class="container">
        <!-- Logo -->
        <img src="{{ asset('images/logo-benahi.png') }}" alt="Logo Benahi" height="80">
        <h1 class="display-5 fw-bold mt-3">Reservasi Teknisi</h1>
        <p class="lead">Solusi cepat dan aman untuk memesan teknisi profesional</p>
        <!-- CTA Buttons -->
        <div class="mt-4">
            <!-- sementara pakai link dummy -->
            <a href="#" class="btn btn-danger btn-lg me-2">Login</a>
            <a href="#" class="btn btn-outline-light btn-lg">Register</a>
        </div>
    </div>
</section>

<!-- Fitur Utama -->
<section class="container my-5">
    <div class="row text-center">
        <div class="col-md-4">
            <img src="{{ asset('images/icon-booking.png') }}" alt="Booking" width="60">
            <h4 class="mt-3">Booking Online</h4>
            <p>Reservasi teknisi hanya dengan beberapa klik mudah dan gampang.</p>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/icon-tracking.png') }}" alt="Tracking" width="60">
            <h4 class="mt-3">Tracking Teknisi</h4>
            <p>Lihat status teknisi secara real-time.</p>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/icon-notif.png') }}" alt="Notifikasi" width="60">
            <h4 class="mt-3">Notifikasi Otomatis</h4>
            <p>Dapatkan update langsung ke email atau WhatsApp Anda.</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2025 Reservasi Teknisi. All rights reserved.</p>
</footer>
@endsection
