<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Dashboard') — Kasir Simple · Toko RPL Jaya</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body>
    <a class="absolute top-0 -left-[9999px] z-[60] bg-ink px-4 py-2 text-sm text-paper focus-visible:left-0" href="#konten">Lewati ke konten</a>

    <div class="flex min-h-[100dvh]">
        <div id="backdrop" class="backdrop" aria-hidden="true"></div>

        <aside id="sidebar" class="sidebar no-print" aria-label="Navigasi utama">
            <div class="mb-4 flex items-center gap-2 border-b border-sidebar-2 px-2 pt-1 pb-4">
                <span class="grid size-9 shrink-0 place-items-center bg-accent text-base text-accent-ink"><i class="bi bi-shop" aria-hidden="true"></i></span>
                <span>
                    <span class="font-display text-base leading-[1.2] font-semibold text-accent-ink">Kasir Simple</span><br>
                    <span class="text-xs leading-[1.3] text-sidebar-label">Toko RPL Jaya</span>
                </span>
            </div>

            <p class="mb-2 px-2 text-xs font-semibold tracking-[0.12em] text-sidebar-label uppercase">Menu</p>
            <nav class="grid gap-1">
                <a class="navlink {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                   href="{{ route('dashboard') }}"
                   @if (request()->routeIs('dashboard')) aria-current="page" @endif>
                    <i class="bi bi-speedometer2" aria-hidden="true"></i> Dashboard
                </a>
                @if (auth()->user()?->role === 'superadmin')
                <a class="navlink {{ request()->routeIs('barang.*') ? 'active' : '' }}"
                   href="{{ route('barang.index') }}"
                   @if (request()->routeIs('barang.*')) aria-current="page" @endif>
                    <i class="bi bi-box-seam" aria-hidden="true"></i> Data Barang
                </a>
                @endif
                <a class="navlink {{ request()->routeIs('transaksi.index') || request()->routeIs('transaksi.show') ? 'active' : '' }}"
                   href="{{ route('transaksi.index') }}"
                   @if (request()->routeIs('transaksi.index') || request()->routeIs('transaksi.show')) aria-current="page" @endif>
                    <i class="bi bi-receipt" aria-hidden="true"></i> Transaksi
                </a>
                <a class="navlink {{ request()->routeIs('transaksi.create') ? 'active' : '' }}"
                   href="{{ route('transaksi.create') }}"
                   @if (request()->routeIs('transaksi.create')) aria-current="page" @endif>
                    <i class="bi bi-cart-plus" aria-hidden="true"></i> Transaksi Baru
                </a>
            </nav>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="no-print sticky top-0 z-30 flex items-center gap-3 border-b border-rule bg-surface px-4 py-3 md:hidden">
                <button type="button" class="inline-flex size-9 items-center justify-center border border-rule text-ink-2 transition-colors hover:bg-paper-2 hover:text-ink" data-drawer-toggle
                        aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="sidebar">
                    <i class="bi bi-list" aria-hidden="true"></i>
                </button>
                <span class="font-display text-sm font-semibold">Kasir Simple</span>
            </header>

            <main id="konten" class="content">
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
            </main>
        </div>
    </div>

    <dialog id="confirmDialog" class="fixed inset-0 m-auto h-fit max-h-[min(80vh,40rem)] w-[min(92vw,24rem)] border-0 bg-transparent p-0 backdrop:bg-ink/45" aria-labelledby="confirmTitle">
        <form method="dialog" class="border border-rule bg-surface p-5 text-ink">
            <h2 id="confirmTitle" class="mb-2 text-base font-semibold" data-confirm-title-el>Konfirmasi</h2>
            <p class="mb-5 text-sm text-muted" data-confirm-body-el></p>
            <div class="flex justify-end gap-2">
                <button value="cancel" class="btn btn-outline" formnovalidate>Batal</button>
                <button value="confirm" class="btn bg-danger text-on-danger hover:bg-danger-dark" data-confirm-action-el>Hapus</button>
            </div>
        </form>
    </dialog>

    @yield('scripts')
</body>
</html>
