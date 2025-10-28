@extends('layouts.pelanggan.master')

@section('title', 'Checkout')

@section('content')
    @include('layouts.pelanggan.csscheckout')

    <div class="container py-4">
        <div class="row justify-content-center">

            <!-- 🧾 DETAIL MENU -->
            <div class="col-md-5 mb-4">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden position-relative bg-light-brown">

                    <!-- 🔙 Tombol Kembali di dalam gambar -->
                    <a href="{{ url()->previous() }}"
                        class="btn btn-outline-light position-absolute top-0 start-0 m-3 rounded-circle shadow"
                        style="z-index: 10; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background-color: rgba(255, 255, 255, 0.8); border: none;">
                        <i class="bi bi-arrow-left text-dark"></i>
                    </a>

                    <!-- 📸 Gambar Menu -->
                    @if ($menu->gambar)
                        <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top" alt="{{ $menu->nama }}"
                            style="object-fit: cover; height: 260px;">
                    @else
                        <img src="https://via.placeholder.com/400x250/FFB300/3E2723?text=No+Image" class="card-img-top"
                            style="object-fit: cover; height: 260px;">
                    @endif

                    <!-- 💬 Isi Card -->
                    <div class="card-body text-center bg-white rounded-bottom-4 py-4">
                        <h4 class="card-title fw-bold text-darkest-brown mb-2">{{ $menu->nama }}</h4>

                        <!-- 💬 Deskripsi Menu -->
                        <p class="text-muted px-5" style="font-size: 1.0rem;">
                            {{ $menu->deskripsi ?? 'Tidak ada deskripsi untuk menu ini.' }}
                        </p>


                        <p class="card-text text-success fs-5" id="harga-text" data-harga="{{ $menu->harga }}">
                            Rp {{ number_format($menu->harga, 0, ',', '.') }} / porsi
                        </p>

                        <!-- 💰 Total Harga -->
                        <p class="fw-bold mt-2 text-brown fs-5" id="total-harga">
                            Total: Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </p>

                        <!-- ⭐ Rating -->
                        <div class="d-flex justify-content-center align-items-center gap-2 mb-3">
                            <div class="d-flex fs-5 text-warning">
                                @php
                                    $avgRating = $menu->reviews->avg('rating') ?? 0;
                                    $fullStars = floor($avgRating);
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi {{ $i <= $fullStars ? 'bi-star-fill' : 'bi-star' }}"></i>
                                @endfor
                            </div>
                            <span class="text-muted">({{ $menu->reviews->count() }} ulasan)</span>
                        </div>

                        <!-- 📦 Info Stok -->
                        <p class="text-muted mb-3">
                            <i class="bi bi-box-seam"></i> Stok tersedia: <b>{{ $menu->stok }}</b>
                        </p>

                        <!-- 🔗 Link ulasan -->
                        <a href="{{ route('pelanggan.ulasan', $menu->id) }}"
                            class="btn btn-warning text-dark fw-semibold mb-3 px-4 rounded-pill shadow-sm">
                            <i class="bi bi-chat-dots"></i> Lihat Ulasan
                        </a>

                        <!-- 🔢 Jumlah Pesanan -->
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <button class="btn btn-outline-secondary rounded-circle" id="minus-qty" type="button"
                                style="width: 40px; height: 40px;">
                                <i class="bi bi-dash"></i>
                            </button>
                            <input type="number" id="quantity" class="form-control text-center border-0 bg-light"
                                value="1" min="1" max="{{ $menu->stok }}" style="width: 60px;" readonly>
                            <button class="btn btn-outline-secondary rounded-circle" id="plus-qty" type="button"
                                style="width: 40px; height: 40px;">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🛒 FORM CHECKOUT -->
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark fw-bold">
                        Formulir Checkout
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pelanggan.checkout.process', $menu->id) }}" method="POST" class="mb-3">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <input type="hidden" id="jumlah_checkout" name="jumlah" value="1">

                            <div class="mb-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control"
                                    value="{{ old('nama_penerima', Auth::user()->name ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No. Telepon</label>
                                <input type="text" name="no_telepon" class="form-control"
                                    value="{{ old('no_telepon', Auth::user()->no_telepon ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat" rows="3" class="form-control" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <textarea name="catatan" rows="2" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Metode Pembayaran</label>
                                <select name="metode_pembayaran" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="cash">Cash</option>
                                    <option value="gopay">GoPay</option>
                                    <option value="ovo">OVO</option>
                                    <option value="dana">Dana</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Metode Pengantaran</label>
                                <select name="metode_pengantaran" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="gosend">GoSend</option>
                                    <option value="grabexpress">Grab Express</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-warning w-100 fw-bold">
                                <i class="bi bi-bag-check"></i> Pesan Sekarang
                            </button>
                        </form>

                        <form action="{{ route('pelanggan.cart.add', $menu->id) }}" method="POST">
                            @csrf
                            <input type="hidden" id="jumlah_cart" name="jumlah" value="1">
                            <button type="submit" class="btn btn-outline-dark w-100 fw-bold">
                                <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const minusBtn = document.getElementById("minus-qty");
            const plusBtn = document.getElementById("plus-qty");
            const qtyInput = document.getElementById("quantity");

            const hargaText = document.getElementById("harga-text");
            const totalHarga = document.getElementById("total-harga");

            const jumlahCheckout = document.getElementById("jumlah_checkout");
            const jumlahCart = document.getElementById("jumlah_cart");

            const hargaPerPorsi = parseInt(hargaText.dataset.harga);

            function updateTotal() {
                const qty = parseInt(qtyInput.value);
                const total = hargaPerPorsi * qty;
                totalHarga.textContent = "Total: Rp " + total.toLocaleString('id-ID');
            }

            function syncJumlah() {
                jumlahCheckout.value = qtyInput.value;
                jumlahCart.value = qtyInput.value;
                updateTotal();
            }

            if (plusBtn && minusBtn) {
                plusBtn.addEventListener("click", function() {
                    let currentValue = parseInt(qtyInput.value);
                    let max = parseInt(qtyInput.getAttribute("max"));
                    if (currentValue < max) {
                        qtyInput.value = currentValue + 1;
                        syncJumlah();
                    }
                });

                minusBtn.addEventListener("click", function() {
                    let currentValue = parseInt(qtyInput.value);
                    let min = parseInt(qtyInput.getAttribute("min"));
                    if (currentValue > min) {
                        qtyInput.value = currentValue - 1;
                        syncJumlah();
                    }
                });
            }

            updateTotal();
        });
    </script>
@endpush
