<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('user.dashboard') }}">Benahi</a>

    <form class="d-flex mx-auto" action="{{ route('teknisi.search') }}" method="GET">
        <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari teknisi atau kategori...">
    </form>

    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('user.orders') }}">Pesanan Saya</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item text-danger"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
  </div>
</nav>
