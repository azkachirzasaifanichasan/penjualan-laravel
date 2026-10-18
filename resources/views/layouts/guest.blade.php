<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Masuk') — Simple Cashier</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body class="bg-paper">
    <a class="absolute top-0 -left-[9999px] z-[60] bg-ink px-4 py-2 text-sm text-paper focus-visible:left-0" href="#konten">Lewati ke konten</a>

    <main id="konten" class="flex min-h-screen flex-col items-center justify-center gap-8 bg-paper-2 p-6">
        <div class="w-full max-w-[26rem] rounded-xl border border-rule bg-surface px-7 py-8">
            <div class="mb-7 flex items-center gap-2">
                <span class="grid size-9 shrink-0 place-items-center bg-accent text-base text-accent-ink"><i class="bi bi-shop" aria-hidden="true"></i></span>
                <span>
                    <span class="font-display text-base leading-[1.2] font-semibold text-ink">Kasir Simple</span><br>
                    <span class="text-xs leading-[1.3] text-muted">SMEA</span>
                </span>
            </div>

            @if (session('success'))
                <div class="alert border-accent/30 bg-accent-soft text-accent-dark" role="status" data-alert>
                    <i class="bi bi-check-circle" aria-hidden="true"></i>
                    <div class="alert-body">{{ session('success') }}</div>
                    <button type="button" class="alert-close" data-dismiss aria-label="Tutup pesan">
                        <i class="bi bi-x-lg" aria-hidden="true"></i>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert border-danger/30 bg-danger-soft text-danger-ink" role="alert" data-alert>
                    <i class="bi bi-exclamation-octagon" aria-hidden="true"></i>
                    <div class="alert-body">{{ session('error') }}</div>
                    <button type="button" class="alert-close" data-dismiss aria-label="Tutup pesan">
                        <i class="bi bi-x-lg" aria-hidden="true"></i>
                    </button>
                </div>
            @endif

            @yield('content')
        </div>

        <p class="text-[0.8125rem] text-muted">Sistem Penjualan Internal — Simple Cashier</p>
    </main>

    @yield('scripts')
</body>
</html>
