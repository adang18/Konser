<!DOCTYPE html>
<html>
<head>
    <title>KonserKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="/">KonserKU</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                @if (request()->is('admin/*'))

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/orders') ? 'active' : '' }}"
                           href="/admin/orders">Orders</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/">Kembali ke User</a>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/orders">Admin</a>
                    </li>
                @endif

            </ul>
        </div>

    </div>
</nav>

<main id="app-main">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
