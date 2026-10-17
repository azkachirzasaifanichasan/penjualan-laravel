<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Masuk') — Kasir Simple · Toko RPL Jaya</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body class="bg-paper">
    <a class="skip-link" href="#konten">Lewati ke konten</a>

    <main id="konten" class="auth-shell">
        <div class="auth-card">
            <div class="sidebar-brand auth-brand">
                <span class="brand-tile"><i class="bi bi-shop" aria-hidden="true"></i></span>
                <span>
                    <span class="brand-name">Kasir Simple</span><br>
                    <span class="brand-sub">Toko RPL Jaya</span>
                </span>
            </div>

            @if (session('success'))
                <div class="alert alert-success" role="status" data-alert>
                    <i class="bi bi-check-circle" aria-hidden="true"></i>
                    <div class="alert-body">{{ session('success') }}</div>
                    <button type="button" class="alert-close" data-dismiss aria-label="Tutup pesan">
                        <i class="bi bi-x-lg" aria-hidden="true"></i>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert" data-alert>
                    <i class="bi bi-exclamation-octagon" aria-hidden="true"></i>
                    <div class="alert-body">{{ session('error') }}</div>
                    <button type="button" class="alert-close" data-dismiss aria-label="Tutup pesan">
                        <i class="bi bi-x-lg" aria-hidden="true"></i>
                    </button>
                </div>
            @endif

            @yield('content')
        </div>

        <p class="auth-footnote">Sistem Penjualan Internal — Toko RPL Jaya</p>
    </main>

    @yield('scripts')
</body>
</html>
