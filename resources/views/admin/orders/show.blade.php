@extends('layouts.admin.master')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Detail Pesanan #{{ $order->id }}</h4>

    <div class="card shadow mb-4">
        <div class="card-body">
            <p><strong>Pelanggan:</strong> {{ $order->user->name }}</p>
            <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
            <p><strong>Nama Penerima:</strong> {{ $order->nama_penerima }}</p>
            <p><strong>No Telepon:</strong> {{ $order->no_telepon }}</p>
            <p><strong>Catatan:</strong> {{ $order->catatan ?? '-' }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $order->status == 'selesai' ? 'success' : ($order->status == 'cancel' ? 'danger' : 'warning') }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header bg-warning fw-bold">Item Pesanan</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
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
                <tfoot>
                    <tr class="fw-bold">
                        <td colspan="3" class="text-end">Total</td>
                        <td>Rp {{ number_format($order->total,0,',','.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
    @csrf
    @method('PATCH')

    @if($order->status == 'pending')
        <button type="submit" class="btn btn-primary">Ubah ke Proses</button>
    @elseif($order->status == 'proses')
        <button type="submit" class="btn btn-warning text-white">Ubah ke Pengiriman</button>
    @else
        <span class="text-muted">Tidak bisa diupdate oleh admin</span>
    @endif
</form>

</div>
@endsection
