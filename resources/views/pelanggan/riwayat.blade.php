@extends('layouts.pelanggan.master')

@section('title', 'Riwayat Pesanan')

@section('content')
@include('layouts.pelanggan.cssriwayat')
<div class="container py-4">
    <h4 class="mb-4">Riwayat Pesanan Saya</h4>

    {{-- Pesan sukses & error --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-warning text-center">
                    <tr>
                        <th>#</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Pengantaran</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>Rp {{ number_format($order->total,0,',','.') }}</td>
                        <td class="text-center">
                            <span class="badge 
                                @if($order->status == 'pending') bg-secondary 
                             @elseif($order->status == 'proses') bg-primary
                             @elseif($order->status == 'pengiriman') bg-warning text-white
                             @elseif($order->status == 'selesai') bg-success
                             @elseif($order->status == 'cancel') bg-danger @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="text-center">{{ strtoupper($order->metode_pembayaran) }}</td>
                        <td class="text-center">{{ strtoupper($order->metode_pengantaran ?? '-') }}</td>
                        <td class="text-center">{{ $order->created_at->format('d M Y H:i') }}</td>
                        <td class="text-center">
                            {{-- Tombol Detail --}}
                            <a href="{{ route('pelanggan.riwayat.detail', $order->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i> Detail
                            </a>

                            {{-- Tombol Cancel kalau masih pending --}}
                            @if($order->status === 'pending')
                                <form action="{{ route('pelanggan.riwayat.cancel', $order->id) }}"
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-x-circle"></i> Cancel
                                    </button>
                                </form>
                            @endif

                            {{-- Tombol Terima Pesanan kalau status pengiriman --}}
                            @if($order->status === 'pengiriman')
                                <form action="{{ route('pelanggan.riwayat.terima', $order->id) }}"
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah pesanan sudah diterima?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="bi bi-check-circle"></i> Terima
                                    </button>
                                </form>
                            @endif

                            {{-- Tombol Hapus kalau sudah selesai atau dibatalkan --}}
                            @if(in_array($order->status, ['selesai', 'cancel']))
                                <form action="{{ route('pelanggan.riwayat.destroy', $order->id) }}"
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus riwayat pesanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="bi bi-cart-x fs-3 d-block mb-2"></i>
                            Belum ada pesanan
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
              <div class="d-flex justify-content-center mt-3">
            {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
        </div>
    </div>
</div>
@endsection
