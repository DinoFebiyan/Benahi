<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengguna - Benahi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="col-md-5">

        <div class="card shadow p-4">
            <h3 class="text-center mb-3">Daftar Pengguna Baru</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali input kamu</strong>
                </div>
            @endif

            <form action="{{ route('pengguna.register.submit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" class="form-control"
                           placeholder="Nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="Alamat email" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Ulangi password" required>
                </div>

                {{-- role otomatis pengguna --}}
                <input type="hidden" name="role" value="pengguna">

                <button class="btn btn-success w-100 mt-2">Daftar</button>

                <p class="text-center mt-3">
                    Sudah punya akun?
                    <a href="{{ route('pengguna.login') }}">Masuk</a>
                </p>

            </form>
        </div>

    </div>
</div>

</body>
</html>
