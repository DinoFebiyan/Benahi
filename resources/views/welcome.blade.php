<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ config('app.name', 'Benahi') }}</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Instrument Sans', 'system-ui'],
          },
        },
      },
    }
  </script>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-white font-sans min-h-screen flex flex-col">

  <!-- Header -->
  <header class="container mx-auto max-w-screen-lg px-6 py-6">
    <div class="flex items-center justify-between">
      <!-- Logo-->
      <div class="flex items-center gap-3">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Benahi" class="w-10 h-10 object-contain rounded bg-gray-100" />
        <div class="font-semibold text-lg">Benahi</div>
      </div>

      <!-- login register -->
      @if (Route::has('login'))
        <nav class="flex items-center gap-4">
          @auth
            <a href="{{ url('/dashboard') }}" 
              class="px-5 py-2 border rounded text-sm hover:border-gray-400 dark:border-gray-600 dark:hover:border-gray-400">
              Dashboard
            </a>
          @else
            <a href="{{ route('pengguna.login') }}" class="px-5 py-2 border rounded text-sm">
                Masuk
            </a>
            @if (Route::has('register'))
              <a href="{{ route('pengguna.register') }}" 
                class="px-5 py-2 bg-[#1b1b18] text-white rounded text-sm">
                Buat Akun
              </a>
            @endif
          @endauth
        </nav>
      @endif
    </div>
  </header>


  <!-- Hero -->
  <section class="container mx-auto max-w-screen-lg px-6 py-10 flex flex-col lg:flex-row items-center gap-10">
    <div class="flex-1">
      <h1 class="text-4xl font-bold mb-4">Servis Laptop, Motor, dan Elektronik Lebih Mudah</h1>
      <p class="text-base text-[#706f6c] dark:text-gray-300 mb-6">Pesan teknisi terpercaya kapan saja, langsung dari rumah Anda.</p>
      <div class="flex gap-4">
        <a href="{{ route('pengguna.login') }}" class="bg-[#1b1b18] text-white px-6 py-3 rounded-md">Pesan Sekarang</a>
        <a href="#tentang" class="border px-6 py-3 rounded-md">Pelajari Lebih Lanjut</a>
      </div>
    </div>
    <div class="flex-1 flex justify-center">
      <img src="{{ asset('images/hero.jpg') }}" alt="Foto hero" class="w-[320px] h-[220px] rounded-lg object-cover" />
    </div>
  </section>

  <!-- Highlight layanan -->
  <section id="layanan" class="bg-gradient-to-r from-[#fff2f2] to-white py-10">
    <div class="container mx-auto max-w-screen-lg px-6">
      <div class="bg-white dark:bg-[#1b1b18] rounded-lg p-6 shadow flex flex-col lg:flex-row items-center justify-between gap-6">
        <div>
          <h2 class="text-2xl font-semibold">Semua Servis dalam Satu Platform</h2>
          <p class="text-sm text-[#706f6c] dark:text-gray-300 mt-2">Laptop, Motor, AC, Mesin Cuci – Kami Benahi Semua</p>
        </div>
        <div class="flex gap-4">
          <a href="#teknisi" class="px-5 py-3 bg-[#F53003] text-white rounded-md">Kenali Teknisi</a>
          <a href="#Langkah-langkah" class="px-5 py-3 border rounded-md">Langkah-langkah</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Langkah-langkah -->
  <section id="Langkah-langkah" class="container mx-auto max-w-screen-lg px-6 py-12">
    <h2 class="text-3xl font-bold mb-8 text-[#1b1b18] dark:text-white text-center">
      Cara Menggunakan Aplikasi Benahi
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      <!-- Card 1 -->
      <div class="bg-white dark:bg-[#1b1b18] rounded-lg shadow p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full mb-4">
          1
        </div>
        <h3 class="font-semibold mb-2">Daftar Akun</h3>
        <p class="text-sm text-[#706f6c] dark:text-gray-300">
          Buat akun Benahi dengan mudah menggunakan email Anda.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white dark:bg-[#1b1b18] rounded-lg shadow p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 flex items-center justify-center bg-green-100 text-green-600 rounded-full mb-4">
          2
        </div>
        <h3 class="font-semibold mb-2">Pilih Layanan</h3>
        <p class="text-sm text-[#706f6c] dark:text-gray-300">
          Tentukan jenis teknisi yang Anda butuhkan, mulai dari Elektronik hingga Mesin.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white dark:bg-[#1b1b18] rounded-lg shadow p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 flex items-center justify-center bg-yellow-100 text-yellow-600 rounded-full mb-4">
          3
        </div>
        <h3 class="font-semibold mb-2">Pesan Teknisi</h3>
        <p class="text-sm text-[#706f6c] dark:text-gray-300">
          Pesan teknisi terpercaya sesuai jadwal yang Anda inginkan.
        </p>
      </div>

      <!-- Card 4 -->
      <div class="bg-white dark:bg-[#1b1b18] rounded-lg shadow p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 flex items-center justify-center bg-red-100 text-red-600 rounded-full mb-4">
          4
        </div>
        <h3 class="font-semibold mb-2">Pantau Servis</h3>
        <p class="text-sm text-[#706f6c] dark:text-gray-300">
          Lihat status layanan dan pastikan servis berjalan dengan aman dan efisien.
        </p>
      </div>
    </div>
  </section>


  <!-- Teknisi -->
  <section id="teknisi" class="container mx-auto max-w-screen-lg px-6 py-12">
    <h3 class="text-3xl font-semibold mb-8">Teknisi Kami</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach ([
        ['nama' => 'Andi Pratama', 'foto' => 'andiPratama.jpg', 'spesialis' => 'Teknisi Elektronik'],
        ['nama' => 'Sandi Putra', 'foto' => 'siti.jpg', 'spesialis' => 'Teknisi Mesin'],
        ['nama' => 'Budi Santoso', 'foto' => 'budi.jpg', 'spesialis' => 'Teknisi Motor'],
      ] as $teknisi)
      <article class="bg-white dark:bg-[#1b1b18] rounded-lg shadow p-6 text-center">
        <img src="{{ asset('images/teknisi/' . $teknisi['foto']) }}" alt="Foto {{ $teknisi['nama'] }}" class="w-28 h-28 rounded-full object-cover mx-auto mb-4" />
        <h4 class="font-semibold">{{ $teknisi['nama'] }}</h4>
        <p class="text-sm text-[#706f6c] dark:text-gray-300 mb-4">{{ $teknisi['spesialis'] }}</p>
        <a href="#" class="text-sm px-4 py-2 border rounded">Lihat Profil</a>
      </article>
      @endforeach
    </div>
  </section>

  <!-- CTA -->
  <section class="container mx-auto max-w-screen-lg px-6 py-10">
    <div class="bg-[#1b1b18] text-white rounded-lg p-6 flex flex-col sm:flex-row items-center justify-between gap-6">
      <div>
        <h4 class="text-xl font-semibold">Butuh teknisi dino ganteng sekarang?</h4>
        <p class="text-sm text-gray-300">Pesan teknisi terpercaya, cepat dan aman.</p>
      </div>
      <a href="{{ route('pengguna.login') }}" class="px-6 py-3 bg-white text-[#1b1b18] rounded-md font-medium">Pesan Sekarang</a>
    </div>
  </section>

  <!-- Tentang Aplikasi -->
  <section id="tentang" class="container mx-auto max-w-screen-lg px-6 py-12">
    <div class="bg-white dark:bg-[#1b1b18] rounded-lg shadow p-6 space-y-4">
      <h2 class="text-2xl font-bold text-[#1b1b18] dark:text-white">Tentang Aplikasi Benahi</h2>
      <p class="text-base text-[#706f6c] dark:text-gray-300">
        <strong>Benahi</strong> adalah sebuah aplikasi layanan digital yang dirancang untuk mempermudah masyarakat dalam mengakses jasa perbaikan dan pemeliharaan berbagai kebutuhan teknis secara praktis. Dengan antarmuka yang sederhana dan ramah pengguna, Benahi menghadirkan pengalaman pemesanan layanan yang cepat, aman, dan efisien langsung dari perangkat Anda.
      </p>
      <p class="text-base text-[#706f6c] dark:text-gray-300">
        Aplikasi ini dikembangkan dengan semangat untuk menjembatani kebutuhan servis harian dengan teknologi yang mudah diakses. Benahi berfokus pada kenyamanan pengguna, transparansi layanan, dan kemudahan dalam mengatur jadwal serta lokasi servis tanpa harus keluar rumah.
      </p>
      <p class="text-base text-[#706f6c] dark:text-gray-300">
        Dengan Benahi, proses pemesanan teknisi menjadi lebih terstruktur dan terpercaya. Semua interaksi dilakukan melalui satu platform yang terintegrasi, sehingga pengguna dapat merasa tenang dan yakin terhadap layanan yang diberikan.
      </p>
      <div class="pt-4">
        <a href="{{ route('pengguna.register') }}" class="inline-block px-6 py-3 bg-[#1b1b18] text-white rounded-md">Mulai Gunakan Benahi</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white dark:bg-[#0a0a0a] border-t border-[#e3e3e0] dark:border-gray-700 mt-auto">
    <div class="container mx-auto max-w-screen-lg px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-6">
      <div class="flex items-center gap-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Benahi" class="w-12 h-12 object-contain rounded bg-gray-100" />
        <div>
          <div class="font-semibold">Benahi</div>
          <div class="text-sm text-[#706f6c] dark:text-gray-300">Solusi servis terpercaya</div>
        </div>
      </div>
      <a href="{{ route('pengguna.login') }}" class="px-5 py-3 bg-[#1b1b18] text-white rounded-md">Pesan Sekarang</a>
    </div>
    <div class="text-center text-sm text-[#706f6c] dark:text-gray-400 py-4">
      © copyright by Dino Febiyan
    </div>
  </footer>

</body>
</html>
