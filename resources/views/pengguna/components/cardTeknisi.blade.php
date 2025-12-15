<div class="border rounded-lg p-4 text-center hover:shadow-lg transition">
<img src="{{ $t->foto ?: asset('images/profil.png') }}" 
     class="w-20 h-20 rounded-full mx-auto object-cover mb-3">
    <h6 class="font-semibold text-gray-800 mb-1">{{ $t->nama }}</h6>
    <p class="text-sm text-gray-500 mb-2">{{ $t->kategori }}</p>
    <div class="text-yellow-500 text-sm mb-3">⭐ {{ $t->rating }}</div>
    <a href="{{ route('user.teknisiDetail', $t->id) }}"
       class="inline-block px-4 py-2 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
       Detail
    </a>
</div>
