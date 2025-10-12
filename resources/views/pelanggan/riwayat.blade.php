@extends('layouts.pelanggan.master')

@section('title', 'Riwayat Pesanan')

@section('content')
    @include('layouts.pelanggan.cssriwayat')


    <div class="container py-4">
        <h3 class="fw-bold mb-4 text-center text-brown"> Riwayat Pesanan Saya</h3>

        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card p-3">
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-warning">
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
                                <td>{{ $loop->iteration }}</td>
                                <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                <td>
                                    <span
                                        class="badge 
                                @if ($order->status == 'pending') bg-secondary
                                @elseif($order->status == 'proses') bg-primary
                                @elseif($order->status == 'pengiriman') bg-warning text-dark
                                @elseif($order->status == 'selesai') bg-success
                                @elseif($order->status == 'cancel') bg-danger @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>{{ strtoupper($order->metode_pembayaran) }}</td>
                                <td>{{ strtoupper($order->metode_pengantaran ?? '-') }}</td>
                                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('pelanggan.riwayat.detail', $order->id) }}"
                                        class="btn btn-sm btn-success mb-1">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>

                                    @if ($order->status === 'pending')
                                        <form action="{{ route('pelanggan.riwayat.cancel', $order->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-danger mb-1">
                                                <i class="bi bi-x-circle"></i> Batal
                                            </button>
                                        </form>
                                    @endif

                                    @if ($order->status === 'pengiriman')
                                        <form action="{{ route('pelanggan.riwayat.terima', $order->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Apakah pesanan sudah diterima?')">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-primary mb-1">
                                                <i class="bi bi-check-circle"></i> Terima
                                            </button>
                                        </form>
                                    @endif

                                    @if (in_array($order->status, ['selesai', 'cancel']))
                                        <form action="{{ route('pelanggan.riwayat.destroy', $order->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus riwayat pesanan ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">
                                    <i class="bi bi-cart-x fs-2 d-block mb-2"></i>
                                    Belum ada pesanan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

    </div>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endsection
