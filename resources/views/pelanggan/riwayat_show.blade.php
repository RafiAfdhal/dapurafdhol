@extends('layouts.pelanggan.master')

@section('title', 'Detail Pesanan')

@section('content')
@include('layouts.pelanggan.cssriwayat_show')
<div class="container py-4">
    <h4 class="mb-4">Detail Pesanan #{{ $order->id }}</h4>

    <div class="card shadow mb-3">
        <div class="card-body">
            <p><strong>Nama Penerima:</strong> {{ $order->nama_penerima }}</p>
            <p><strong>No Telepon:</strong> {{ $order->no_telepon }}</p>
            <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
            <p><strong>Catatan:</strong> {{ $order->catatan ?? '-' }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ strtoupper($order->metode_pembayaran) }}</p>
            <p><strong>Metode Pengantaran:</strong> {{ strtoupper($order->metode_pengantaran ?? '-') }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $order->status == 'selesai' ? 'success' : ($order->status == 'cancel' ? 'danger' : 'warning') }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            <p><strong>Total:</strong> Rp {{ number_format($order->total,0,',','.') }}</p>
            <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <h5>Daftar Item</h5>
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->menu->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ number_format($item->harga,0,',','.') }}</td>
                        <td>Rp {{ number_format($item->jumlah * $item->harga,0,',','.') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('pelanggan.riwayat') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
