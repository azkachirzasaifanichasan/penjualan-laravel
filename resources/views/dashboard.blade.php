@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<header class="page-head">
    <div>
        <h1 class="page-title">Dashboard</h1>
        <p class="page-sub">Ringkasan penjualan Toko RPL Jaya</p>
    </div>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary no-print">
        <i class="bi bi-cart-plus" aria-hidden="true"></i> Transaksi Baru
    </a>
</header>

<section class="mb-8 grid grid-cols-1 border-y border-rule md:grid-cols-3" aria-label="Statistik toko">
    <div class="min-w-0 bg-ink px-4 py-4 md:px-6 md:py-5 md:first:pl-0 md:last:pr-0 [&+&]:border-t [&+&]:border-rule md:[&+&]:border-t-0 md:[&+&]:border-l">
        <p class="mb-1 text-[0.8125rem] font-medium text-sidebar-label">Total Penjualan</p>
        <p class="font-display text-[2rem] leading-[1.1] font-semibold tracking-[-0.02em] text-accent-light tabular-nums break-words" data-countup="{{ (int) $totalPenjualan }}" data-prefix="Rp ">{{ formatRupiah($totalPenjualan) }}</p>
    </div>
    <div class="min-w-0 py-4 md:px-6 md:py-5 md:first:pl-0 md:last:pr-0 [&+&]:border-t [&+&]:border-rule md:[&+&]:border-t-0 md:[&+&]:border-l">
        <p class="mb-1 text-[0.8125rem] font-medium text-muted">Total Barang</p>
        <p class="font-display text-[1.375rem] leading-[1.15] font-semibold tabular-nums break-words" data-countup="{{ (int) $totalBarang }}">{{ number_format((int) $totalBarang, 0, ',', '.') }}</p>
    </div>
    <div class="min-w-0 py-4 md:px-6 md:py-5 md:first:pl-0 md:last:pr-0 [&+&]:border-t [&+&]:border-rule md:[&+&]:border-t-0 md:[&+&]:border-l">
        <p class="mb-1 text-[0.8125rem] font-medium text-muted">Total Transaksi</p>
        <p class="font-display text-[1.375rem] leading-[1.15] font-semibold tabular-nums break-words" data-countup="{{ (int) $totalTransaksi }}">{{ number_format((int) $totalTransaksi, 0, ',', '.') }}</p>
    </div>
</section>

<section aria-labelledby="stokMenipis">
    <div class="section-head">
        <h2 class="section-title" id="stokMenipis">Peringatan Stok Menipis</h2>
        <span class="badge bg-warning-soft text-warning-ink">stok ≤ 5</span>
    </div>
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col" class="col-num">Harga</th>
                    <th scope="col">Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lowStockBarangs as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="code">{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td class="col-num">{{ formatRupiah($barang->harga) }}</td>
                        <td><span class="badge bg-danger-soft text-danger-ink">{{ $barang->stok }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-cell">Tidak ada barang dengan stok menipis.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
