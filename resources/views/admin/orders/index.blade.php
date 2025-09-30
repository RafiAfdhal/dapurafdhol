@extends('layouts.admin.master')

@section('title', 'Data Pesanan')

@section('content')
<div class="content-padding">
    <h1 class="mb-4">Data Pesanan</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="admin-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="admin-card-header mb-0" style="border-bottom: none;">Daftar Pesanan</h5>
        </div>

        <div class="table-responsive-custom">
            <table class="table table-borderless table-custom">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Pengantaran</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $key => $order)
                    <tr>
                        <td>{{ $orders->firstItem() + $key }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge
                             @if($order->status == 'pending') bg-secondary 
                             @elseif($order->status == 'proses') bg-primary
                             @elseif($order->status == 'pengiriman') bg-warning text-white
                             @elseif($order->status == 'selesai') bg-success
                             @elseif($order->status == 'cancel') bg-danger
                             @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>

                        <td>{{ strtoupper($order->metode_pembayaran) }}</td>
                        <td>{{ strtoupper($order->metode_pengantaran) }}</td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                class="btn btn-sm btn-info me-1">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Tidak ada pesanan ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $orders->withQueryString()->links('pagination::default') }}
        </div>

    </div>
</div>
@endsection