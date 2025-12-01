<x-mail::message>
# Pesanan Baru

Halo {{ $order->teknisi->nama }},

Ada pesanan baru dari **{{ $order->nama_pemesan }}** untuk barang **{{ $order->nama_barang }}**.

Detail kerusakan: {{ $order->detail_kerusakan }}  
Metode pembayaran: {{ $order->metode_pembayaran }}

<x-mail::button :url="route('user.orders')">
Lihat Pesanan
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
