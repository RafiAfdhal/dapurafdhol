@extends('layouts.pelanggan.master')

@section('content')
@include('layouts.pelanggan.csscheckout-cart')

<div class="container py-5">
    <div class="cart-container">
        <h5 class="mb-4">Daftar Pesanan Anda</h5>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($cart && $cart->items->count() > 0)
        @foreach($cart->items as $item)
        <div class="cart-item">
            <img src="{{ asset('storage/'.$item->menu->gambar) }}" alt="{{ $item->menu->nama }}" class="item-image">
            <div class="item-details">
                <span class="item-name">{{ $item->menu->nama }}</span>
                <div class="item-price-info">
                    Harga: <strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong>
                </div>

                <!-- Update jumlah -->
                <div class="item-price-info">
                    <form action="{{ route('pelanggan.cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-dash"></i>
                        </button>
                        <input type="text" class="form-control text-center mx-1"
                            value="{{ $item->jumlah }}" readonly style="width: 50px;">
                        <button type="submit" name="action" value="increase" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-plus"></i>
                        </button>
                    </form>
                </div>

                <div class="item-price-info subtotal">
                    Subtotal: <strong>Rp {{ number_format($item->jumlah * $item->harga, 0, ',', '.') }}</strong>
                </div>
            </div>
            <div class="item-actions">
                <form action="{{ route('pelanggan.cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-item-btn"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </div>
        @endforeach

        <!-- Bagian total & tombol -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h5 class="mb-0">Total: Rp {{ number_format($cart->items->sum(fn($i) => $i->jumlah * $i->harga), 0, ',', '.') }}</h5>
            <a href="{{ route('pelanggan.checkout-cart') }}" class="btn btn-warning">
                <i class="bi bi-bag-check-fill"></i> Pesan Sekarang
            </a>
        </div>
        <!-- Tombol kembali ke menu -->
        <div class="text-center mt-3">
            <a href="{{ route('pelanggan.menu') }}" class="btn btn-danger">
                <i class="bi bi-arrow-left"></i> Kembali ke Menu
            </a>
            @else
            <div class="empty-cart-message">
                <i class="bi bi-cart-x"></i>
                <p>Keranjang belanja Anda kosong. <br> Ayo, temukan hidangan lezat favoritmu!</p>
                <a href="{{ route('pelanggan.menu') }}" class="empty-cart-btn">Mulai Belanja Sekarang!</a>
            </div>
            @endif
        </div>
    </div>
    @endsection