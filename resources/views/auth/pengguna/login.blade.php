<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Pengguna - Benahi</title>
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
    <div class="col-md-4">

        <div class="card shadow p-4">
            <h3 class="text-center mb-3">Login Pengguna</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali input kamu</strong>
                </div>
            @endif

            <form action="{{ route('pengguna.login.submit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Masukkan password" required>
                </div>

                <button class="btn btn-primary w-100 mt-2">Masuk</button>

                <p class="text-center mt-3">
                    Belum punya akun?
                    <a href="{{ route('pengguna.register') }}">Daftar Sekarang</a>
                </p>

            </form>
        </div>

    </div>
</div>

</body>
</html>
