<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>User | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .rating { color: #f5c518; font-size: 14px; }
        .avatar { width: 90px; height: 90px; border-radius: 50%; object-fit: cover; }
    </style>
</head>
<body>

@include('pengguna.components.navbar')

<div class="container py-4">
    @yield('content')
</div>

</body>
</html>
