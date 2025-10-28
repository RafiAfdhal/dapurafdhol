@extends('layouts.pelanggan.master')

@section('content')
    @include('layouts.pelanggan.csscheckout-cart')

    <div class="container py-5">
        <div class="cart-container">

            <!-- 🔙 Tombol kembali di atas -->
            <div class="d-flex justify-content-center align-items-center mb-4 position-relative">
                <a href="{{ route('pelanggan.menu') }}" class="btn btn-outline-danger position-absolute start-0">
                    <i class="bi bi-arrow-left-circle"></i>
                </a>
                <h5 class="mb-0 fw-bold text-dark text-center">Daftar Pesanan Anda</h5>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if ($cart && $cart->items->count() > 0)
                @foreach ($cart->items as $item)
                    <div class="cart-item shadow-sm" data-item-id="{{ $item->id }}">
                        <img src="{{ asset('storage/' . $item->menu->gambar) }}" alt="{{ $item->menu->nama }}"
                            class="item-image rounded-3">

                        <div class="item-details w-100">
                            <span class="item-name fw-semibold">{{ $item->menu->nama }}</span>

                            <div class="item-price-info">
                                Harga: <strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong>
                            </div>

                            <!-- Update jumlah -->
                            <div class="item-price-info d-flex align-items-center mt-2">
                                <button class="btn btn-outline-secondary btn-sm decrease-btn">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input type="text" class="form-control text-center mx-1 item-qty"
                                    value="{{ $item->jumlah }}" readonly style="width: 50px;">
                                <button class="btn btn-outline-secondary btn-sm increase-btn">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>

                            <div class="item-price-info subtotal mt-2">
                                Subtotal:
                                <strong class="subtotal-value text-success">
                                    Rp {{ number_format($item->jumlah * $item->harga, 0, ',', '.') }}
                                </strong>
                            </div>
                        </div>

                        <div class="item-actions">
                            <form action="{{ route('pelanggan.cart.remove', $item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus item ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-item-btn text-danger">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <!-- Bagian total & tombol -->
                <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                    <h5 class="mb-0 fw-bold text-dark">
                        Total: <span id="cart-total" class="text-success">
                            Rp {{ number_format($cart->items->sum(fn($i) => $i->jumlah * $i->harga), 0, ',', '.') }}
                        </span>
                    </h5>
                    <a href="{{ route('pelanggan.checkout-cart') }}" class="btn btn-warning btn-lg shadow-sm">
                        <i class="bi bi-bag-check-fill"></i> Pesan Sekarang
                    </a>
                </div>
            @else
                <div class="empty-cart-container text-center py-5">
                    <div class="empty-cart-illustration mx-auto mb-4">
                        <i class="bi bi-cart-x-fill text-warning" style="font-size: 4rem;"></i>
                    </div>
                    <h4 class="fw-bold text-dark">Keranjang Masih Kosong</h4>
                    <p class="text-muted mt-2 mb-4">
                        Belum ada makanan di keranjangmu.<br>
                        Yuk, pilih menu lezat favoritmu hari ini!
                    </p>
                    <a href="{{ route('pelanggan.menu') }}" class="btn btn-warning btn-lg px-4 shadow-sm">
                        <i class="bi bi-bag-fill me-2"></i> Lihat Menu
                    </a>
                </div>
            @endif
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = '{{ csrf_token() }}';

            function updateCart(itemId, action) {
                fetch(`/pelanggan/cart/update/${itemId}`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            action
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            const itemEl = document.querySelector(`.cart-item[data-item-id="${itemId}"]`);
                            itemEl.querySelector('.item-qty').value = data.new_jumlah;
                            itemEl.querySelector('.subtotal-value').textContent =
                                'Rp ' + new Intl.NumberFormat('id-ID').format(data.subtotal);
                            document.getElementById('cart-total').textContent =
                                'Rp ' + new Intl.NumberFormat('id-ID').format(data.total);
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(err => console.error(err));
            }

            document.querySelectorAll('.increase-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const itemId = this.closest('.cart-item').dataset.itemId;
                    updateCart(itemId, 'increase');
                });
            });

            document.querySelectorAll('.decrease-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const itemId = this.closest('.cart-item').dataset.itemId;
                    updateCart(itemId, 'decrease');
                });
            });
        });
    </script>
@endpush
