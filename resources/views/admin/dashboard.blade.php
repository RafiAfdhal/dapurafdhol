@extends('layouts.admin.master')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="mb-4">Dashboard Admin</h1>

    {{-- Card Statistik --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="admin-card text-center">
                <i class="fas fa-utensils fa-3x text-success mb-3"></i>
                <h5 class="admin-card-header">Jumlah Menu</h5>
                <div class="card-value">{{ $jumlahMenu }}</div>
                <p class="card-text-muted">Total menu tersedia</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-card text-center">
                <i class="fas fa-users fa-3x text-primary mb-3"></i>
                <h5 class="admin-card-header">Jumlah Pengguna</h5>
                <div class="card-value">{{ $jumlahUser }}</div>
                <p class="card-text-muted">Total pengguna terdaftar</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-card text-center">
                <i class="fas fa-receipt fa-3x text-info mb-3"></i>
                <h5 class="admin-card-header">Pesanan Terbaru</h5>
                <div class="card-value">{{ $pesananTerbaru->count() }}</div>
                <p class="card-text-muted">5 pesanan terakhir</p>
            </div>
        </div>
    </div>

    {{-- Pesanan Terbaru --}}
    <div class="admin-card mb-4">
        <h5 class="admin-card-header">Pesanan Terbaru</h5>
        <div class="table-responsive">
            <table class="table table-hover table-custom">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesananTerbaru as $order)
                        <tr>
                            <td>#ORD{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $order->user->name ?? '-' }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>
                                <span class="status-badge {{ strtolower($order->status) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary-custom">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection