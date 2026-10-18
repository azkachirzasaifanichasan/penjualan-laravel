@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<header class="page-head no-print">
    <div>
        <h1 class="page-title">Detail Transaksi</h1>
        <p class="page-sub code">{{ $transaksi->nomor_transaksi }}</p>
    </div>
    <div class="flex gap-2">
        <button type="button" class="btn btn-primary" onclick="window.print()">
            <i class="bi bi-printer" aria-hidden="true"></i> Cetak
        </button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-outline">Kembali</a>
    </div>
</header>

<div class="mx-auto max-w-[23rem] border border-rule bg-surface p-6 font-mono text-[0.8125rem] leading-[1.6] text-ink-2 print:max-w-full print:border-0 print:p-0">
    <p class="text-center text-base font-bold tracking-[0.08em] text-ink uppercase">Toko RPL Jaya</p>
    <p class="mt-1 text-center text-xs text-muted">Struk Penjualan</p>

    <div class="receipt-rule" role="presentation"></div>

    <div class="grid gap-1">
        <div class="flex justify-between gap-3">
            <span>No. Transaksi</span>
            <span>{{ $transaksi->nomor_transaksi }}</span>
        </div>
        <div class="flex justify-between gap-3">
            <span>Tanggal</span>
            <span>{{ $transaksi->tanggal->format('d-m-Y') }}</span>
        </div>
    </div>

    <div class="receipt-rule" role="presentation"></div>

    <table class="w-full border-collapse">
        <thead>
            <tr>
                <th scope="col" class="pb-1 text-left text-xs font-semibold tracking-[0.08em] text-muted uppercase">Item</th>
                <th scope="col" class="pb-1 text-right text-xs font-semibold tracking-[0.08em] text-muted uppercase whitespace-nowrap">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detailTransaksis as $detail)
                <tr>
                    <td class="py-1 align-top">
                        {{ $detail->barang->nama_barang ?? '-' }}<br>
                        <span class="text-muted">{{ formatRupiah($detail->harga) }} × {{ $detail->jumlah }}</span>
                    </td>
                    <td class="py-1 text-right align-top whitespace-nowrap">{{ formatRupiah($detail->subtotal) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="receipt-rule" role="presentation"></div>

    <div class="flex justify-between gap-3 text-base font-bold text-ink">
        <span>Total</span>
        <span>{{ formatRupiah($grandTotal) }}</span>
    </div>

    <div class="receipt-rule" role="presentation"></div>

    <p class="text-center text-xs text-muted">Terima kasih telah berbelanja di Toko RPL Jaya</p>
</div>
@endsection
